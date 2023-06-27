<?php

namespace App\Http\Controllers\Dashboard\Promo;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Promo $promo)
    {
        return view('dashboard.promo.show', compact('promo'));
    }
}
