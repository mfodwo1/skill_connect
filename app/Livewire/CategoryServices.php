<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class CategoryServices extends Component
{
    public $services;
    public $categoryId;

    public function mount($categoryId)
    {
        $this->categoryId = $categoryId;
        $this->services = Service::whereHas('categories', function ($query) {
            $query->where('category_id', $this->categoryId);
        })->get();
    }
    public function render()
    {
        return view('livewire.category-services');
    }
}
