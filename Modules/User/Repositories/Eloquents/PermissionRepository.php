<?php 

namespace Modules\User\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Modules\User\Repositories\Contracts\IPermissionRepository;
use Modules\User\Entities\Permission;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

class PermissionRepository extends BaseRepository implements IPermissionRepository, CacheableInterface {
    
    use CacheableRepository;

    /**
     * Load model to use in abstract class
     * @return class name
     */
    public function model () {
        return Permission::class;
    }

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'display_name' => 'like',
        'description' => 'like',
    ];
    
    //embedded search criterias
    public function boot() {
        $this->pushCriteria( app('Prettus\Repository\Criteria\RequestCriteria') );
    }

}
