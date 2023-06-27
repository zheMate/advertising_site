<?php

namespace App\Http\Controllers\Dashboard\Promo;

use App\Models\Promo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $promos = Auth::user()->promos()->latest()->get();
        return view('dashboard.promo.index', compact('promos'));
    }
}
