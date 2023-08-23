<?php

namespace Modules\World\Livewire\Countries;

use App\Http\Traits\Livewire\IndexFunctions;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\World\Models\Country;

class Index extends Component
{
    use WithPagination, IndexFunctions;

    public function mount()
    {
        $this->init();
        $this->sortBy = 'name';
    }

    public function render()
    {
        $countries = Country::query()
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('iso3', 'like', '%' . $this->search . '%')
                    ->orWhere('region', 'like', '%' . $this->search . '%')
                    ->orWhere('subregion', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->recordsPerPage);

        return view('world::livewire.countries.index', compact('countries'));
    }

    public function delete($id)
    {
        abort_if(Gate::denies('delete_countries'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            Country::destroy($id);

            $this->dispatch('flash', icon: 'success', message: __('world::general.country_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('world::general.unknown_error_occurred'));
        }
    }

    public function deleteMany()
    {
        abort_if(Gate::denies('delete_countries'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            Country::whereIn('id', $this->selectedRecords)->delete();

            $this->dispatch('flash', icon: 'success', message: __('world::general.countries_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('world::general.unknown_error_occurred'));
        }

        $this->resetSelectedRecords();
    }
}
