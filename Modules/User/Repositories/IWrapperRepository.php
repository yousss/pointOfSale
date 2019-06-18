<?php
namespace Modules\User\Repositories; 

interface IWrapperRepository {
    public function getUserRepository () ;
    public function getPermissionRepository () ;
    public function getRoleRepository () ;
}