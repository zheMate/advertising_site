<?php

namespace App\Http\Controllers\Dashboard\Promo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Promo\StoreRequest;
use App\Models\Promo;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('dashboard.promo.index'); 
    }
}
