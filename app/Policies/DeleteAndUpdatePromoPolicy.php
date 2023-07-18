<?php

namespace App\Policies;

use App\Models\Promo;
use App\Models\User;

class DeleteAndUpdatePromoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Promo $promo) {
        return $user->id === $promo->user_id;
    }
    public function destroy(User $user, Promo $promo) {
        return $this->update($user, $promo);
    }
    //todo: check in dashboard
}
