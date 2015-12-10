<?php

namespace App\Http\Controllers;

use DB;
use \DateTime;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Responds to requests to GET /users
     */
    public function getIndex()
    {
        return view('calendar');
    }

    public function getExample()
    {
        return view('angEg');
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

    public function getSetEventTime ($id)
    {
        //$id = 1;
        $start = new DateTime();
        $end = new DateTime();

        echo $id;
        echo '<br>';
        echo $start->format('Y-m-d H:i:s');
        echo '<br>';
        echo $end->format('Y-m-d H:i:s');
        echo '<br>';

        DB::table('events')
            ->where('id', $id)
            ->update([
                'start' => $start,
                'end' => $end
            ])
        ;

    }

    //public function postSetEventTime ($data)
    public function postSetEventTime (Request $request)
    {
        if (!$request) {
            return "No request!";
        }

        if (!$request->data) {
            return "No data!";
        }


        if ($request->data["id"]) {

            $id = $request->data["id"];
            $start = new DateTime();
            $end = new DateTime();

            // echo $id;
            // echo '<br>';
            // echo $start->format('Y-m-d H:i:s');
            // echo '<br>';
            // echo $end->format('Y-m-d H:i:s');
            // echo '<br>';

            DB::table('events')
                ->where('id', $id)
                ->update([
                    'start' => $start,
                    'end' => $end
                ])
            ;

            return json_encode([$id, $start, $end]);
        }

        return "No id!";
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