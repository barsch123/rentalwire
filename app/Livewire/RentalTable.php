<?php

namespace App\Livewire;

use App\Models\Equipmentrental;
use Exception;
use Flux\Flux;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class RentalTable extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name;

    public $description;

    public $newphoto;

    public $category;

    public $price;

    public $subcategory;

    public $equipmentId;

    public $selectedId = null;

    public $slug;

    public $search = '';

    protected $rules = [
        'name' => 'nullable|string|max:255',
        'price' => 'nullable|numeric|min:0',
        'description' => 'nullable|string',
        'category' => 'nullable|string',
        'subcategory' => 'nullable|string',
        'newphoto' => 'nullable|image|max:2048',
    ];

    public function editEquipment($id)
    {
        $equipment = Equipmentrental::findOrFail($id);
        $this->equipmentId = $id;
        $this->name = $equipment->name;
        $this->description = $equipment->description;
        $this->newphoto = null;
        $this->price = $equipment->price;
        $this->category = $equipment->category;
        $this->subcategory = $equipment->subcategory;
        $this->slug = $equipment->slug;
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->newphoto = '';
        $this->price = '';
        $this->category = '';
        $this->subcategory = '';
        $this->search = '';
    }

    public function updateEquipment()
    {
        $validatedData = $this->validate();

        if ($this->name) {
            $validatedData['slug'] = Str::slug($this->name);
        }

        if ($this->newphoto) {
            $validatedData['photo'] = $this->newphoto->store('photos', 'public');
        }

        Equipmentrental::findOrFail($this->equipmentId)->update($validatedData);
        Flux::modal('modal')->close();
    }

    public function deleteEquipment()
    {
        try {
            Equipmentrental::findOrFail($this->selectedId)->delete();
            Flux::modal('modal')->close();
        } catch (Exception $e) {
            throw new Exception('An error has occured please try again');
        }
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function render()
    {
        $query = Equipmentrental::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('description', 'like', '%'.$this->search.'%')
                    ->orWhere('category', 'like', '%'.$this->search.'%')
                    ->orWhere('subcategory', 'like', '%'.$this->search.'%');
            });
        }

        $rentalEquipment = $query->select('id', 'name', 'price', 'description', 'photo', 'category', 'subcategory')
            ->withCount('reviews')
            ->latest()
            ->paginate(5);

        return view('livewire.rental-table', [
            'rentalEquipment' => $rentalEquipment,
        ]);
    }
}
