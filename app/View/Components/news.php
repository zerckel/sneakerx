<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class news extends Component
{

    public $id;
    public $title;
    public $date;
    public $resume;

    /**
     * Create a new component instance.
     *
     * @param $news
     */
    public function __construct($news)
    {
        $this->id = $news->id;
        $this->title = $news->title;
        $this->date = $news->updated_at;
        $this->resume = $news->resume;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.news');
    }
}
