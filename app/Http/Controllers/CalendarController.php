<?php

namespace App\Http\Controllers;

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
        $result = [
            (object) [
                'name' => 'foo',
                'start' => 1,
                'end' => 2,
                'icon' => ''
            ],
            (object) [
                'name' => 'bar',
                'start' => 1,
                'end' => 2,
                'icon' => ''
            ],
            (object) [
                'name' => 'bat',
                'start' => 1,
                'end' => 2,
                'icon' => ''
            ],
            (object) [
                'name' => 'bin',
                'start' => 1,
                'end' => 2,
                'icon' => ''
            ],
            (object) [
                'name' => 'bly',
                'start' => 1,
                'end' => 2,
                'icon' => ''
            ],
        ];
        return json_encode($result);
    }

    /**
     * Responds to requests to GET /users/show/1
     */
    // public function getShow($id)
    // {
    //     //
    // }

    /**
     * Responds to requests to GET /users/admin-profile
     */
    // public function getAdminProfile()
    // {
    //     //
    // }

    /**
     * Responds to requests to POST /users/profile
     */
    // public function postProfile()
    // {
    //     //
    // }
}