<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Publication;
use App\PublicationSection;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class PublicationSectionController extends Controller
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
        //
    }

    public function list($id)
    {
        $publication = Publication::findOrFail($id);
        $sections = PublicationSection::where('publication_id',$id)->get()->all();
        return view('section.index',compact('publication','sections'));
       // return($subcategories[1]->categor->name);

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
     public function add($id)
    {
        //
        $publication = Publication::findOrFail($id);
        return view('section.create',compact('publication'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name'=>'required|min:3|max:40',
        ]);

        $name = $request['name'];
        $publication_id = $request['publication_id'];
        $user = \Auth::user()->id;
        $ip  = $request->ip();
        $section = new PublicationSection();
        $section->publication_id = $publication_id;
        $section->name = $name;
        $section->section_status = 1;
        $section->user_created = $user;
        $section->user_edited = $user;
        $section->ip_created = $ip;
        $section->ip_edited = $ip;
        $section->save();
        return redirect()->route('sections.list', $publication_id)
            ->with('flash_message',
             ' Section '. $section->name.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
         $section = PublicationSection::findOrFail($id);
         $publication = $section->publication_id;

    
  

        $section->delete();

        return redirect()->route('sections.list',  $publication)
            ->with('flash_message',
             'Section deleted!');
    }
}
