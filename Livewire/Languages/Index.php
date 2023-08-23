<?php

namespace Modules\World\Livewire\Languages;

use App\Http\Traits\Livewire\IndexFunctions;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\World\Models\Language;

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
        $languages = Language::query()
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('name_native', 'like', '%' . $this->search . '%')
                    ->orWhere('code', 'like', '%' . $this->search . '%')
                    ->orWhere('writing_system', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->recordsPerPage);

        return view('world::livewire.languages.index', compact('languages'));
    }

    public function delete($id)
    {
        abort_if(Gate::denies('delete_languages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            Language::destroy($id);

            $this->dispatch('flash', icon: 'success', message: __('world::general.language_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('world::general.unknown_error_occurred'));
        }
    }

    public function deleteMany()
    {
        abort_if(Gate::denies('delete_languages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            Language::whereIn('id', $this->selectedRecords)->delete();

            $this->dispatch('flash', icon: 'success', message: __('world::general.languages_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('world::general.unknown_error_occurred'));
        }

        $this->resetSelectedRecords();
    }
}
