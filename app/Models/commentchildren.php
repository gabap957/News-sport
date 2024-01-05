<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentchildren extends Model
{
    use HasFactory;
    protected $fillable =['comment' ,'user_id','commentParent_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
