<?php

namespace App\Http\Controllers;

use DB;
use App\Exports\ReportBookExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function books()
    {
        $books = DB::table('view_report_book')->get();
        return view('reports.book', compact('books'));
    }
    public function exportBooks()
    {
        return Excel::download(new ReportBookExport, 'relatorio_livros.xlsx');
    }
}
