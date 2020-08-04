<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function orderShippedEvent($id)
    {
        event(new \App\Events\OrderShipped($id));
        // dump($orderShipped);
        dump($id);
    }
}
