<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\Poste;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {  return (new Response)->success(Poste::all()); }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        $poste = new Poste((array)$request);
        if (!$poste->save())
        { return (new Response)->error(); }

        return (new Response)->created($poste);
    }

    /**
     * Display the specified resource and it's relations.
     *
     * @param int $id
     * @return array
     */
    public function show(int $id): array
    {
        $poste = Poste::query()->find($id);
        if(!$poste)
        { return (new Response)->IdNotFound(); }
        return (new Response)->success($poste);
    }

    /**
     * Update the specified resource in storage.
     * EC = Poste Collection name for Spatie media
     *
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function update(Request $request, int $id): array
    {
        $poste = Poste::query()->find($id);
        if(!$poste)
        { return (new Response)->IdNotFound(); }

        if (!$poste->update((array)$request))
        { return (new Response)->error(400); }
        return (new Response)->success($poste);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return array
     */
    public function destroy(int $id): array
    {
        $poste = Poste::query()->find($id);
        if(!$poste)
        { return (new Response)->IdNotFound(); }

        if (!$poste->delete())
        { return (new Response)->error(400,$poste); }
        return (new Response)->error($poste);
    }
}
