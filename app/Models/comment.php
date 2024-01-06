<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class comment extends Model
{
    use HasFactory;
    protected $fillable =['comment' ,'user_id','post_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function post(){
        return $this->belongsTo(post::class);
    }
    public function commentchildren(){
        return $this->hasMany(commentchildren::class);
    }
}
