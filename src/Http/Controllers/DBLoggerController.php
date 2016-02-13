<?php

namespace Gazatem\DBLoggerGui\Http\Controllers;

use Illuminate\Routing\Controller as Controller;
use Gazatem\DBLogger\Model\Log as Logger;
use Illuminate\Http\Request;

class DBLoggerController extends Controller
{
    public function index(Request $request)
    {

        $start_date = $request->get('start_date', null);
        $end_date = $request->get('end_date', null);

        $level = $request->get('level', null);
        $message = $request->get('message', null);


        $logs = Logger::
        where(function ($query) use ($start_date){
                if ($start_date != null){
                    $query->whereRaw("DATE(created_at) >= DATE('$start_date')");
                }
            })

            ->where(function ($query) use ($end_date){
                if ($end_date != null){
                    $query->whereRaw("DATE(created_at) <= DATE('$end_date')");
                }
            })

            ->where(function ($query) use ($level){
                if ($level != null){
                    $query->where("level_name" ,$level);
                }
            })

            ->where(function ($query) use ($message){
                if ($message != null){
                    $query->where("message" ,$message);
                }
            })

            ->orderBy('created_at', 'desc')->paginate(100);


        $messages = config('dblogger.messages');
        $levels = config('dblogger.levels');
        $channels = config('dblogger.channels');
        return view('dblogger-gui::index', compact('logs', 'messages', 'levels', 'level', 'message', 'start_date', 'end_date', 'channels'));
    }
}