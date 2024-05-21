<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\DTO\NoteDto;
use App\Models\Note;

class NoteController extends Controller
{
    public function store(NoteDto $dto) {
        return response()->json(['note' => Note::updateOrCreate(['id' => $dto->id], array_filter($dto->toArray()))]);
    }

    public function delete(Note $note) {
        return response()->json([$note->deleteOrFail()]);
    }

    public function get() {
        return response()->json(['notes' => Note::all()]);
    }

    public function getOne(Note $note) {
        return response()->json(['note' => $note]);
    }
}
