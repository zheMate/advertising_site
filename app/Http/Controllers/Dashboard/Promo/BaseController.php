<?php

namespace App\Http\Controllers\Dashboard\Promo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Service\PromoService;

class BaseController extends Controller
{
    public $service;
    public function __construct(PromoService $service)
    {
        $this->service = $service;

    }
}
