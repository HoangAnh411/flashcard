<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['question', 'answer', 'is_learned', 'category_id'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_learned' => 'boolean',
    ];

    /**
     * Get the category that owns the flashcard.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
