<?php

namespace App\Traits;
use App\Role;
use App\Permission;
trait HasRolesAndPermissions
{
    /**
     * @return mixed
     */

    // отношения многие ко многим для модели user
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }
    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }

    /**
 * @param mixed ...$roles
 * @return bool
 */

 // передаём массив и проверяем есть ли роль у пользователя
public function hasRole(... $roles ) {
    foreach ($roles as $role) {
        if ($this->roles->contains('slug', $role)) {
            return true;
        }
    }
    return false;
  }


  /**
* @param $permission
* @return bool
*/

// проверка связана ли роль с правами
protected function hasPermission($permission)
  {
    return (bool) $this->permissions->where('slug', $permission->slug)->count();
  }
/**
* @param $permission
* @return bool
*/

// проверка доступа пользователя
protected function hasPermissionTo($permission)
  {
   return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
  }

  /**
 * @param $permission
 * @return bool
 */

 // проверка пользователя есть ли у него права на роль
public function hasPermissionThroughRole($permission)
{
    foreach ($permission->roles as $role){
        if($this->roles->contains($role)) {
            return true;
        }
    }
    return false;
}

/**
 * @param array $permissions
 * @return mixed
 */

 // получаем права из массива
protected function getAllPermissions(array $permissions)
{
    return Permission::whereIn('slug',$permissions)->get();
}
/**
 * @param mixed ...$permissions
 * @return $this
 */

// передаём права в виде массива
public function givePermissionsTo(... $permissions)
{
    $permissions = $this->getAllPermissions($permissions);
    if($permissions === null) {
        return $this;
    }
    $this->permissions()->saveMany($permissions); // сохраняем разрешения для пользователя
    return $this;
}

/**
 * @param mixed ...$permissions
 * @return $this
 */
 // удаление прав
public function deletePermissions(... $permissions )
{
    $permissions = $this->getAllPermissions($permissions);
    $this->permissions()->detach($permissions);
    return $this;
}
/**
 * @param mixed ...$permissions
 * @return HasRolesAndPermissions
 */
public function refreshPermissions(... $permissions )
{
    $this->permissions()->detach();
    return $this->givePermissionsTo($permissions);
}

}
