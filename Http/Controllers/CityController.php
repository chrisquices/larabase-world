<?php

namespace Modules\World\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Modules\World\Http\Requests\CityStoreRequest;
use Modules\World\Http\Requests\CityUpdateRequest;
use Modules\World\Models\City;

class CityController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('list_cities'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::cities.index');
    }

    public function create()
    {
        abort_if(Gate::denies('create_cities'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::cities.create');
    }

    public function store(CityStoreRequest $request)
    {
        abort_if(Gate::denies('create_cities'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $city = City::create([
            'state_id'  => $request->state_id,
            'name'      => $request->name,
            'latitude'  => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        session()->flash('success', __('world::general.city_created_successfully'));

        return to_route('world.cities.show', $city);
    }

    public function show(City $city)
    {
        abort_if(Gate::denies('view_cities'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        abort_if(Gate::denies('edit_cities'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::cities.edit', compact('city'));
    }

    public function update(CityUpdateRequest $request, City $city)
    {
        abort_if(Gate::denies('edit_cities'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $city->update([
            'state_id'  => $request->state_id,
            'name'      => $request->name,
            'latitude'  => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        session()->flash('success', __('world::general.city_updated_successfully'));

        return to_route('world.cities.show', $city);
    }

}
