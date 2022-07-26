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
        'subcategory_id',
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
   
        $query->when($filters['subcategory'] ?? false, fn($query, $subcategory) => 
            $query->whereHas('subcategory', fn ($query) => 
                $query->where('slug', $subcategory)
            )
        );
    }
    
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}
