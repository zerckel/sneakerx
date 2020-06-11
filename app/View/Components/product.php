<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class product extends Component
{

    /**
     * The Product info.
     *
     * @var string
     */
    public $name;
    public $price;
    public $pics;
    public $id;

    /**
     * Create a new component instance.
     *
     * @param $product
     */
    public function __construct($product)
    {
        $this->name = $product->name;
        $this->price = $product->price;
        $this->pics = $product->mainpics;
        $this->id = $product->id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.product');
    }
}
