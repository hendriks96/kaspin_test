<?php
namespace App\Http\CustomClass;

use Carbon\Carbon;

class Record{

    public static function saveLog($userId, $email, $name, $activity){
        $database = app('firebase.firestore')->database(); 
        $init = $database->collection($email)->newDocument();
    
        $init->set([
            'userId'    =>  $userId,
            'name'      =>  $name,
            'activity'  =>  $activity,
            'log_time'  =>  Carbon::now(),
        ]);

        return $init->id();
    }
    
    // public static function saveLog($logId, $name, $activity){
    //     $database = app('firebase.firestore')->database(); 
    //     $init = $database->collection('User')->document($logId);
    
    //     $init->set([
    //         'name'          =>  $name,
    //         'activity'      =>  $activity,
    //         'log_time'      =>  Carbon::now(),
    //     ]);

    //     return true;
    // }
}

?>