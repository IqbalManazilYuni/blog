<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug'];

    public function scopeSearch($querry, $title)
    {
        return $querry->where('title','LIKE',"%{$title}%");
    }
}
