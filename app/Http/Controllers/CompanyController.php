<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use App\User;
use Auth;
use App\Category;
use App\Company;
Use App\Upload;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class CompanyController extends Controller
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
        $companies = Company::all();
        return view('company.index',compact('companies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name','id')->all();
        return view('company.create',compact('categories'));
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
        $this->validate($request,[
            'name_short' => 'required|min:3|max:10',
            'name_full' => 'required|min:5|max:50', 
            'category_id' => 'required',  
            'logo' => 'required', 
        ]);

        // $input = $request->all();
        $user = \Auth::user()->id;
        $ip  = $request->ip();
        $input['name_short'] = $request['name_short'];
        $input['name_full'] = $request['name_full'];
        $input['category_id'] = $request['category_id'];
        $input['user_created'] = $user;
        $input['user_edited'] = $user;
        $input['ip_created'] = $ip;
        $input['ip_edited'] = $ip;

        $company = Company::create($input);
          
       if($file = $request->file('logo')) {

              $s3 = \Storage::disk('s3');
              $name = time() . $file->getClientOriginalName();
              $filePath = '/logo/' . $name;
              $s3->put($filePath, file_get_contents($file), 'public');
             
              // $name = 'logo/'.time() . $file->getClientOriginalName();
              //$file->move('logo',$name);
              $logo = new Upload();
              $logo->file = 'logo/'.$name;
              $logo->user_created = $user;
              $logo->user_edited = $user;
              $logo->ip_created = $ip;
              $logo->ip_edited = $ip;
              $company->photo()->save($logo);


             // $upload = Upload::create(['file' => $name,'user_created'=> $user,'user_edited'=> $user,'ip_created'=> $ip,'ip_edited'=> $ip]);

          }


          return redirect()->route('companies.index')
            ->with('flash_message',
             'Company '. $input['name_full'].' added!');

          

        
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
    }
}
