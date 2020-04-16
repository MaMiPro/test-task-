<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  public function roles()
    {
        return $this->belongsToMany(Role::class,'roles_permissions'); // определяем отношения многи ко многим между ролями и правами
    }
}
