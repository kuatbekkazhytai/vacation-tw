<?php

namespace App\Http\Repository;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends Repository
{
    /**
     * @return Collection
     */
    public function list(): Collection
    {
        if (auth()->user()->isEmployer()) {
            $users = User::employees()->latest()->get();
        } else {
            $users = User::employees()->where('id', '!=', auth()->id())->latest()->get();;
        }
        $users->load('vacation');

        return $users;
    }
}
