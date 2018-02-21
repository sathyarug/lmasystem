<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Highlight;

class HighlightController extends Controller
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
    
    public function highlights($id)
    {
       $highlights = Highlight::where('publication_id', $id)->get()->all();
       $pid = $id;
       return view('highlight.index',compact('highlights','pid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//       return view('highlight.create',compact('highlights'));
    }
    
    public function add($id)
    {      
        $id  = $id;
        return view('highlight.create',compact('id'));
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
        $Highlight = Highlight::create($request->all());
        if ($Highlight)
        return redirect()->to('/highlight/list/'.$Highlight->publication_id)->with('flash_message', 'Highlight created!');
                else
                    return redirect()->to('/highlight/list/'.$Highlight->publication_id)->with('flash_message', 'Can not create!.');
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
        $data = Highlight::where('id', $id)->first();
        return view('highlight.edit', compact('data'));
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
       $user = \Auth::user()->id;
       $ip  = $request->ip();
       $Highlight = Highlight::where('id' , $id)->first();
            $Highlight->name = $request->name;
            $Highlight->value = $request->value;
            $Highlight->user_edited = $user;
            $Highlight->ip_edited = $ip;    
            $result = $Highlight->update();  
            if($result)
                return redirect()->to('/highlight/list/'.$Highlight->publication_id)->with('flash_message', 'Highlight updated!');
                else
                    return redirect()->to('/highlight/list/'.$Highlight->publication_id)->with('flash_message', 'Can not update!.');
    }

    /**,'uses'
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $Highlight = Highlight::findOrFail($id);
          $Highlight->delete();
//
        return redirect()->to('/highlight/list/'.$Highlight->publication_id)->with('flash_message', 'Highlight deleted!');
    }
}
