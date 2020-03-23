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
        $memberQuery = Member::withFirstNameContaining($request->firstname)
            ->withSurnameContaining($request->surname)
            ->withEmailContaining($request->email);

        $perPage = $request->has('per_page') ? $request->per_page : 10;
        $page    = $request->has('page') ? $request->page : 1;

        return new Members($memberQuery->paginate($perPage, ['*'], 'page', $page));
    }
}
