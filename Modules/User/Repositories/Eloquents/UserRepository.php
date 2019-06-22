<?php 

namespace Modules\User\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Modules\User\Repositories\Contracts\IUserRepository;
use Modules\User\Entities\User;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

class UserRepository extends BaseRepository implements IUserRepository, CacheableInterface {
    
    use CacheableRepository;
    /**
     * Load model to use in abstract class
     * @return class name
     */
    public function model () {
        return User::class;
    }

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'email' => 'like',
    ];

    public function boot() {
        $this->pushCriteria( app('Prettus\Repository\Criteria\RequestCriteria') );
    }

}
