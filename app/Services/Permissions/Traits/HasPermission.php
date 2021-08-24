<?php


namespace App\Services\Permissions\Traits;


use App\Models\Permission;

trait HasPermission
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if ($permissions->isEmpty()) return $this;
        $this->permissions()->syncWithoutDetaching($permissions);
        return $this;
    }

    protected function getAllPermissions($permissions)
    {
        return Permission::whereIn('name', array_flatten($permissions))->get();
    }

    public function withdrawPermissions(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->sync($permissions);
        return $this;
    }

    public function hasPermission(Permission $permission): bool
    {
        return $this->hasPermissionsThroughRole($permission) || $this->permissions->contains($permission);
    }


    protected function hasPermissionsThroughRole(Permission $permission): bool
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) return true;
        }
        return false;
    }
}
