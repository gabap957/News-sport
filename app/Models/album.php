<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    use HasFactory;
    protected $fillable =['name' ,'url','cate_id'];
    public function category_album()
    {
        return $this->belongsTo(category::class);
    }
}
