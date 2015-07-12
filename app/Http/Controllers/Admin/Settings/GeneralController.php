<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\GeneralRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Events\SettingsChangedEvent;

use App\Setting;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function edit()
    {
        return view('admin.settings.general.edit', [
                        'title' => setting_value('title'),
                        'subtitle' => setting_value('subtitle'),
                        'keywords' => setting_value('keywords'),
                        'description' => setting_value('description'),
                        'paginate_size' => setting_value('paginate_size'),
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update(GeneralRequest $request)
    {
        Setting::where('name', 'title')->update(['value' => $request->input('title')]);
        Setting::where('name', 'subtitle')->update(['value' => $request->input('subtitle')]);
        Setting::where('name', 'keywords')->update(['value' => $request->input('keywords')]);
        Setting::where('name', 'description')->update(['value' => $request->input('description')]);
        Setting::where('name', 'paginate_size')->update(['value' => $request->input('paginate_size')]);
        
        event(new SettingsChangedEvent);

        flash()->success(trans('flash_messages.settings_general_success'));

        return redirect('admin/settings/general');
    }
}
