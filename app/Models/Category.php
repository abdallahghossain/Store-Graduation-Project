<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasFactory, SoftDeletes,Searchable;
    protected $fillable = [
        'name', 'description', 'image', 'status', 'slug',
        'products_count'
    ];
    protected $searchableFields = ['*'];

    public function products()
    {
        return $this->hasMany(product::class, 'category_id', 'id');
    }
    public function scopeActive(Builder $builder){
        $builder->where('status', '=', 'active');
    }
}
