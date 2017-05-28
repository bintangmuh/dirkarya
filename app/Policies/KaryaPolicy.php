<?php

namespace App\Policies;

use App\User;
use Auth;
use App\Karya;
use Illuminate\Auth\Access\HandlesAuthorization;

class KaryaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Karya $karya) {
      if ($user->id === $karya->user->id) {
        return true;
      } else {
        return false;
      }
    }

}
