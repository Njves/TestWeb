<?php

namespace App\Http\Controllers;

use App\DTO\UnitDto;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function store(UnitDto $dto) {
        return response()->json(['unit' => Unit::updateOrCreate(['id' => $dto->id], $dto->toArray())]);
    }

    public function delete(Unit $unit) {
        return response()->json([$unit->deleteOrFail()]);
    }

    public function get() {
        return response()->json(['units' => Unit::all()]);
    }

    public function getOne(Unit $unit) {
        return response()->json(['unit' => $unit]);
    }
}
