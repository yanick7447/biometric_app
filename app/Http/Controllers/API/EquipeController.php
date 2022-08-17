<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {  return (new Response)->success(Equipe::all()); }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        $equipe = new Equipe((array)$request);
        if (!$equipe->save())
        { return (new Response)->error(); }

        return (new Response)->created($equipe);
    }

    /**
     * Display the specified resource and it's relations.
     *
     * @param int $id
     * @return array
     */
    public function show(int $id): array
    {
        $equipe = Equipe::query()->find($id);
        if(!$equipe)
        { return (new Response)->IdNotFound(); }
        return (new Response)->success($equipe);
    }

    /**
     * Update the specified resource in storage.
     * EC = Equipe Collection name for Spatie media
     *
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function update(Request $request, int $id): array
    {
        $equipe = Equipe::query()->find($id);
        if(!$equipe)
        { return (new Response)->IdNotFound(); }

        if (!$equipe->update((array)$request))
        { return (new Response)->error(400); }
        return (new Response)->success($equipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return array
     */
    public function destroy(int $id): array
    {
        $equipe = Equipe::query()->find($id);
        if(!$equipe)
        { return (new Response)->IdNotFound(); }

        if (!$equipe->delete())
        { return (new Response)->error(400,$equipe); }
        return (new Response)->error($equipe);
    }
}
