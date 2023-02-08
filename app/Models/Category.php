<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','thumbnail','description','parent_id'];
    public function scopeOnlyParents($querry)
    {
        return $querry->whereNull('parent_id');
    }
    public function scopeSearch($querry, $title)
    {
        return $querry->where('title','LIKE',"%{$title}%");
    }
    public function parent()
    {
        return $this->belongsTo(self::class);
    }
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function descendants()
    {
        return $this->children()->with('descendants');
    }
    public function root()
    {
        return $this->parent ? $this->parent->root() : $this;
    }
}
