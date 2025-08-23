<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Equipmentrental;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Adminupload extends Component
{
    use WithFileUploads;

    public $photo, $name, $price, $description, $category = '', $subcategory = '', $currentSubcategories = [], $slug;
    protected $rules = [
        'photo' => 'required|image|max:2048',  // This is correct for file uploads
        'name' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'description' => 'required|string',
        'category' => 'required|string|max:255',
        'subcategory' => 'required|string|max:255'
    ];

    public $allSubcategories = [
        'Dozers' => ['Small Dozers', 'Medium Dozers', 'Large Dozers'],
        'Excavators' => ['Mini Excavators', 'Medium Excavators', 'Large Excavators'],
        'Loaders' => ['Skid Steer Loaders', 'Compact Track Loaders', 'Multi Terrain Loaders'],
        'Scrapers' => ['Open Bowl Scrapers', 'Elevating Scrapers', 'Towed Scrapers'],
        'Graders' => ['Motor Graders', 'Compact Graders'],
        'Compactors' => ['Soil Compactors', 'Asphalt Compactors', 'Landfill Compactors'],
        'Dump Trucks' => ['Articulated Dump Trucks', 'Rigid Dump Trucks'],
        'Cranes' => ['Mobile Cranes', 'Tower Cranes', 'Crawler Cranes'],
        'Trenchers' => ['Chain Trenchers', 'Wheel Trenchers'],
        'Pavers' => ['Asphalt Pavers', 'Concrete Pavers'],
        'Drilling Equipment' => ['Rotary Drilling Rigs', 'Down-the-Hole Drills', 'Top Hammer Drills'],
    ];

    public function updatedCategory($value)
    {
        $this->subcategory = '';
        $this->currentSubcategories = $this->allSubcategories[$value] ?? [];
    }

    


    public function save()
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
                'subcategory' => $this->subcategory
            ]);

            session()->flash('message', 'Product successfully added.');
            $this->reset(['photo', 'name', 'price', 'description', 'category', 'subcategory', 'slug']);
        } catch (\Exception $e) {
            session()->flash('error', 'Error saving product: ' . $e->getMessage());
        }
    }



    public function generateSlug($name)
    {
        $this->slug = Str::slug($name);
    }


    public function render()
    {
        return view('livewire.admin.adminupload');
    }
}
