<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class post extends Model
{
    use HasFactory;
    protected $post = ['name','description','active','created_date','title','url','category_id','image_id'];
    public function image() :HasOne
    {
        return $this->hasOne(image::class);
    }
}
