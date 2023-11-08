<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Request;
interface ICRUD
{
    public function list();
    public function add();
    public function doAdd($id,Request $request);
    public function edit($id);
    public function doEdit($id, Request $request);
    public function delete($id);

}
