<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $fillable  = [ 'name','OriginalName', 'description','path_url','album_id'];

    public function album()
    {
        return $this->belongsTo(album::class);
    }
    public function post(){
        return $this->hasOne(post::class);
    }
}
