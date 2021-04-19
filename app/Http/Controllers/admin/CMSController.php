<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\admin\Content;


class CMSController extends Controller
{
    public function index() {

        return view('admin/index') ;
    }

    public function hompageHeader () {
        return view('admin/homePage') ;

    }
}
