<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Traits\Response;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {  return (new Response)->success(Employe::all()); }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        $employe = new Employe((array)$request);
        if (!$employe->save())
        { return (new Response)->error(); }

        return (new Response)->created($employe);
    }

    /**
     * Display the specified resource and it's relations.
     *
     * @param int $id
     * @return array
     */
    public function show(int $id): array
    {
        $employe = Employe::query()->find($id);
        if(!$employe)
        { return (new Response)->IdNotFound(); }
        return (new Response)->success($employe);
    }

    /**
     * Update the specified resource in storage.
     * EC = Employe Collection name for Spatie media
     *
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function update(Request $request, int $id): array
    {
        $employe = Employe::query()->find($id);
        if(!$employe)
        { return (new Response)->IdNotFound(); }

        if (!$employe->update((array)$request))
        { return (new Response)->error(400); }
        return (new Response)->success($employe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return array
     */
    public function destroy(int $id): array
    {
        $employe = Employe::query()->find($id);
        if(!$employe)
        { return (new Response)->IdNotFound(); }

        if (!$employe->delete())
        { return (new Response)->error(400,$employe); }
        return (new Response)->error($employe);
    }
}
