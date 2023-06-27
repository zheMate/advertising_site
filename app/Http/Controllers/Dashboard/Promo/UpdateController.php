<?php

namespace App\Http\Controllers\Dashboard\Promo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Promo\UpdateRequest;
use App\Models\Promo;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request ,Promo $promo)
    {
        $data = $request->validated();
        $promo = $this->service->update($data, $promo);
        return view('dashboard.promo.show', compact('promo'));
    }
}
