<?php

namespace App\Livewire;

use App\Models\Tag;
use App\Models\Blogs;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Blog extends Component
{
    use WithPagination;

    public $search = null;

    public function applySearch()
    {
        $this->resetPage(); // Reset pagination when searching
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Reset pagination when search changes
    }

    public function render()
    {
        $query = Blogs::with('tags');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'LIKE', "%{$this->search}%")
                    ->orWhereHas('tags', function ($tagQuery) {
                        $tagQuery->where('name', 'LIKE', "%{$this->search}%");
                    });
            });
        }

        $blogs = $query->paginate(5);
        $tags = Tag::whereNotNull('name')->where('name', '!=', '')->limit(5)->latest()->get();

        return view('livewire.blog', ['blogs' => $blogs, 'tags' => $tags]);
    }
}
