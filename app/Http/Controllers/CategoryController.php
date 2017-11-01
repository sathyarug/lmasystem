<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use App\Category;
use App\SubCategory;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class CategoryController extends Controller
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
        $categories = Category::all(); 
        return view('category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:3|max:40',
        ]);

        $name = $request['name'];
        $user = \Auth::user()->id;
        $ip  = $request->ip();
        $category = new Category();
        $category->name = $name;
        $category->user_created = $user;
        $category->user_edited = $user;
        $category->ip_created = $ip;
        $category->ip_edited = $ip;
        $category->save();
        return redirect()->route('categories.index')
            ->with('flash_message',
             'Category '. $category->name.' added!');

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
        // return redirect('categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $category = Category::findOrFail($id);

        return view('category.edit', compact('category'));
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
         $category = Category::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|min:3|max:40',
        ]);
        $user = \Auth::user()->id;
        $ip  = $request->ip();
        $input = $request->all();
        $input['ip_edited'] = $ip;
        $input['user_edited'] = $user;
        $category->fill($input)->save();

        return redirect()->route('categories.index')
            ->with('flash_message',
             'Category'. $category->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // $category = Category::findOrFail($id);

    
  

        // $category->delete();

        // return redirect()->route('categories.index')
        //     ->with('flash_message',
        //      'Category deleted!');
    }
}
