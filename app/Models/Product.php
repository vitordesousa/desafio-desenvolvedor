<?php

namespace App\Models;

class Product extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
        'value',
        'description',
        'enabled',
    ];
}
