<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\CarCollection;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CarController extends Controller
{
    /**
     * Get a paginated collection of cars.
     *
     * @return CarCollection
     */
    public function index(): CarCollection
    {
        $cars = Car::with('parts')->get(); // Adjust the pagination limit as needed

        return new CarCollection($cars);
    }

    /**
     * Store a newly created car in storage.
     *
     * @param StoreCarRequest $request
     * @return CarResource
     */
    public function store(StoreCarRequest $request): CarResource
    {
        $car = Car::create($request->validated());

        return new CarResource($car);
    }

    /**
     * Display the specified car.
     *
     * @param Car $car
     * @return CarResource
     */
    public function show(Car $car): CarResource
    {
        $car->load('parts'); // Eager load the 'parts' relationship

        return new CarResource($car);
    }

    /**
     * Update the specified car in storage.
     *
     * @param UpdateCarRequest $request
     * @param Car $car
     * @return CarResource
     */
    public function update(UpdateCarRequest $request, Car $car): CarResource
    {
        $car->update($request->validated());

        return new CarResource($car);
    }

    /**
     * Remove the specified car from storage.
     *
     * @param Car $car
     * @return Response
     */
    public function destroy(Car $car): Response
    {
        $car->delete();

        return response()->noContent();
    }
}
