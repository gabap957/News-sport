<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    use HasFactory;
    protected $fillable =['name' ,'url','category_id'];

    public function category(){
        return $this->hasOne(category::class);
    }
    public function image(){
        return $this->hasMany(image::class);
    }
}
