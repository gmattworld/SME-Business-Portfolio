<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class MessagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msgs = Contact::orderBy('created_at','desc')->paginate(50);
        $urmsg = Contact::where('read','0')->get();
        return view('messages.index')->with(['msgs' => $msgs, 'urmsg' => $urmsg ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'full_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact;
        $contact->fullname = $request->input('full_name');
        $contact->email = $request->input('email');
        $contact->phone_no = $request->input('phone_no');
        $contact->message = $request->input('message');
        $contact->save();

        return redirect('/contact')->with('success', 'Message Sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $msg = Contact::find($id);
        $msg->read = true;
        $retval = $msg;
        $msg->save();
        return view('messages.show')->with('msg', $retval);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msg = Contact::Find($id);
        $msg->delete();
        return redirect('/contact')->with('success', 'Message Deleted!');
    }
}
