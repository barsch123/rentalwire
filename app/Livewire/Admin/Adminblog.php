<?php

namespace App\Livewire\Admin;

use App\Models\Tag;
use App\Models\Blogs;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

#[Layout('components.layouts.app')]
class Adminblog extends Component
{
    use WithPagination, WithFileUploads;

    public $blog_id, $title, $content, $slug, $tagsInput, $blog_photo;
    public $isEdit = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'slug' => 'required|string|max:255|unique:blogs,slug',
        'tagsInput' => 'nullable|string',
        'blog_photo' => 'nullable|image|max:2048',
    ];

    public function render()
    {
        return view('livewire.admin.adminblog', [
            'blogs' => Blogs::with('tags')->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    public function resetFields()
    {
        $this->blog_id = null;
        $this->title = '';
        $this->content = '';
        $this->slug = '';
        $this->tagsInput = '';
        $this->blog_photo = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();

        $this->generateSlug($this->title);

        $blogData = [
            'title' => $this->title,
            'content' => $this->content,
            'slug' => $this->slug,
            'published_at' => now(),
            'modified_at' => now(),
        ];

        if ($this->blog_photo) {
            $blogData['blog_photo'] = $this->blog_photo->store('blog_photos', 'public');
        }

        $blog = Blogs::create($blogData);

        $this->syncTags($blog, $this->tagsInput);

        session()->flash('message', 'Blog created successfully.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $blog = Blogs::with('tags')->findOrFail($id);

        $this->blog_id = $blog->id;
        $this->title = $blog->title;
        $this->content = $blog->content;
        $this->slug = $blog->slug;
        $this->tagsInput = $blog->tags->pluck('name')->implode(', '); // Convert tags to a comma-separated string
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $this->blog_id,
            'tagsInput' => 'nullable|string',
            'blog_photo' => 'nullable|image|max:2048',
        ]);

        $blog = Blogs::findOrFail($this->blog_id);

        $blogData = [
            'title' => $this->title,
            'content' => $this->content,
            'slug' => $this->slug,
            'modified_at' => now(),
        ];

        if ($this->blog_photo) {
            $blogData['blog_photo'] = $this->blog_photo->store('blog_photos', 'public');
        }

        $blog->update($blogData);

        $this->syncTags($blog, $this->tagsInput);

        session()->flash('message', 'Blog updated successfully.');
        $this->resetFields();
    }

    public function delete($id)
    {
        Blogs::findOrFail($id)->delete();
        session()->flash('message', 'Blog deleted successfully.');
    }


    public function deleteAllTags()
    {
        // Delete all blog_tag pivot records first
        DB::table('blog_tag')->delete();
        Tag::truncate();
    }

    private function syncTags($blog, $tagsString)
    {
        $tagsArray = array_filter(array_map('trim', explode(',', $tagsString)));

        $tagIds = [];
        foreach ($tagsArray as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $tagIds[] = $tag->id;
        }

        $blog->tags()->sync($tagIds);
    }

    public function generateSlug($name)
    {
        $this->slug = Str::slug($name);
    }

    public function updatedTitle($value)
    {
        $this->generateSlug($value);
    }
}
