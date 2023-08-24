<?php

namespace Modules\World\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Modules\World\Http\Requests\CountryStoreRequest;
use Modules\World\Http\Requests\CountryUpdateRequest;
use Modules\World\Models\City;
use Modules\World\Models\Country;

class CountryController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('list_countries'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::countries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('create_countries'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Country::distinct('region')->pluck('region');
        $subregions = Country::distinct('subregion')->pluck('subregion');

        return view('world::countries.create', compact('regions', 'subregions'));
    }

    public function store(CountryStoreRequest $request)
    {
        abort_if(Gate::denies('create_countries'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country = Country::create([
            'name'         => $request->name,
            'iso2'         => $request->iso2,
            'iso3'         => $request->iso3,
            'phone_code'   => $request->phone_code,
            'region'       => $request->region,
            'subregion'    => $request->subregion,
            'translations' => $request->translations,
            'latitude'     => $request->latitude,
            'longitude'    => $request->longitude,
            'emoji'        => $request->emoji,
        ]);

        session()->flash('success', __('world::general.country_created_successfully'));

        return to_route('world.countries.show', $country);
    }

    public function show(Country $country)
    {
        abort_if(Gate::denies('view_countries'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::countries.show', compact('country'));
    }

    public function edit(Country $country)
    {
        abort_if(Gate::denies('edit_countries'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Country::distinct('region')->pluck('region');
        $subregions = Country::distinct('subregion')->pluck('subregion');

        return view('world::countries.edit', compact('country', 'regions', 'subregions'));
    }

    public function update(CountryUpdateRequest $request, Country $country)
    {
        abort_if(Gate::denies('edit_countries'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country = Country::create([
            'name'         => $request->name,
            'iso2'         => $request->iso2,
            'iso3'         => $request->iso3,
            'phone_code'   => $request->phone_code,
            'region'       => $request->region,
            'subregion'    => $request->subregion,
            'translations' => $request->translations,
            'latitude'     => $request->latitude,
            'longitude'    => $request->longitude,
            'emoji'        => $request->emoji,
        ]);

        session()->flash('success', __('world::general.country_updated_successfully'));

        return to_route('world.countries.show', $country);
    }

}
