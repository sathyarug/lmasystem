<?php

namespace App\Http\Controllers;

use App\ClientEmail;
use App\Client;
use Illuminate\Http\Request;

class ClientEmailController extends Controller
{
     public function __construct() 
    {
        $this->middleware('auth'); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $clients = Client::all();  
       return view('clientemail.client',compact('clients'));
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
        $user = \Auth::user()->id;
        $ip = $request->ip();
        $request->request->add(['user_created' => $user]);
        $request->request->add(['ip_created' => $ip]);
        $Highlight = ClientEmail::create($request->all());
        if ($Highlight)
        return redirect()->route('clientemail.list',$request->client_id)->with('flash_message', 'Email created!');
                else
                    return redirect()->route('clientemail.list',$request->client_id)->with('flash_message', 'Can not create!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClientEmail  $clientEmail
     * @return \Illuminate\Http\Response
     */
    public function show(ClientEmail $clientEmail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientEmail  $clientEmail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ClientEmail::where('id', $id)->first();
        return view('clientemail.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientEmail  $clientEmail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $user = \Auth::user()->id;
       $ip  = $request->ip();
       $ClientEmail = ClientEmail::where('id' , $id)->first();
            $ClientEmail->email = $request->email;
            $ClientEmail->status = $request->status;
            $ClientEmail->press = isset($request->press) ? $request->press : 0;
            $ClientEmail->radio = isset($request->radio) ? $request->radio : 0;
            $ClientEmail->tv = isset($request->tv) ? $request->tv : 0;
            $ClientEmail->user_edited = $user;
            $ClientEmail->ip_edited = $ip;    
            $result = $ClientEmail->update();  
            if($result)
                return redirect()->route('clientemail.list',$ClientEmail->client_id)->with('flash_message', 'Email updated!');
                else
                    return redirect()->route('clientemail.list',$ClientEmail->client_id)->with('flash_message', 'Can not update!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientEmail  $clientEmail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $clientemails = ClientEmail::findOrFail($id);
          $clientemails->delete();
        return redirect()->route('clientemail.list',$clientemails->client_id)->with('flash_message', 'Email deleted!');
    }
    
    public function maillist($id)
    {
       $clientemails = ClientEmail::where('client_id',$id)->get();
       return view('clientemail.index',compact('clientemails','id'));
    }
    
    public function add($id)
    {
        $id  = $id;
        return view('clientemail.create',compact('id'));
    }
}
