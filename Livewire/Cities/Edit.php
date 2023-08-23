<?php

namespace Modules\World\Livewire\Cities;

use App\Http\Traits\Livewire\IndexFunctions;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\World\Models\Country;
use Modules\World\Models\State;

class Edit extends Component
{
    use WithPagination, IndexFunctions;

    public $city;
    public $countries;
    public $states;

    public $countryIdSelected;
    public $stateIdSelected;

    public function mount($city)
    {
        $this->city = $city;
        $this->countries = Country::all();
        $this->states = State::where('country_id', $this->city->state->country->id)->get();
    }

    public function render()
    {
        if ($this->countryIdSelected) {
            $this->states = State::where('country_id', $this->countryIdSelected)->get();
        }

        return view('world::livewire.cities.edit');
    }
}
