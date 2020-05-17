<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class LocaleInput extends Component
{
    public $langs;

    public $model;

    public $type;

    public $name;

    public $required;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'text', $name = 'name', $model = null, $required = true)
    {
        $this->langs = Cache::get('langs');
        $this->type = $type;
        $this->name = $name;
        $this->model = $model;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.components.form.locale_input');
    }
}
