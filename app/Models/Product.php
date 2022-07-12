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
         if($filters['search'] ?? false){ 
            $query->where('title','like','%' . $filters['search'] . '%')
                  ->orWhere('description','like','%' . $filters['search'] . '%');
        }
    }
}
