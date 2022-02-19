<?php
namespace App\Http\Repository;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketRepository {

    protected $ticket;

    public function __construct(Ticket $ticket) {
        $this->ticket = $ticket;
    }

    public function list() {
        return $this->ticket->all();
    }

    public function create(Request $request) {


        $ticket = new $this->ticket;
        $ticket->name = $request->get('name');
        $ticket->description = $request->get('description');
        $ticket->booking_start_date = date('Y-m-d', strtotime($request->get('booking_open_date')));
        $ticket->booking_closing_date = date('Y-m-d', strtotime($request->get('booking_close_date')));
        $ticket->show_date_time = date('Y-m-d', strtotime($request->get('booking_close_date')));
        return $ticket->save();

    }
}

