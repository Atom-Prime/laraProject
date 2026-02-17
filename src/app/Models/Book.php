<?php

namespace App\Models;

use App\Core\Traits\HasFilter;
use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFilter;
    protected $fillable = [
        'title',
        'active',
        'author_id',
        'genre_id',
        'language_id',
        'year',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ActiveScope());
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
