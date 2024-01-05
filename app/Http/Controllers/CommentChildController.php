<?php

namespace App\Http\Controllers;

use App\Models\commentchild;
use App\Models\commentchildren;
use Exception;
use Illuminate\Http\Request;


class CommentChildController extends Controller
{
    public function list()
    {}

    public function add(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            $data['user_id'] = $request->user()->id;
            commentchildren::create($data);
        }
        catch (Exception $exception){
            return redirect()->back()->with('error', 'Thêm bình luận thất bại');
        }
        return redirect()->back()->with('success', 'Thêm bình luận thành công');
    }
}
