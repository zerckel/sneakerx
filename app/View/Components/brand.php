<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class brand extends Component
{

    public $brand;
    public $picture;

    /**
     * Create a new component instance.
     *
     * @param $brand
     */
    public function __construct($brand)
    {
        $this->brand = $brand;
        $this->picture = asset('storage/brands/' . $brand->pics);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.brand');
    }
}
