<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Carbon\Carbon;
use Auth;
class NotificationController extends Controller
{
    public function redirectTo_ent($n_id,$e_id){
        $notification = Notification::findOrFail($n_id);
        if ($notification->read_at == NULL) {
            $notification->read_at= Carbon::now();
            $notification->save();
            return redirect()->route('entrepot.showProducts',$e_id);
        } else {
            return redirect()->route('entrepot.showProducts',$e_id);
        }

    }
    public function redirectTo_ord($n_id,$id){
        $notification = Notification::findOrFail($n_id);
        if ($notification->read_at == NULL) {
            $notification->read_at= Carbon::now();
            $notification->save();
            return redirect()->route('order.show',$id);
        } else {
            return redirect()->route('order.show',$id);
        }

    }
    public function readall(){
        foreach(Auth::user()->unreadNotifications as $not){
            $not->read_at=Carbon::now();
            $not->save();
        }
    }
    public function viewall(){
        return view('notifications.notification',[
            'allnot'=>Auth::user()->notifications()->paginate(5),
            'title'=>'notifications'
        ]);
    }
}
