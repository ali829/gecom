<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function create(){
        return view('settings.setting',[
            'title'=>'parametres',
            'setting'=>Setting::first(),
            'devises'=>['DH','Eu','$'],
            'themes'=>['canvas','classic','winter']
        ]);
    }
    public function update(Request $request,Setting $setting){
        $data=$request->all();
        $setting->update($data);
        return redirect()->route('setting.showSetting');
    }
}
