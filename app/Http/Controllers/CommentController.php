<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\ICRUD;
use App\Models\comment;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add(Request $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = $request->user()->id;
            unset($data['_token']);
            comment::create($data);
        }
        catch (Exception $exception){
            return redirect()->back()->with('error', 'Thêm bình luận thất bại');
        }
        return redirect()->back()->with('success', 'Thêm bình luận thành công');
    }

}
