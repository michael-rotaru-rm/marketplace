<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'slug',
        'title',
        'description',
        'price',
        'image_url',
    ];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query, $search) => 
            $query->where(fn($query) => 
                $query->where('title','like','%' . $filters['search'] . '%')
                ->orWhere('description','like','%' . $filters['search'] . '%')
            )
        );
        

   
        $query->when($filters['category'] ?? false, fn($query, $category) => 
            $query->whereHas('category', fn ($query) => 
                $query->where('slug', $category)
            )
        );
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
