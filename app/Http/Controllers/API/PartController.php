<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartRequest;
use App\Http\Requests\UpdatePartRequest;
use App\Http\Resources\PartCollection;
use App\Http\Resources\PartResource;
use App\Models\Part;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PartController extends Controller
{
    /**
     * Display a listing of the parts.
     *
     * @return PartCollection
     */
    public function index(): PartCollection
    {
        $parts = Part::with('car')->get();

        return new PartCollection($parts);
    }

    /**
     * Store a newly created part in storage.
     *
     * @param  StorePartRequest  $request
     * @return PartResource
     */
    public function store(StorePartRequest $request): PartResource
    {
        $part = Part::create($request->validated());

        return new PartResource($part);
    }

    /**
     * Display the specified part.
     *
     * @param  Part  $part
     * @return PartResource
     */
    public function show(Part $part): PartResource
    {
        $part->load('car'); // Eager load the 'car' relationship

        return new PartResource($part);
    }

    /**
     * Update the specified part in storage.
     *
     * @param  UpdatePartRequest  $request
     * @param  Part  $part
     * @return PartResource
     */
    public function update(UpdatePartRequest $request, Part $part): PartResource
    {
        $part->update($request->validated());

        return new PartResource($part);
    }

    /**
     * Remove the specified part from storage.
     *
     * @param Part $part
     * @return Response
     */
    public function destroy(Part $part): Response
    {
        $part->delete();

        return response()->noContent();
    }
}
