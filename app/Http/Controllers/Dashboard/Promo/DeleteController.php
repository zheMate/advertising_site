<?php

namespace App\Http\Controllers\Dashboard\Promo;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Promo $promo)
    {
        $promo->delete();
        return redirect()->route('dashboard.promo.index');
    }
}
