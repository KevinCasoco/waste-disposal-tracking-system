<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrashBinController extends Controller
{
    public function index()
    {
        return view('admin-trash-bin');
    }
}
