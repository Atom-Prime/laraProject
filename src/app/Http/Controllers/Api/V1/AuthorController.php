<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Author::all()->toResourceCollection());
    }
    public function store(Request $request): JsonResponse
    {
        $author = Author::create($request->only([
            'name',
            'year_birth'
        ]))->toResource();
        return response()->json($author, 201);
    }

    public function show(int $id): JsonResponse
    {
        $author = Author::find($id);

        if (!empty($author)) {
            return response()->json([
                'result' => 'success',
                'data' => new AuthorResource($author)
            ]);
        }

        return response()->json([
            'result' => false,
            'message' => 'Not found'
        ], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        $author = Author::find($id);

        if (empty($author)) {
            return response()->json([
                'result' => false,
                'message' => 'Not found'
            ], 404);
        }

        if ($author->books()->exists()) {
            return response()->json([
                'result' => false,
                'message' => 'У автора есть привязанные книги'
            ], 404);
        }

        if (!$author->delete()) {
            return response()->json(
                ['result' => false],
                500
            );
        }
        return response()->json(['result' => 'success']);
    }

}
