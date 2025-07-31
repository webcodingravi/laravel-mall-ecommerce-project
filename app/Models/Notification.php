<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    static public function insertRecord($user_id,$url,$message) {
        $save = new Notification();
        $save->user_id = $user_id;
        $save->url = $url;
        $save->message = $message;
        $save->save();
    }

    static public function updateReadNoti(string $id) {
        $getRecord = Notification::findOrfail($id);
        if(!empty($getRecord)) {
            $getRecord->is_read = 1;
            $getRecord->save();
        }
    }
}