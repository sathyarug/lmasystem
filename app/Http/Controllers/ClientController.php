<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Auth;
use App\MonitoringType;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use App\Company;
use App\Country;
use App\Category;
use App\CategoryClient;
Use App\Upload;
use Carbon\Carbon ;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    
       public function __construct() 
    {
        $this->middleware('auth'); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $clients = Client::all();
       return view('client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id')->all();
        $categories = Category::pluck('name','id')->all();
        $companies = Company::pluck('name_full','id')->all();        
        return view('client.create',compact('users','companies','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $user = \Auth::user()->id;
        $ip = $request->ip();
        $request->request->add(['user_created' => $user]);
        $request->request->add(['ip_created' => $ip]);
        $Client = Client::create($request->all());
        if ($Client){
            return redirect()->route('client.index')
                            ->with('flash_message', 'Client added!');
        }
        else{
            return redirect()->route('client.index')
                            ->with('flash_message', 'Can not add!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client) {
    
        $data = Client::where('id', $client->id)->first();
        $users = User::pluck('name', 'id')->all();
        return view('client.edit', compact('users', 'data', 'monitoringtypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $user = \Auth::user()->id;
        $ip  = $request->ip();
       $Client = Client::where('id' , $client->id)->first();
            $Client->user_id = $request->user_id;
            $Client->name = $request->name;
            $Client->status = $request->status;
            $Client->press = $request->press?$request->press:0;
            $Client->radio = $request->radio?$request->radio:0;
            $Client->tv = $request->tv?$request->tv:0;
            $Client->user_edited = $user;
            $Client->ip_edited = $ip;    
            $result = $Client->update();  
            if($result)
                return redirect()->route('client.index')
                        ->with('flash_message', 'Client updated!');
                else
              return redirect()->route('client.index')
                        ->with('flash_message', 'Can not update!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $Client = Client::findOrFail($id);
          $Client->delete();
//
        return redirect()->route('client.index')
            ->with('flash_message',
             'Client deleted!');
    }
    
    public function getCompany(Request $request) {
        $data = Company::where('category_id', $request->category_id)->where('company_status', $request->category_id)->pluck('name_full', 'id');
        return $data;
    }
    
}
