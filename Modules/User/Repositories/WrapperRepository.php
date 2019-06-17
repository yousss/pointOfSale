<?php 

namespace Modules\User\Repositories; 


class WrapperRepository implements IWrapperRepository {
    
    private $user;

    public function getUserRepository() {
        return $this->user == null ? $this->user = $this->mapping('user') : $this->user;
    }

    private function mapping(string $provider)  {
        $provider = ucfirst($provider);
        $model = app("Modules\\User\\Repositories\\Eloquents\\{$provider}Repository");
        return app("Modules\\User\\Repositories\\Contracts\\I{$provider}Repository", [$model]);
    }

}