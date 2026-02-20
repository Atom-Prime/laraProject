<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\BookFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Filters\FilterBookRequest;
use App\Http\Requests\Store\StoreBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(FilterBookRequest $request, BookFilter $filter): JsonResponse
    {
        $books = Book::filter($filter)->get();
        return response()->json(BookResource::collection($books));
    }

    public function store(StoreBookRequest $request): JsonResponse
    {
        return response()->json(new BookResource(Book::create($request->validated())), 201);
    }

    public function show(int $id): JsonResponse
    {
        $book = Book::find($id);
        if (empty($book)) {
            return response()->json(
                [
                    'result' => 'false',
                    'message' => 'Книга не найдена'
                ],
                404
            );
        }
        return response()->json(new BookResource($book));
    }

    public function update(Request $request, Book $book): JsonResponse
    {
        $book->update($request->only([
            'title',
            'author_id',
            'genre_id',
            'language_id',
            'year'
        ]));

        return response()->json(new BookResource($book));
    }
    public function destroy(int $id): JsonResponse
    {
        $book = Book::find($id);

        if(empty($book)){
            return response()->json(
                [
                    'result' => 'false',
                    'message' => 'Книга не найдена'
                ],
                404
            );
        }
        if (!Book::destroy($id)) {
            return response()->json(
                [
                    'result' => 'false',
                    'message' => 'Ошибка удаления книги'
                ],
                500
            );
        }

        return response()->json([
            'result' => 'succes',
            'message' => 'Книга удалена'
        ]);
    }
}
