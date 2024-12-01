<?php

namespace App\Foundation\Eloquent\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasTranslation
{
    /**
     * @return Attribute
     */
    protected function title(): Attribute
    {
        return $this->attribute();
    }

    private function attribute($key = 'name'): Attribute
    {
        $lang = request()->get('lang');

        return new Attribute(
            get: fn() => $lang === 'cn' ? $this->cn_name: $this->en_name
        );
    }

    protected function slug(): Attribute
    {
        return $this->attribute();
    }

    protected function name(): Attribute
    {
        return $this->attribute();
    }
}
