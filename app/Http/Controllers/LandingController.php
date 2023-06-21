<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() 
    {
        $pengumumans = Pengumuman::all();
        $gallery = Gallery::all();
        return view('landingpage', compact('pengumumans', 'gallery'));
    }
}
