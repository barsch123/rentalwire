<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Blogs;
class Charts extends Component
{
    public $published, $noTags, $monthlyCounts;
    public function mount()
    {
        $this->published = Blogs::whereNotNull('published_at')->count();
        $this->noTags = Blogs::whereDoesntHave('tags')->count();
        // $this->monthlyCounts = Blogs::selectRaw("strftime('%Y-%m', published_at) as month, COUNT(*) as count")
        //     ->whereNotNull('published_at')
        //     ->groupBy('month')
        //     ->orderBy('month')
        //     ->get();


    }

    public function render()
    {
        $this->dispatch('updateTheChart', [
            'published' => $this->published,
            'noTags' => $this->noTags,
        ]);
        return view('livewire.charts');
    }
}