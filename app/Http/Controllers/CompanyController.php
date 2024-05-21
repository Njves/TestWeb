<?php

namespace App\Http\Controllers;

use App\DTO\CompanyDto;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(CompanyDto $dto) {
        return response()->json(['company' => Company::updateOrCreate(['id' => $dto->id], $dto->toArray())]);
    }

    public function delete(Company $company) {
        return response()->json([$company->deleteOrFail()]);
    }

    public function get() {
        return response()->json(['companies' => Company::all()]);
    }

    public function getOne(Company $company) {
        return response()->json(['company' => $company]);
    }
}
