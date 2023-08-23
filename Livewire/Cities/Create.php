<?php

namespace Modules\World\Livewire\Cities;

use App\Http\Traits\Livewire\IndexFunctions;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\World\Models\Country;
use Modules\World\Models\State;

class Create extends Component
{
    use WithPagination, IndexFunctions;

    public $countries;
    public $states;

    public $countryIdSelected;
    public $stateIdSelected;

    public function mount()
    {
        $this->countries = Country::all();
        $this->states = [];
    }

    public function render()
    {
        if ($this->countryIdSelected) {
            $this->states = State::where('country_id', $this->countryIdSelected)->get();
        }

        return view('world::livewire.cities.create');
    }
}
