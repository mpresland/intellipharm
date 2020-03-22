<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MembersRequest;
use App\Http\Resources\Members;
use App\Models\Member;

class MembersController extends Controller
{
    public function index(MembersRequest $request)
    {
        $memberRequest = Member::query();

        if ($request->has('firstname')) {
            $memberRequest->withFirstNameContaining($request->firstname);
        }

        if ($request->has('surname')) {
            $memberRequest->withSurnameContaining($request->surname);
        }

        if ($request->has('email')) {
            $memberRequest->withEmailContaining($request->email);
        }

        return new Members($memberRequest->simplePaginate());
    }
}
