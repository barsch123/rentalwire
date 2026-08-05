<?php

namespace App\Livewire;

use App\Models\Blogs;
use Illuminate\View\View;
use Livewire\Component;

class Charts extends Component
{
    public int $published = 0;

    public int $untagged = 0;

    public int $drafts = 0;

    /**
     * @var array<int, array{label: string, full_label: string, count: int}>
     */
    public array $monthlyCounts = [];

    public function mount(): void
    {
        $blogs = Blogs::query()
            ->withCount('tags')
            ->get();

        $this->published = $blogs->whereNotNull('published_at')->count();
        $this->untagged = $blogs
            ->where('tags_count', 0)
            ->count();
        $this->drafts = $blogs->whereNull('published_at')->count();

        $firstMonth = now()->startOfMonth()->subMonths(5);

        $this->monthlyCounts = collect(range(0, 5))
            ->map(function (int $monthOffset) use ($blogs, $firstMonth): array {
                $month = $firstMonth->copy()->addMonths($monthOffset);

                return [
                    'label' => $month->format('M'),
                    'full_label' => $month->format('F Y'),
                    'count' => $blogs
                        ->filter(fn (Blogs $blog): bool => $blog->published_at?->isSameMonth($month) ?? false)
                        ->count(),
                ];
            })
            ->all();
    }

    public function render(): View
    {
        return view('livewire.charts');
    }
}
