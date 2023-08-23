<?php

namespace Modules\World\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Modules\World\Http\Requests\StateStoreRequest;
use Modules\World\Http\Requests\StateUpdateRequest;
use Modules\World\Models\Country;
use Modules\World\Models\State;

class StateController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('list_states'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::states.index');
    }

    public function create()
    {
        abort_if(Gate::denies('create_states'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all();

        return view('world::states.create', compact('countries'));
    }

    public function store(StateStoreRequest $request)
    {
        abort_if(Gate::denies('create_states'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $state = State::create([
            'country_id' => $request->country_id,
            'name'       => $request->name,
            'code'       => $request->code,
        ]);

        session()->flash('success', __('world::general.state_created_successfully'));

        return to_route('world.states.show', $state);
    }

    public function show(State $state)
    {
        abort_if(Gate::denies('view_states'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::states.show', compact('state'));
    }

    public function edit(State $state)
    {
        abort_if(Gate::denies('edit_states'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::states.edit', compact('state'));
    }

    public function update(StateUpdateRequest $request, State $state)
    {
        abort_if(Gate::denies('edit_states'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $state->update([
            'country_id' => $request->country_id,
            'name'       => $request->name,
            'code'       => $request->code,
        ]);

        session()->flash('success', __('world::general.state_updated_successfully'));

        return to_route('world.states.show', $state);
    }

}
