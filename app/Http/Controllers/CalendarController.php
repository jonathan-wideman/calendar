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

    public function getEventsDemo()
    {
        return view('eventsDemo');
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

    /*
    // simple get route to update database values
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
    */

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
            if(isset($request->data["start"])) {
                $start = new Datetime("@".round($request->data["start"]/1000));
            }
            // $start = new DateTime();
            if(isset($request->data["end"])) {
                $end = new Datetime("@".round($request->data["end"]/1000));
            }
            // $end = new DateTime();

            // echo $id;
            // echo '<br>';
            // echo $start->format('Y-m-d H:i:s');
            // echo '<br>';
            // echo $end->format('Y-m-d H:i:s');
            // echo '<br>';

            $updateData = [];
            if (isset($start)) {
                $updateData['start'] = $start;
            }
            if (isset($end)) {
                $updateData['end'] = $end;
            }

            DB::table('events')
                ->where('id', $id)
                ->update($updateData)
            ;

            return json_encode([$id, $updateData]);
        }

        return "No id!";
    }

    public function postSetEventName (Request $request)
    {
        if (!$request) {
            return "No request!";
        }

        if (!$request->data) {
            return "No data!";
        }


        if ($request->data["id"]) {

            $id = $request->data["id"];
            $name = $request->data["name"];

            DB::table('events')
                ->where('id', $id)
                ->update(['name' => $name])
            ;

            return json_encode([$id, $name]);
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