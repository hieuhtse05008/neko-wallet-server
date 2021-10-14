<?php


namespace App\Models;

use Spatie\Translatable\HasTranslations as BaseHasTranslations;

trait HasTranslations
{
    use BaseHasTranslations;

    private $skipTranslation = false;


    public function getAttributeValue($key)
    {
        if (! $this->isTranslatableAttribute($key) || $this->skipTranslation) {
            return parent::getAttributeValue($key);
        }

        return  $this->getTranslation($key, $this->getLocale());
    }

    public function skipTranslation(bool $skipTranslation)
    {
        $this->skipTranslation = $skipTranslation;
    }
}
