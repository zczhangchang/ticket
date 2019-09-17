<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comments;
use App\Mailers\AppMailer;
use App\Priority;
use App\Status;
use App\Ticket;
use App\User;
use DB;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    public function index()
    {
        $menucount = $this->menucount();

        $tickets    = Ticket::orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all();
        $prioritys  = Priority::all();
        $statuses   = Status::all();

        return view('admin.tickets.index', compact('menucount', 'tickets', 'categories', 'statuses', 'prioritys'));
    }

    public function opentickets()
    {
        $menucount = $this->menucount();

        $tickets    = Ticket::where('status_id', 1)->orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all();
        $prioritys  = Priority::all();
        $statuses   = Status::all();

        return view('admin.tickets.index', compact('menucount', 'tickets', 'categories', 'statuses', 'prioritys'));
    }

    public function inprogresstickets()
    {
        $menucount = $this->menucount();

        $tickets    = Ticket::where('status_id', 2)->orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all();
        $prioritys  = Priority::all();
        $statuses   = Status::all();

        return view('admin.tickets.index', compact('menucount', 'tickets', 'categories', 'statuses', 'prioritys'));
    }

    public function closedtickets()
    {
        $menucount = $this->menucount();

        $tickets    = Ticket::where('status_id', 3)->orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all();
        $prioritys  = Priority::all();
        $statuses   = Status::all();

        return view('admin.tickets.index', compact('menucount', 'tickets', 'categories', 'statuses', 'prioritys'));
    }

    public function reopenedtickets()
    {
        $menucount = $this->menucount();

        $tickets    = Ticket::where('status_id', 4)->orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all();
        $prioritys  = Priority::all();
        $statuses   = Status::all();

        return view('admin.tickets.index', compact('menucount', 'tickets', 'categories', 'statuses', 'prioritys'));
    }

    public function edit($ticket_id)
    {
        $tickets    = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $categories = Category::pluck('name', 'id');
        $prioritys  = Priority::pluck('name', 'id');
        $statuses   = Status::pluck('name', 'id');

        return view('admin.tickets.edit', compact('tickets', 'categories', 'statuses', 'prioritys'));
    }

    public function show($ticket_id)
    {
        $ticket     = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $categories = Category::pluck('name', 'id');
        $comments   = $ticket->comments;
        $statuses   = Status::pluck('name', 'id');
        $prioritys  = Priority::pluck('name', 'id');

        return view('admin.tickets.show', compact('ticket', 'categories', 'statuses', 'prioritys', 'comments'));
    }

    public function update(Request $request, $ticket_id, AppMailer $mailer)
    {
        $this->validate($request, [
            'category' => 'required',
            'priority' => 'required',
            'status'   => 'required',
        ]);

        $ticket              = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->category_id = $request->input('category');
        $ticket->priority_id = $request->input('priority');
        $ticket->status_id   = $request->input('status');
        $ticket->save();

        $ticketOwner = $ticket->user;

        // $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

        return redirect()->route('managetickets.index')->with('success',
            "A ticket with ID: #$ticket->ticket_id has been updated.");
    }

    public function destroy($ticket_id)
    {
        DB::table('tickets')->where('ticket_id', $ticket_id)->delete();

        return redirect()->route('managetickets.index')->with('info', 'Ticket deleted successfully');
    }

    private function menucount()
    {
        return [
            'all'        => \App\Ticket::all()->count(),
            'open'       => \App\Ticket::where('status_id', 1)->count(),
            'inprogress' => \App\Ticket::where('status_id', 2)->count(),
            'closed'     => \App\Ticket::where('status_id', 3)->count(),
            'reopened'   => \App\Ticket::where('status_id', 4)->count(),
        ];
    }
}
