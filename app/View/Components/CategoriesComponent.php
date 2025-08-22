<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\category;

class CategoriesComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = category::all();
        $data = [
            'categories' => $categories
        ];
        return view('components.categories-component',$data);
    }
}
