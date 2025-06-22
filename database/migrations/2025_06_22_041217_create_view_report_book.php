<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_report_book AS
            SELECT
                books.id,
                books.title AS livro,
                GROUP_CONCAT(DISTINCT authors.name) AS autores,
                GROUP_CONCAT(DISTINCT subjects.description) AS assuntos
            FROM books
            LEFT JOIN book_author ON books.id = book_author.book_id
            LEFT JOIN authors ON book_author.author_id = authors.id
            LEFT JOIN book_subject ON books.id = book_subject.book_id
            LEFT JOIN subjects ON book_subject.subject_id = subjects.id
            GROUP BY books.id, books.title
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_report_book");
    }
};
