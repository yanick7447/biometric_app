<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\TypePointage;
use App\Traits\Response;
use Illuminate\Http\Request;

class TypePointageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {  return (new Response)->success(TypePointage::all()); }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        $typePointage = new TypePointage((array)$request);
        if (!$typePointage->save())
        { return (new Response)->error(); }

        return (new Response)->created($typePointage);
    }

    /**
     * Display the specified resource and it's relations.
     *
     * @param int $id
     * @return array
     */
    public function show(int $id): array
    {
        $typePointage = TypePointage::query()->find($id);
        if(!$typePointage)
        { return (new Response)->IdNotFound(); }
        return (new Response)->success($typePointage);
    }

    /**
     * Update the specified resource in storage.
     * EC = TypePointage Collection name for Spatie media
     *
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function update(Request $request, int $id): array
    {
        $typePointage = TypePointage::query()->find($id);
        if(!$typePointage)
        { return (new Response)->IdNotFound(); }

        if (!$typePointage->update((array)$request))
        { return (new Response)->error(400); }
        return (new Response)->success($typePointage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return array
     */
    public function destroy(int $id): array
    {
        $typePointage = TypePointage::query()->find($id);
        if(!$typePointage)
        { return (new Response)->IdNotFound(); }

        if (!$typePointage->delete())
        { return (new Response)->error(400,$typePointage); }
        return (new Response)->error($typePointage);
    }
}
