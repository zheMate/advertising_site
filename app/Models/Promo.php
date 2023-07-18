<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//todo: Модель так же называется Promo, что не совсем ясно показывает сущность лучше назвать Product
/*
 * У тебя одна модель идет на авто, недвижимость, услуги и товары для дома
 * Это разные сущности и было бы лучше вынести их в разные таблицы, нежели делать поле category
 * У авто есть свои категории и классы (седан, хетчбек и т.д.), то же самое про другие категории
 */
class Promo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'promos';
    protected $guarded = false;

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
