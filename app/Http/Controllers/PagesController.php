<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function index()
    {
        return 'index';
    }
    public function edit($id)
    {
        return 'edit';
    }
    public function create()
    {
        return 'create';
    }
    public function show($id)
    {
        return 'show';
    }
}
