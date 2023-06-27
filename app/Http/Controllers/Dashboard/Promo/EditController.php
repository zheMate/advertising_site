<?php

namespace App\Http\Controllers\Dashboard\Promo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;
use App\Models\Category;

class EditController extends BaseController
{
    public function __invoke(Promo $promo)
    {
        $categories = Category::all();
        return view('dashboard.promo.edit', compact('promo', 'categories'));
    }
}
