<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\Pointage;
use Illuminate\Http\Request;

class PointageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {  return (new Response)->success(Pointage::all()); }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        $pointage = new Pointage((array)$request);
        if (!$pointage->save())
        { return (new Response)->error(); }

        return (new Response)->created($pointage);
    }

    /**
     * Display the specified resource and it's relations.
     *
     * @param int $id
     * @return array
     */
    public function show(int $id): array
    {
        $pointage = Pointage::query()->find($id);
        if(!$pointage)
        { return (new Response)->IdNotFound(); }
        return (new Response)->success($pointage);
    }

    /**
     * Update the specified resource in storage.
     * EC = Pointage Collection name for Spatie media
     *
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function update(Request $request, int $id): array
    {
        $pointage = Pointage::query()->find($id);
        if(!$pointage)
        { return (new Response)->IdNotFound(); }

        if (!$pointage->update((array)$request))
        { return (new Response)->error(400); }
        return (new Response)->success($pointage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return array
     */
    public function destroy(int $id): array
    {
        $pointage = Pointage::query()->find($id);
        if(!$pointage)
        { return (new Response)->IdNotFound(); }

        if (!$pointage->delete())
        { return (new Response)->error(400,$pointage); }
        return (new Response)->error($pointage);
    }
}
