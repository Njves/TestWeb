<?php

namespace App\Http\Controllers;

use App\DTO\ContactDto;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(ContactDto $dto) {
        return response()->json(['contact' => Contact::updateOrCreate(['id' => $dto->id], $dto->toArray())]);
    }

    public function delete(Contact $contact) {
        return response()->json([$contact->deleteOrFail()]);
    }

    public function get() {
        return response()->json(['contacts' => Contact::all()]);
    }

    public function getOne(Contact $contact) {
        return response()->json(['contact' => $contact]);
    }
}
