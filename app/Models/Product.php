<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, SoftDeletes, Searchable,HasTranslations;


    protected $fillable = [
        'name', 'description', 'category_id', 'image',
        'price', 'compare_price', 'status'
    ];
    protected $casts = ['name'=> 'array'];
    protected $searchableFields = ['*'];
    protected $translatable =['name'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }
    public function getSalePercentAttribute()
    {
        if (!$this->compar_price) {
            return 0;
        }
        return round(100 - (100 * $this->price  / $this->compare_price), 1);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
    public function ratingCount()
    {
        return $this->reviews()->count();
    }
}
