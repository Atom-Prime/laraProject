<?php

namespace App\Models;

use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends Model
{
    protected $fillable = ['name'];

    protected static function booted(): void
    {
        static::addGlobalScope(new ActiveScope());
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
