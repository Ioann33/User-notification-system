<?php

namespace App\Http\Controllers;

use App\Models\NotificationModel;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
//use MBarlow\Megaphone\Types\General;


class NotificationController extends Controller
{
    public function index(){
        $resArr = [];
        $noteTypes = Config::get('megaphone.types');

        foreach ($noteTypes as $type){
            preg_match("/[\'\\'a-zA-Z]{2,}$/", $type, $optionName);
            $key = "\\".$type;
            $resArr[$key] = $optionName[0];
        }

        return view('dashboard2',['notifTypes'=>$resArr]);
    }
    public function sendMessage(Request $request){
        $this->validate($request, [
            'type' =>'required|string',
            'title' => 'required',
            'body' => 'required',
            'link' => 'sometimes',
            'text_link' => 'sometimes',
            'user_id' => 'required|integer',

        ]);
        if (!class_exists($request->type)){
            return abort('404');
        }

        $note = new $request->type($request->title, $request->body,$request->link,$request->text_link);
        $user = User::find($request->user_id);
        $user->notify($note);

        return redirect(route('notify.user'));
    }

    public function delete(Request $request){
        $note = NotificationModel::where('id', '=', $request->id)
            ->first();
        $note->delete();
        return redirect(route('notify.user'));
    }
}
