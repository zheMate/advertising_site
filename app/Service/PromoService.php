<?php

namespace App\Service;

use App\Models\Promo;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PromoService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();
            
            $promo = Auth::user()->promos()->firstOrCreate($data);
            
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $promo)
    {
        try {
            Db::beginTransaction();
            $promo->update($data);
            DB::commit();
        } 
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $promo;
    }
}
