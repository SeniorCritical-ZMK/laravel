<?php
/**
 * Created by PhpStorm.
 * User: pyaesoneaung
 * Date: 3/31/18
 * Time: 10:32
 */

namespace App\Modules\Internal\app\Policies;


use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before($user)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function show(User $user)
    {
        return $user->role AND $user->role->permissions->contains('user_view');
    }

    public function create(User $user)
    {
        return $user->role AND $user->role->permissions->contains('user_create');
    }

    public function update(User $user)
    {
        return $user->role AND $user->role->permissions->contains('user_update');
    }

    public function delete(User $user)
    {
        return $user->role AND $user->role->permissions->contains('user_delete');
    }
}