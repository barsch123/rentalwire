<?php

namespace App\Livewire\Admin;

use App\Models\Equipmentrental;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.app')]
class Adminupload extends Component
{
    use WithFileUploads;

    public $photo;

    public $name;

    public $price;

    public $description;

    public $category = '';

    public $subcategory = '';

    public $currentSubcategories = [];

    public $slug;

    #[Locked]
    public $allSubcategories = [];

    public function mount(): void
    {
        $this->allSubcategories = collect(config('solar.catalog', []))
            ->map(fn (array $category): array => $category['subcategories'])
            ->all();
    }

    protected function rules(): array
    {
        return [
            'photo' => ['required', 'image', 'max:2048'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string'],
            'category' => ['required', Rule::in(array_keys($this->allSubcategories))],
            'subcategory' => ['required', Rule::in($this->allSubcategories[$this->category] ?? [])],
        ];
    }

    public function updatedCategory(string $value): void
    {
        $this->subcategory = '';
        $this->currentSubcategories = $this->allSubcategories[$value] ?? [];
    }

    public function save(): void
    {
        $this->validate();
        $this->generateSlug($this->name);

        try {
            $filePath = $this->photo->store('photos', 'public');
            Equipmentrental::create([
                'photo' => $filePath,
                'name' => $this->name,
                'slug' => $this->slug,
                'price' => $this->price,
                'description' => $this->description,
                'category' => $this->category,
                'subcategory' => $this->subcategory,
            ]);

            session()->flash('message', 'Solution successfully added.');
            $this->reset(['photo', 'name', 'price', 'description', 'category', 'subcategory', 'slug', 'currentSubcategories']);
        } catch (\Exception $e) {
            session()->flash('error', 'Error saving solution: '.$e->getMessage());
        }
    }

    public function generateSlug(string $name): void
    {
        $this->slug = Str::slug($name);
    }

    public function render(): View
    {
        return view('livewire.admin.adminupload');
    }
}
