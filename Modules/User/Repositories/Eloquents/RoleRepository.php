<?php 

namespace Modules\User\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Modules\User\Repositories\Contracts\IRoleRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;
use Modules\User\Entities\Role;

class RoleRepository extends BaseRepository implements IRoleRepository, CacheableInterface {
    
    use CacheableRepository;

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'display_name' => 'like',
        'description' => 'like',
    ];

    public function boot() {
        $this->pushCriteria( app('Prettus\Repository\Criteria\RequestCriteria') );
    }

    /**
     * Load model to use in abstract class
     * @return class name
     */
    public function model () {
        return Role::class;
    }

}
