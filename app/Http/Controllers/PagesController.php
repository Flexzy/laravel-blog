<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index() {
        return view('pages.index');
    }

    public function about() {
        $data = [
            'title' => 'About',
            'body' => 'This is the about page where we talk about our LSAPP site',
        ];
        return view('pages.about')->with($data);
    }

    public function services() {
        $data = [
            'title' => 'Services',
            'services' => ['Codemy', 'Tutorials and Lectures', 'Auditing']
        ];
        return view('pages.services')->with($data);
    }
 
}
