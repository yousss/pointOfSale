<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\RoleRequest;
use Modules\User\Repositories\IWrapperRepository;
use Modules\User\Transformers\RoleResource;

class RoleController extends Controller
{

    private $repo; 

    public function __construct( IWrapperRepository $repo ) 
    {
        $this->repo = $repo->getRoleRepository();
    }

    /**
     * Display a listing of the resource.
     * @return RoleResourceCollection
     */
    public function index()
    {
        return RoleResource::collection( $this->repo->paginate(10) );
    }

    /**
     * Store a newly created resource in storage.
     * @param RoleRequest $request
     * @return RoleResource
     */
    public function store(RoleRequest $request)
    {
        return new RoleResource($this->repo->create($request->all()));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return RoleResource
     */
    public function show($id)
    {
        return new RoleResource($this->repo->find( $id ));
    }

    /**
     * Update the specified resource in storage.
     * @param RoleRequest $request
     * @param int $id
     * @return RoleResource
     */
    public function update(RoleRequest $request, $id)
    {
        return new RoleResource($this->repo->update( $request->all(), $id ) );
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return code
     */
    public function destroy($id)
    {
        if($this->repo->delete($id))
            return response()->json( null, 204 );

        return response()->json( ['errors' => 'Unable to delete this resource' ], 422);
    }
}
