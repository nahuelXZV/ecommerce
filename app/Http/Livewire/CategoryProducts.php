<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryProducts extends Component
{
    public $category;
    public $products = [];
    public function loadPosts()
    {
        $this->products = $this->category->products()->where('status', 2)->limit(15)->get();
        $this->emit('glider', $this->category->id);
    }
    public function mount(Category $category)
    {
    }
    public function render()
    {
        return view('livewire.category-products');
    }
}
