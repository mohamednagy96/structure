<?php

namespace App\Repositories\Interfaces;

use App\Models\Language;

interface LanguageRepositoryInterface{

    public function get();

    public function create(array $attributes);

    public function update(Language $language, array $attributes);

    public function delete(Language $language);
}
