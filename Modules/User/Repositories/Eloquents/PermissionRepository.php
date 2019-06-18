<?php 

namespace Modules\User\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Modules\User\Repositories\Contracts\IPermissionRepository;
use Modules\User\Entities\Permission;

class PermissionRepository extends BaseRepository implements IPermissionRepository {
    
    /**
     * Load model to use in abstract class
     * @return class name
     */
    public function model () {
        return Permission::class;
    }

}
