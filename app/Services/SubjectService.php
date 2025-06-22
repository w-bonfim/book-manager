<?php

namespace App\Services;

use App\Models\Subject;

class SubjectService
{
    public function getAll()
    {
        return Subject::orderBy('description')->paginate(10);
    }

    public function find($id)
    {
        return Subject::findOrFail($id);
    }

    public function create(array $data)
    {
        return Subject::create($data);
    }

    public function update($id, array $data)
    {
        $subject = Subject::findOrFail($id);
        $subject->update($data);
        return $subject;
    }

    public function delete($id)
    {
        $subject = Subject::findOrFail($id);
        return $subject->delete();
    }
}
