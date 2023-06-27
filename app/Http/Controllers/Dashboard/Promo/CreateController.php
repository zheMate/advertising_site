<?php

namespace App\Http\Controllers\Dashboard\Promo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('dashboard.promo.create', compact('categories'));
    }
}
