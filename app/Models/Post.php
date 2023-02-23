<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($filters, $search) =>
        $query->where(fn($query) =>
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('title', 'like', '%' . request('search') . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($filters, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($filters, $category) =>
            $query->whereHas('author', fn ($query) =>
            $query->where('username', $category)
            )
        );

    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
