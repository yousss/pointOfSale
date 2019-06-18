<?php 

namespace Modules\User\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Modules\User\Repositories\Contracts\IRoleRepository;
use Modules\User\Entities\Role;

class RoleRepository extends BaseRepository implements IRoleRepository {
    
    /**
     * Load model to use in abstract class
     * @return class name
     */
    public function model () {
        return Role::class;
    }

}
