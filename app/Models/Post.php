<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $guarded = []; // not allow mass assignment
    // protected $fillable = ['title']; // only allow

    protected $with = ['cate', 'author'];

    public function scopeFilter($query, $request)
    {
        $query->when($request['search'] ?? false, function ($query, $search) {
            $query->where(
                fn ($query) => $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            );
        });

        $query->when($request['category'] ?? false, function ($query, $category) {
            $query->whereHas(
                'cate',
                fn ($query) => $query->where('slug', $category)
            );
        });

        $query->when($request['author'] ?? false, function ($query, $author) {
            $query->whereHas(
                'author',
                fn ($query) => $query->where('name', $author)
            );
        });
    }

    public function cate()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
