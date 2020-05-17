<?php

use App\Models\Language;
use App\Repositories\Interfaces\LanguageRepositoryInterface;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    protected $language;

    public function __construct(LanguageRepositoryInterface $languageRepositoryInterface)
    {
        $this->language = $languageRepositoryInterface;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * default language
         */
        $language = config('eCommerce.language');
        $language['is_default'] = 1;
        $this->language->create($language);

    }
}
