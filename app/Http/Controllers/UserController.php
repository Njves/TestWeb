<?php

namespace App\Http\Controllers;

use App\DTO\UserDto;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(UserDto $dto) {
        response()->json(['user' => User::updateOrCreate(['id' => $dto->id], array_filter($dto->toArray()))]);
    }

    public function delete(User $user) {
        response()->json([$user->deleteOrFail()]);
    }

    public function get() {
        return response()->json(['users' => User::all()]);
    }

    public function getOne(User $user) {
        return response()->json(['user' => $user]);
    }
}
