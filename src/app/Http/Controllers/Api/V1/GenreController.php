<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Genre::all());
    }

    public function store(Request $request): JsonResponse
    {
        $genre = Genre::create($request->only(['name']));

        return response()->json($genre);
    }
}
