<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Etat;
use App\Traits\Response;
use Illuminate\Http\Request;

class EtatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {  return (new Response)->success(Etat::all()); }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        $user = new Etat((array)$request);
        if (!$user->save())
        { return (new Response)->error(); }

        return (new Response)->created($user);
    }

    /**
     * Display the specified resource and it's relations.
     *
     * @param int $id
     * @return array
     */
    public function show(int $id): array
    {
        $user = Etat::query()->find($id);
        if(!$user)
        { return (new Response)->IdNotFound(); }
        return (new Response)->success($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function update(Request $request, int $id): array
    {
        $user = Etat::query()->find($id);
        if(!$user)
        { return (new Response)->IdNotFound(); }

        if (!$user->update((array)$request))
        { return (new Response)->error(400); }
        return (new Response)->success($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return array
     */
    public function destroy(int $id): array
    {
        $user = Etat::query()->find($id);
        if(!$user)
        { return (new Response)->IdNotFound(); }

        if (!$user->delete())
        { return (new Response)->error(400,$user); }
        return (new Response)->error($user);
    }
}
