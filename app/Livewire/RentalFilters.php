<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipmentrental;
use Illuminate\Support\Facades\Session;

class RentalFilters extends Component
{
    use WithPagination;
    public $categories = [];
    public $subcategories = [];

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

    public $toastTitle, $toastBody, $toastType;

    public function mount()
    {
        $this->categories = Equipmentrental::select('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        // Initialize temporary values with active filter values.
        $this->tempSelectedCategory = $this->selectedCategory;
        $this->tempSelectedSubcategory = $this->selectedSubcategory;
        $this->tempSortOption = $this->sortOption;
        $this->tempMinPrice = $this->minPrice;
        $this->tempMaxPrice = $this->maxPrice;
    }

    /**
     * When a category is selected in the filters,
     * load the associated subcategories.
     */
    public function loadSubcategories()
    {
        if ($this->tempSelectedCategory) {
            $this->subcategories = Equipmentrental::where('category', $this->tempSelectedCategory)
                ->select('subcategory')
                ->distinct()
                ->pluck('subcategory')
                ->toArray();
        } else {
            $this->subcategories = [];
        }
    }

    /**
     * Add the equipment to cart and flash a success message.
     */
    // Livewire method
    public function addToCart($equipmentId)
    {
        $equipment = Equipmentrental::find($equipmentId);
        if (! $equipment) return;

        $cart = Session::get('cart', []);
        $cart[] = $equipment->toArray();
        Session::put('cart', $cart);
        $this->dispatch('cartUpdated');

        $this->toastTitle = $equipment->name . ' added to cart';
        $this->toastBody = '$' . number_format($equipment->price, 2);
        // $this->toastType = "success";

        $this->dispatch('toast', [
            'title' => $this->toastTitle,
            'body' => $this->toastBody,
            // 'toastType' => $this->toastType,
            'timeout' => 5000,
        ]);
    }


    /**
     * When the user clicks the Apply Filters button,
     * copy temporary values to the active filter properties.
     */
    public function applyFilters()
    {
        $this->selectedCategory    = $this->tempSelectedCategory;
        $this->selectedSubcategory = $this->tempSelectedSubcategory;
        $this->sortOption          = $this->tempSortOption;
        $this->minPrice            = $this->tempMinPrice;
        $this->maxPrice            = $this->tempMaxPrice;

        // Reset pagination if needed
        $this->resetPage();
    }

    /**
     * Compute the filtered equipment list based on the active filters.
     */
    public function getFilteredEquipmentProperty()
    {
        $query = Equipmentrental::query();

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

        return $query->paginate(5);
    }

    public function render()
    {
        return view('livewire.rental-filters', [
            'equipmentList' => $this->filteredEquipment,
        ]);
    }
}
