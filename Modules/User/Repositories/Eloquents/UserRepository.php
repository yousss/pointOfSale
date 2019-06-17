<?php 

namespace Modules\User\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Modules\User\Repositories\Contracts\IUserRepository;
use Modules\User\Entities\User;

class UserRepository extends BaseRepository implements IUserRepository {
    
    /**
     * Load model to use in abstract class
     * @return class name
     */
    public function model () {
        return User::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return "Modules\\User\\Http\\Requests\\UserRequest";
    }

}
