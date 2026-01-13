<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Language::all());
    }

    public function store(Request $request): JsonResponse
    {
        $language = Language::create($request->only(['name', 'code']));

        return response()->json($language);
    }
}
