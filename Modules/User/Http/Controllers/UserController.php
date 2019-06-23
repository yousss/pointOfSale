<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Repositories\IWrapperRepository;
use Modules\User\Transformers\UserResource;
use Modules\User\Http\Requests\UserProfileRequest;

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
     * @return UserResource
     */
    public function store(UserProfileRequest $request)
    {
        return new UserResource($this->repo->create($request->all()));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return UserResource
     */
    public function show($id)
    {
        return new UserResource($this->repo->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return UserResource
     */
    public function update(UserProfileRequest $request, $id)
    {
        return new UserResource($this->repo->update($request->all(), $id));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->repo->delete($id))
            return response()->json( null, 204 );

        return response()->json( ['errors' => 'Unable to delete this resource' ], 422);
    }
}
