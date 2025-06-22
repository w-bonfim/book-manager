<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Author;
use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BooksReportExportTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_autenticado_pode_cadastrar_livro()
    {
        $user = User::factory()->create();
        $author = Author::factory()->create();
        $subject = Subject::factory()->create();

        $response = $this->actingAs($user)->post('/books', [
            'title' => 'Livro Teste',
            'publisher' => 'Editora Teste',
            'edition' => 1,
            'published_year' => '2024',
            'value' => 99.90,
            'authors' => [$author->id],
            'subjects' => [$subject->id],
        ]);

        $response->assertRedirect('/books');
        $this->assertDatabaseHas('books', ['title' => 'Livro Teste']);
    }

    public function test_usuario_autenticado_pode_exportar_excel()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/reports/books/export');

        $response->assertStatus(200);
        $response->assertHeader('content-disposition', 'attachment; filename=relatorio_livros.xlsx');
    }
}
