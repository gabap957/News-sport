<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class post extends Model
{
    use HasFactory;
    protected $fillable  = ['name','content','title','url','category_id','image_id','type_id','user_id','view'];
    public function image()
    {
        return $this->belongsTo(image::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function type()
    {
        return $this->belongsTo(type::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

