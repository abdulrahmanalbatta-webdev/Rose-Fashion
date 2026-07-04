<?php

namespace App\Traits;

trait Trans
{
    // Name
    public function getTransNameAttribute()
    {
        return json_decode($this->name, true)[app()->getLocale()];
    }

    public function getNameEnAttribute()
    {
        return json_decode($this->name, true)['en'];
    }

    public function getNameArAttribute()
    {
        return json_decode($this->name, true)['ar'];
    }

    // Short Description
    public function getTransShortDescriptionAttribute()
    {
        return json_decode($this->description, true)[app()->getLocale()];
    }

    public function getShortDescriptionEnAttribute()
    {
        return json_decode($this->short_description, true)['en'];
    }

    public function getShortDescriptionArAttribute()
    {
        return json_decode($this->short_description, true)['ar'];
    }
    // Description
    public function getTransDescriptionAttribute()
    {
        return json_decode($this->short_description, true)[app()->getLocale()];
    }

    public function getDescriptionEnAttribute()
    {
        return json_decode($this->description, true)['en'];
    }

    public function getDescriptionArAttribute()
    {
        return json_decode($this->description, true)['ar'];
    }
}
