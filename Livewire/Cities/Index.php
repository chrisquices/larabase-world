<?php

namespace Modules\World\Livewire\Cities;

use App\Http\Traits\Livewire\IndexFunctions;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\World\Models\City;

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
        $cities = City::query()
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->recordsPerPage);

        return view('world::livewire.cities.index', compact('cities'));
    }

    public function delete($id)
    {
        abort_if(Gate::denies('delete_cities'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            City::destroy($id);

            $this->dispatch('flash', icon: 'success', message: __('world::general.city_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('world::general.unknown_error_occurred'));
        }
    }

    public function deleteMany()
    {
        abort_if(Gate::denies('delete_cities'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            City::whereIn('id', $this->selectedRecords)->delete();

            $this->dispatch('flash', icon: 'success', message: __('world::general.cities_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('world::general.unknown_error_occurred'));
        }

        $this->resetSelectedRecords();
    }
}
