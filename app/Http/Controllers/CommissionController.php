<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index() {
        $commissions = Commission::all();
        dd($commissions);
        return view('commissions.index', compact('commissions'));
    }
}
