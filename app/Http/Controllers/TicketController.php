<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

use App\Http\Repository\TicketRepository;
use Exception;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    protected $ticketRepo;

    public function __construct(TicketRepository $ticketRepo)
    {
        $this->ticketRepo = $ticketRepo;
    }

    public function GetTickets(Request $request) {
        try {
           app('cloudwatch')->log('ticekt list shared to user');
        } catch (Exception $e) {
        }
        $list =  $this->ticketRepo->list();
        return view('tickets.list', ['list' => $list, 'action' => $request->has('action')]);
    }

    public function CreateTicket() {
        try {
           app('cloudwatch')->log('new ticket template opened');
        } catch (Exception $e) {
        }
        return  view('tickets.create');
    }

    public function GenerateTicket(Request $request) {
        $validated = $this->validate($request,[
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'booking_open_date' => 'required|date',
            'booking_close_date' => 'required|date|after:booking_open_date',
        ]);
        try {
           app('cloudwatch')->log('new ticket added');
        } catch (Exception $e) {
        }
        $this->ticketRepo->create($request);
        return redirect('/ticket?action=saved');
    }
}
