<?php

namespace App\Models;

use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    protected $fillable = [
        'name',
        'code'
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
