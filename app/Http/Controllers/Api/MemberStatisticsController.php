<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberStatisticsController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('members')
            ->select(DB::raw("DATE_FORMAT(joined_date, '%Y') period"), DB::raw('count(id) as count'))
            ->groupBy('period')
            ->orderBy('period');

        return response($query->get());
    }
}
