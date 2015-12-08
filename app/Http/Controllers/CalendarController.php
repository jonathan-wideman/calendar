<?php

namespace App\Http\Controllers;

use DB;

class CalendarController extends Controller
{
    /**
     * Responds to requests to GET /users
     */
    public function getIndex()
    {
        return view('calendar');
    }

    public function getEvents()
    {

        $events = DB::select('select * from events');
        // dd($events);

        // The events object should look like this:
        
        // $events = [
        //     (object) [
        //         'name' => 'foo',
        //         'start' => 1,
        //         'end' => 2,
        //         'icon' => ''
        //     ],
        //     (object) [
        //         'name' => 'bar',
        //         'start' => 1,
        //         'end' => 2,
        //         'icon' => ''
        //     ],
        //     (object) [
        //         'name' => 'bat',
        //         'start' => 1,
        //         'end' => 2,
        //         'icon' => ''
        //     ],
        //     (object) [
        //         'name' => 'bin',
        //         'start' => 1,
        //         'end' => 2,
        //         'icon' => ''
        //     ],
        //     (object) [
        //         'name' => 'bly',
        //         'start' => 1,
        //         'end' => 2,
        //         'icon' => ''
        //     ],
        // ];

        return json_encode($events);
    }

    /**
     * Responds to requests to GET /events/show/1
     */
    // public function getShow($id)
    // {
    //     //
    // }

    /**
     * Responds to requests to GET /events/admin-profile
     */
    // public function getAdminProfile()
    // {
    //     //
    // }

    /**
     * Responds to requests to POST /events/profile
     */
    // public function postProfile()
    // {
    //     //
    // }
}