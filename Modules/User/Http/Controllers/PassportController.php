<?php

namespace Modules\User\Http\Controllers;

use Modules\User\Http\Requests\UserRequest;
use Modules\User\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Transformers\AuthResource;
use Modules\User\Repositories\IWrapperRepository;

class PassportController extends Controller
{

    protected $wrapperRepo;

    public function __construct( IWrapperRepository $wrapperRepo ) {
        $this->wrapperRepo = $wrapperRepo->getUserRepository();
    }
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRequest $request)
    {

        $user = $this->wrapperRepo->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        auth()->login($user);    

        // $token = $user->createToken('pointOfSale')->accessToken;
 
        return new AuthResource(collect([]));;
    }
 
    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login( Request $request )
    {
        
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            return new AuthResource(collect([]));
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }
 
    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }

    public function logout()
    { 
        if ( Auth::check() ) {
            $tokens = Auth::user()->tokens();
            foreach( $tokens as $token ) {
                $token->revoke();   
            }
            return response()->json(null, 200);          
        }
    }

}
