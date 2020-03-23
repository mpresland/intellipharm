<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberStatisticsController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('members');

        if ($request->has('year') && !is_null($request->year)) {
            $query->select(DB::raw("DATE_FORMAT(joined_date, '%m') period"), DB::raw('count(id) as count'))
                ->whereYear('joined_date', $request->year);
        } else {
            $query->select(DB::raw("DATE_FORMAT(joined_date, '%Y') period"), DB::raw('count(id) as count'));
        }

        $query->groupBy('period')
            ->orderBy('period');

        return response($query->get());
    }
}
