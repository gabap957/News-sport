<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class category extends Model
{
    use HasFactory;
    protected $category =['name' ,'parent_id','cate_url','active'];

    public function post(): HasOne
    {
        return $this->hasOne(post::class);
    }
}
