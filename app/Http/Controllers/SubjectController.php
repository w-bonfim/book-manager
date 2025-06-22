<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subject\StoreRequest;
use App\Http\Requests\Subject\UpdateRequest;
use App\Services\SubjectService;

class SubjectController extends Controller
{
    protected SubjectService $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    public function index()
    {
        $subjects = $this->subjectService->getAll();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(StoreRequest $request)
    {
        $this->subjectService->create($request->validated());
        return redirect()->route('subjects.index')->with('success', 'Cadastro com sucesso.');
    }

    public function edit($id)
    {
        $subject = $this->subjectService->find($id);
        return view('subjects.edit', compact('subject'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $this->subjectService->update($id, $request->validated());
        return redirect()->route('subjects.index')->with('success', 'Atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $this->subjectService->delete($id);
        return redirect()->route('subjects.index')->with('success', 'Deletado com sucesso.');
    }
}
