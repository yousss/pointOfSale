<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\PermissionRequest;
use Modules\User\Repositories\IWrapperRepository;
use Modules\User\Transformers\PermissionResource;


class PermissionController extends Controller
{

    private $repo; 

    public function __construct( IWrapperRepository $repo ) 
    {
        $this->repo = $repo->getPermissionRepository();
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return PermissionResource::collection($this->repo->paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(PermissionResource $request)
    {
        return new PermissionResource($this->repo->create($request->all()));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return new PermissionResource($this->repo->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return new PermissionResource($this->repo->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(PermissionRequest $request, $id)
    {
        return new PermissionResource($this->repo->update($request->all(), $id));
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
