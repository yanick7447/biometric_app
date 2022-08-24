<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {  return (new Response)->success(Role::all()); }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        $role = new Role((array)$request);
        if (!$role->save())
        { return (new Response)->error(); }

        return (new Response)->created($role);
    }

    /**
     * Display the specified resource and it's relations.
     *
     * @param int $id
     * @return array
     */
    public function show(int $id): array
    {
        $role = Role::query()->find($id);
        if(!$role)
        { return (new Response)->IdNotFound(); }
        return (new Response)->success($role);
    }

    /**
     * Update the specified resource in storage.
     * EC = Role Collection name for Spatie media
     *
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function update(Request $request, int $id): array
    {
        $role = Role::query()->find($id);
        if(!$role)
        { return (new Response)->IdNotFound(); }

        if (!$role->update((array)$request))
        { return (new Response)->error(400); }
        return (new Response)->success($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return array
     */
    public function destroy(int $id): array
    {
        $role = Role::query()->find($id);
        if(!$role)
        { return (new Response)->IdNotFound(); }

        if (!$role->delete())
        { return (new Response)->error(400,$role); }
        return (new Response)->error($role);
    }
}
