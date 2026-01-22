<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Property $property)
    {
        return $user->hasRole('admin')
            || ($user->hasRole('landlord') && $property->landlord->user_id === $user->id);
    }
}
