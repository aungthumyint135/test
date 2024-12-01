<?php

namespace App\Models\LatestNews;


use App\Foundation\Eloquent\Model;
use Illuminate\Support\Facades\App;

class LatestNews extends Model
{
    protected $fillable = [
        'title_en',
        'title_ch',

        'text_en',
        'text_ch',

        'image',
        'is_active'
    ];

    protected $appends = [
        'title_locale',
        'text_locale'
    ];

    public function getTitleLocaleAttribute()
    {
        $locale = App::getLocale(); // Get the current locale
        $attribute = "title_{$locale}";

        return $this->getAttribute($attribute) ?? $this->getAttribute('title_en'); // Fallback to 'title_en'
    }

    // Accessor for text_locale
    public function getTextLocaleAttribute()
    {
        $locale = App::getLocale(); // Get the current locale
        $attribute = "text_{$locale}";

        return $this->getAttribute($attribute) ?? $this->getAttribute('text_en'); // Fallback to 'text_en'
    }
}
