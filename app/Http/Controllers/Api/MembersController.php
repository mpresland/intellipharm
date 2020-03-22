<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MembersRequest;
use App\Http\Resources\Members;
use App\Member;

class MembersController extends Controller
{
    public function index(MembersRequest $request)
    {
        return new Members(Member::paginate());
    }
}
