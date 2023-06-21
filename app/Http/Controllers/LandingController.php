<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() 
    {
        $pengumumans = Pengumuman::all();
        return view('landingpage', compact('pengumumans'));
    }
}
