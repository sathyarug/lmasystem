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

class SubCategoryController extends Controller
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
        // $subcategories = SubCategory::all();
        
        // return($subcategories);

    }
    public function list($id)
    {
        $category = Category::findOrFail($id);
        $subcategories = SubCategory::where('category_id',$id)->get()->all();
        return view('subcategory.index',compact('category','subcategories'));
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
        $category = Category::findOrFail($id);
        return view('subcategory.create',compact('category'));
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
            'sub_category'=>'required|min:3|max:40',
        ]);

        $name = $request['sub_category'];
        $category_id = $request['category'];
        $user = \Auth::user()->id;
        $ip  = $request->ip();
        $sub_category = new SubCategory();
        $sub_category->category_id = $category_id;
        $sub_category->name = $name;
        $sub_category->user_created = $user;
        $sub_category->user_edited = $user;
        $sub_category->ip_created = $ip;
        $sub_category->ip_edited = $ip;
        $sub_category->save();
        return redirect()->route('subcategories.list', $category_id)
            ->with('flash_message',
             ' Sub Category'. $sub_category->name.' added!');

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
        $sub_category = SubCategory::findOrFail($id);
         $category = $sub_category->category_id;

    
  

        $sub_category->delete();

        return redirect()->route('subcategories.list',$category)
            ->with('flash_message',
             'Sub Category deleted!');
    }
}
