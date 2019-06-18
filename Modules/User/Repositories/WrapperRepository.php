<?php 

namespace Modules\User\Repositories; 


class WrapperRepository implements IWrapperRepository {
    
    private $user;
    private $permission;
    private $role;

    public function getUserRepository() {
        return $this->user == null ? $this->user = $this->mapping('user') : $this->user;
    }

    public function getPermissionRepository () {
        return $this->permission == null ? $this->permission = $this->mapping('permission') : $this->permission; 
    }

    public function getRoleRepository () {
        return $this->role == null ? $this->role = $this->mapping('role') : $this->role; 
    }
    
    private function mapping(string $provider)  {
        $provider = ucfirst($provider);
        $model = app("Modules\\User\\Repositories\\Eloquents\\{$provider}Repository");
        return app("Modules\\User\\Repositories\\Contracts\\I{$provider}Repository", [$model]);
    }

}