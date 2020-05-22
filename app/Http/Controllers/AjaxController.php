<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class AjaxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequest()
    {
        return view('tasks.layout');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequestPost(Request $request)
    {
        Task::whereId($request->input('id'))->update([
            'completion_date' => date('Y-m-d')
        ]);
        return response()->json(['success' => true]);
    }
}
