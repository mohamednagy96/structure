<?php

namespace App\Repositories;

use App\Models\Language;
use App\Repositories\Interfaces\LanguageRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class LanguageRepository implements LanguageRepositoryInterface{


    public function get(){
        return Language::get();
    }

    public function create(array $attributes){
        Language::create($attributes);
        $this->setLanguagesCache();
    }

    public function update(Language $language, array $attributes){
        $language->update($attributes);
        $this->setLanguagesCache();
    }

    public function delete(Language $language){
        $language->delete();
        $this->setLanguagesCache();
    }

    public function setLanguagesCache(){
        $langs = $this->get()->pluck('locale');
        Cache::put('langs', $langs);
    }

}
