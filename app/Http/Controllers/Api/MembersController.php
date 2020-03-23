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
        $memberQuery = Member::query();

        if ($request->has('firstname')) {
            $memberQuery->withFirstNameContaining($request->firstname);
        }

        if ($request->has('surname')) {
            $memberQuery->withSurnameContaining($request->surname);
        }

        if ($request->has('email')) {
            $memberQuery->withEmailContaining($request->email);
        }

        $perPage = $request->has('per_page') ? $request->per_page : 10;

        return new Members($memberQuery->paginate($perPage));
    }
}
