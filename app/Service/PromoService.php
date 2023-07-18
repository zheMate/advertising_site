<?php

namespace App\Service;

use App\Models\Promo;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PromoService
{
    //todo: Можно юзать Eloquent
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

    //todo: Можно юзать Eloquent
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

    /*
     * Для таких запросов можно использовать ORM Eloquent
     * Ныне кастомят запросы, которые выдают большую нагрузку на БД и сервер
     * Да и если ты поставишь имена в форме как поля в бд, то можно после валидации прописать
     * Promo::create($data) всего 1 строка
     */
}
