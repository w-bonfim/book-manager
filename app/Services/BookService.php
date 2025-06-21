<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Author;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Exception;

class BookService
{
    public function getAll()
    {
        return Book::with(['authors', 'subjects'])->paginate(10);
    }

    public function findById($id)
    {
        return Book::with(['authors', 'subjects'])->findOrFail($id);
    }

    public function create(array $data)
    {
        DB::beginTransaction();

        try {
            $book = Book::create([
                'title' => $data['title'],
                'edition' => $data['edition'],
                'value' => $data['value'],
                'publisher' => $data['publisher'],
                'published_year' => $data['published_year'],
            ]);

            $book->authors()->sync($data['authors']);
            $book->subjects()->sync($data['subjects']);

            DB::commit();
            return $book;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Error: Create book: ' . $e->getMessage());
        }
    }

    public function update($id, array $data)
    {
        DB::beginTransaction();

        try {
            $book = Book::findOrFail($id);

            $book->update([
                'title' => $data['title'],
                'edition' => $data['edition'],
                'value' => $data['value'],
                'publisher' => $data['publisher'],
                'published_year' => $data['published_year'],
            ]);

            $book->authors()->sync($data['authors']);
            $book->subjects()->sync($data['subjects']);

            DB::commit();
            return $book;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Error: Update book:'. $e->getMessage());
        }
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->authors()->detach();
        return $book->delete();
    }

    public function getAuthors()
    {
        return Author::all();
    }

    public function getSubjects()
    {
        return Subject::all();
    }
}
