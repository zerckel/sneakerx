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
    public $product;

    /**
     * Create a new component instance.
     *
     * @param $product
     */
    public function __construct($product)
    {
        $this->product = $product;
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
