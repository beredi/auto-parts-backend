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

    public function index(): CarCollection
    {
        $cars = Car::paginate(10); // Adjust the pagination limit as needed

        return new CarCollection($cars);
    }

    public function store(StoreCarRequest $request): CarResource
    {
        $car = Car::create($request->validated());

        return new CarResource($car);
    }

    public function show(Car $car): CarResource
    {
        return new CarResource($car);
    }

    public function update(UpdateCarRequest $request, Car $car): CarResource
    {
        $car->update($request->validated());

        return new CarResource($car);
    }

    public function destroy(Car $car): Response
    {
        $car->delete();

        return response()->noContent();
    }
}
