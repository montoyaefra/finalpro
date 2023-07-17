<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class ShowItems extends Component
{
    public $search = '';

    public function render()
    {
        $categories = Category::with(['items' => function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }])->get();

        
        return view('livewire.show-items', compact('categories'));
    }
}
