<?php

namespace App\Http\Controllers\Main\Promo;

use App\Models\Promo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $promos = $category->promos;
        return view('main.promo.index', compact('promos'));
    }
}
