<?php

namespace App\Livewire;


use Exception;
use Flux\Flux;
use App\Models\Equipmentrental;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
class RentalTable extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $name, $description, $newphoto, $category, $price, $subcategory, $equipmentId, $selectedId = null, $slug, $search = '';

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
            throw New Exception('An error has occured please try again');
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
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('category', 'like', '%' . $this->search . '%')
                    ->orWhere('subcategory', 'like', '%' . $this->search . '%');
            });
        }

        $rentalEquipment = $query->select('id', 'name', 'price', 'description', 'photo', 'category', 'subcategory')
            ->latest()
            ->paginate(5);

        $columns = [
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'name', 'label' => 'Name'],
            ['key' => 'description', 'label' => 'Description'],
            ['key' => 'photo', 'label' => 'Photo'],
            ['key' => 'price', 'label' => 'Price'],
            ['key' => 'category', 'label' => 'Category'],
            ['key' => 'subcategory', 'label' => 'Subcategory'],
        ];

        return view('livewire.rental-table', [
            'columns' => $columns,
            'rentalEquipment' => $rentalEquipment
        ]);
    }

}
