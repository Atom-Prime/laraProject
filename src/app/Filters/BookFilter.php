<?php

namespace App\Filters;

use App\Core\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class BookFilter extends Filter
{
    protected function title(string $value): Builder
    {
        return $this->builder->where('title', $value);
    }

    protected function author(string $value): Builder
    {
        return $this->builder->where('author_id', $value);
    }

    protected function genre(string $value): Builder
    {
        return $this->builder->where('genre_id', $value);
    }

    protected function language(string $value): Builder
    {
        return $this->builder->where('language_id', $value);
    }
}
