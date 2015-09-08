<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;

use App\Events\SettingsChangedEvent;

use App\Setting;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit()
    {
        return view('admin.settings.profile.edit', [
                        'name' => setting_value('name'),
                        'cover' => setting_value('cover'),
                        'avatar' => setting_value('avatar'),
                        'bio' => setting_value('bio'),
                        'email' => setting_value('email'),
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ProfileRequest $request)
    {
        Setting::where('name', 'name')->update(['value' => $request->input('name')]);
        Setting::where('name', 'bio')->update(['value' => $request->input('bio')]);
        Setting::where('name', 'email')->update(['value' => $request->input('email')]);
        $this->updateForFile($request, 'cover');
        $this->updateForFile($request, 'avatar');
       
        event(new SettingsChangedEvent);

        flash()->success(trans('flash_messages.settings_profile_success'));

        return redirect('admin/settings/profile');
    }

    protected function updateForFile($request, $name)
    {
        if ($request->hasfile($name)) {
            $file = $request->file($name);
            
            if (!$file->isValid()) {
                throw new Exception(trans('strings.image_not_invalid'));
            }

            $filename = $name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/profile'), $filename);
            Setting::where('name', $name)->update(['value' => 'images/profile/' . $filename]);
        }
    }
}
