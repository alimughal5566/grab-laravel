<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodGallery extends Model
{
    protected $guarded = ['id'];

    public function FoodCategory()
    {
        return $this->belongsTo(FoodCategory::class, 'food_category_id');
    }
}
