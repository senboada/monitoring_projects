<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\UserHistory;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket = Ticket::with('userhistory')->get();
        return Inertia::render('Ticket/index',['tickets' => $ticket]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $histories = UserHistory::all();
        return Inertia::render('Ticket/create',['userhistories' => $histories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        Ticket::create($request->all());
        return Redirect::route('tickets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $ticket->userhistory;
        return Inertia::render('Ticket/detail',['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $histories = UserHistory::all();
        return Inertia::render('Ticket/edit',['ticket' => $ticket,'userhistories' => $histories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->all());
        return Redirect::route('tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return Redirect::route('tickets.index');
    }

    public function progress($ticket){
        $result = Ticket::findOrFail($ticket);
        $result->update(['status' =>'in process']);
        $result->save();
        return Redirect::route('tickets.index');
    }

    public function finish($ticket){
        $result = Ticket::findOrFail($ticket);
        $result->update(['status' =>'finished']);
        $result->save();
        return Redirect::route('tickets.index');
    }
}
