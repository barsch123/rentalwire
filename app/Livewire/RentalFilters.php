<?php

namespace App\Livewire;

use App\Models\Equipmentrental;
use Flux\Flux;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class RentalFilters extends Component
{
    use WithPagination;

    private const SORT_OPTIONS = [
        'newest',
        'priceLowHigh',
        'priceHighLow',
        'nameAZ',
        'nameZA',
    ];

    public $categories = [];

    public $categoryDetails = [];

    public $categoryCounts = [];

    public $subcategories = [];

    public int $priceFloor = 0;

    public int $priceCeiling = 0;

    public int $priceStep = 100;

    #[Url(as: 'q')]
    public string $search = '';

    // Active filters used in the query
    public $selectedCategory = null;

    public $selectedSubcategory = null;

    public $sortOption = 'newest';

    public $minPrice = null;

    public $maxPrice = null;

    // Temporary properties for filter input fields
    public $tempSelectedCategory = null;

    public $tempSelectedSubcategory = null;

    public $tempSortOption = 'newest';

    public $tempMinPrice = null;

    public $tempMaxPrice = null;

    public function mount(): void
    {
        $this->categoryDetails = config('solar.catalog', []);
        $this->categories = array_keys($this->categoryDetails);
        $this->categoryCounts = Equipmentrental::query()
            ->whereIn('category', $this->categories)
            ->selectRaw('category, count(*) as total')
            ->groupBy('category')
            ->pluck('total', 'category')
            ->map(fn ($total): int => (int) $total)
            ->all();
        $this->priceFloor = 0;
        $this->priceCeiling = (int) ceil((float) Equipmentrental::query()->whereIn('category', $this->categories)->max('price'));

        // Initialize temporary values with active filter values.
        $this->tempSelectedCategory = $this->selectedCategory;
        $this->tempSelectedSubcategory = $this->selectedSubcategory;
        $this->tempSortOption = $this->sortOption;
        $this->tempMinPrice = $this->minPrice ?? $this->priceFloor;
        $this->tempMaxPrice = $this->maxPrice ?? $this->priceCeiling;
    }

    public function updatedTempSelectedCategory(): void
    {
        $this->loadSubcategories();
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function loadSubcategories(): void
    {
        $this->tempSelectedSubcategory = null;

        $this->subcategories = $this->categoryDetails[$this->tempSelectedCategory]['subcategories'] ?? [];
    }

    public function selectCategory(string $category): void
    {
        if (! in_array($category, $this->categories, true)) {
            return;
        }

        $this->tempSelectedCategory = $category;
        $this->selectedCategory = $category;
        $this->tempSelectedSubcategory = null;
        $this->selectedSubcategory = null;
        $this->loadSubcategories();
        $this->resetPage();
    }

    /**
     * Add the solution to the estimate list and flash a success message.
     */
    // Livewire method
    public function addToCart($equipmentId): void
    {
        $equipment = Equipmentrental::find($equipmentId);
        if (! $equipment) {
            return;
        }

        if (! $equipment->isAvailable()) {
            Flux::toast(text: 'This solution cannot be added right now.', heading: 'Unavailable', variant: 'warning');

            return;
        }

        $cart = Session::get('cart', []);
        $existingIndex = collect($cart)->search(
            fn (array $item): bool => (int) ($item['id'] ?? 0) === $equipment->id
        );

        if ($existingIndex === false) {
            $cart[] = [...$equipment->toArray(), 'quantity' => 1, 'discount_percent' => (int) (auth()->user()?->discount_percent ?? 0)];
        } else {
            $cart[$existingIndex]['quantity'] = (int) ($cart[$existingIndex]['quantity'] ?? 1) + 1;
        }

        Session::put('cart', $cart);
        $this->dispatch('cartUpdated');

        Flux::toast(
            text: $equipment->name,
            heading: 'Added to estimate',
            variant: 'success',
        );
    }

    public function toggleWishlist(int $equipmentId): void
    {
        if (! auth()->check()) {
            $this->redirectRoute('login', navigate: true);

            return;
        }

        $equipment = Equipmentrental::query()->findOrFail($equipmentId);
        $attached = auth()->user()->wishlist()->toggle($equipment->id)['attached'];

        Flux::toast(
            text: $equipment->name,
            heading: $attached === [] ? 'Removed from wishlist' : 'Saved to wishlist',
            variant: 'success',
        );
    }

    /**
     * When the user clicks the Apply Filters button,
     * copy temporary values to the active filter properties.
     */
    public function applyFilters(): void
    {
        if ($this->tempSelectedCategory && ! in_array($this->tempSelectedCategory, $this->categories, true)) {
            $this->tempSelectedCategory = null;
            $this->tempSelectedSubcategory = null;
        }

        $this->selectedCategory = filled($this->tempSelectedCategory) ? $this->tempSelectedCategory : null;
        $this->selectedSubcategory = filled($this->tempSelectedSubcategory) ? $this->tempSelectedSubcategory : null;
        $this->sortOption = in_array($this->tempSortOption, self::SORT_OPTIONS, true)
            ? $this->tempSortOption
            : 'newest';

        $normalizedMinPrice = $this->normalizePriceFilter($this->tempMinPrice);
        $normalizedMaxPrice = $this->normalizePriceFilter($this->tempMaxPrice);

        $this->minPrice = $normalizedMinPrice > $this->priceFloor ? $normalizedMinPrice : null;
        $this->maxPrice = $normalizedMaxPrice < $this->priceCeiling ? $normalizedMaxPrice : null;

        if ($normalizedMinPrice !== null && $normalizedMaxPrice !== null && $normalizedMinPrice > $normalizedMaxPrice) {
            [$normalizedMinPrice, $normalizedMaxPrice] = [$normalizedMaxPrice, $normalizedMinPrice];
            [$this->tempMinPrice, $this->tempMaxPrice] = [$normalizedMinPrice, $normalizedMaxPrice];
            $this->minPrice = $normalizedMinPrice > $this->priceFloor ? $normalizedMinPrice : null;
            $this->maxPrice = $normalizedMaxPrice < $this->priceCeiling ? $normalizedMaxPrice : null;
        }

        if ($this->selectedCategory && $this->selectedSubcategory) {
            $subcategoryExists = Equipmentrental::where('category', $this->selectedCategory)
                ->where('subcategory', $this->selectedSubcategory)
                ->exists();

            if (! $subcategoryExists) {
                $this->selectedSubcategory = null;
                $this->tempSelectedSubcategory = null;
            }
        }

        $this->resetPage();
    }

    public function resetFilters(): void
    {
        $this->search = '';
        $this->selectedCategory = null;
        $this->selectedSubcategory = null;
        $this->sortOption = 'newest';
        $this->minPrice = null;
        $this->maxPrice = null;
        $this->tempSelectedCategory = null;
        $this->tempSelectedSubcategory = null;
        $this->tempSortOption = 'newest';
        $this->tempMinPrice = $this->priceFloor;
        $this->tempMaxPrice = $this->priceCeiling;
        $this->subcategories = [];
        $this->resetPage();
    }

    public function getFilteredEquipmentProperty()
    {
        $query = Equipmentrental::query()
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->whereIn('category', $this->categories);

        if (filled($this->search)) {
            $search = trim($this->search);

            $query->where(function ($query) use ($search): void {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('subcategory', 'like', "%{$search}%");
            });
        }

        if ($this->selectedCategory) {
            $query->where('category', $this->selectedCategory);
        }
        if ($this->selectedSubcategory) {
            $query->where('subcategory', $this->selectedSubcategory);
        }

        // Apply price filters.
        if ($this->minPrice !== null) {
            $query->where('price', '>=', $this->minPrice);
        }
        if ($this->maxPrice !== null) {
            $query->where('price', '<=', $this->maxPrice);
        }

        // Apply sorting options.
        switch ($this->sortOption) {
            case 'priceLowHigh':
                $query->orderBy('price', 'asc');
                break;
            case 'priceHighLow':
                $query->orderBy('price', 'desc');
                break;
            case 'nameAZ':
                $query->orderBy('name', 'asc');
                break;
            case 'nameZA':
                $query->orderBy('name', 'desc');
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        return $query->paginate(9);
    }

    private function normalizePriceFilter($value): ?float
    {
        if ($value === null || $value === '') {
            return null;
        }

        return max(0, (float) $value);
    }

    public function render(): View
    {
        $wishlistIds = auth()->user()?->wishlist()->pluck('equipmentrentals.id')->all() ?? [];

        return view('livewire.rental-filters', [
            'equipmentList' => $this->filteredEquipment,
            'wishlistIds' => $wishlistIds,
        ]);
    }
}
