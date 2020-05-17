<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $breadcrumb;

    public $breadcrumbModel;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($breadcrumb = null, $breadcrumbModel = null)
    {
        $this->breadcrumb = $breadcrumb;
        $this->breadcrumbModel = $breadcrumbModel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.components.breadcrumb');
    }
}
