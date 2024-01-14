<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $year = date('Y');
        $month = date('m');
        $postMonth = post::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();
        $userMonth = User::whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
        $postMostView = post::whereYear('created_at', $year)->whereMonth('created_at', $month)->orderBy('view', 'desc')->take(5)->get();
        return view('be.interface.dashboard', compact('postMonth', 'userMonth', 'month', 'year', 'postMostView'));
    }
    public function chartYear()
    {
        $postYearAgo = post::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('COUNT(*) as count'),
        )
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();
        return response()->Json($postYearAgo, 200);
    }
    public function chartMonth(Request $request)
    {
        $year = $request->year;
        $postDiagram = post::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count'),
        )
            ->whereYear('created_at', $year)
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();
        return response()->Json($postDiagram, 200);
    }
    public function chartCategory(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $countPost = post::select(
            'category.name',
            DB::raw('COUNT(*) as count'),
            DB::raw('YEAR(posts.created_at) as year'),
            DB::raw('MONTH(posts.created_at) as month'),
        )
            ->join('categories as category', 'posts.category_id', '=', 'category.id')
            ->whereYear('posts.created_at', $year)
            ->whereMonth('posts.created_at', $month)->groupBy('category.name', 'year', 'month')->get();
        return response()->Json($countPost, 200);
    }
}
