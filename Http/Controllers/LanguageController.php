<?php

namespace Modules\World\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Modules\World\Http\Requests\LanguageStoreRequest;
use Modules\World\Http\Requests\LanguageUpdateRequest;
use Modules\World\Models\Language;

class LanguageController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('list_languages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::languages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('create_languages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::languages.create');
    }

    public function store(LanguageStoreRequest $request)
    {
        abort_if(Gate::denies('create_languages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $language = Language::create([
            'name'           => $request->name,
            'name_native'    => $request->name_native,
            'code'           => $request->code,
            'writing_system' => $request->writing_system,
        ]);

        session()->flash('success', __('world::general.language_created_successfully'));

        return to_route('world.languages.show', $language);
    }

    public function show(Language $language)
    {
        abort_if(Gate::denies('view_languages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::languages.show', compact('language'));
    }

    public function edit(Language $language)
    {
        abort_if(Gate::denies('edit_languages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('world::languages.edit', compact('language'));
    }

    public function update(LanguageUpdateRequest $request, Language $language)
    {
        abort_if(Gate::denies('edit_languages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $language->update([
            'name'           => $request->name,
            'name_native'    => $request->name_native,
            'code'           => $request->code,
            'writing_system' => $request->writing_system,
        ]);

        session()->flash('success', __('world::general.language_updated_successfully'));

        return to_route('world.languages.show', $language);
    }

}
