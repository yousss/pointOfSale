<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Repositories\IWrapperRepository;
use Modules\User\Transformers\UserResource;
use Modules\User\Http\Requests\UserRequest;

class UserController extends Controller
{
    private $repo;

    public function __construct( IWrapperRepository $repo ) {
        $this->repo = $repo->getUserRepository();
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return UserResource::collection($this->repo->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return new UserResource($this->repo->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
