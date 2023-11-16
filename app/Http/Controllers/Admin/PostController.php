<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class PostController extends Controller implements ICRUD
{
    //
    public function list()
    {
        $list = post::all();
        $categories = category::all();
        // dd($list);
        return view('be.interface.post', compact('list','categories'));
    }

    public function add(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            unset($data['insert']);
            DB::table('posts')->insert($data);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'thêm thất bại!');
        }
        return redirect()->back()->with('success', 'thêm thành công!');
    }

    public function edit(Request $request)
    {
        // TODO: Implement edit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
