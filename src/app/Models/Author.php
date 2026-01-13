<?php

namespace App\Models;

use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    protected $fillable = [
        'name',
        'year_birth'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ActiveScope());
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
