<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryClient;
use App\Category;
use App\Company;

class ClientCategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    public function category($id) {
        $categoryclients = CategoryClient::all();
        $pid = $id;
        return view('categoryclients.index', compact('categoryclients', 'pid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    public function add($id) {
        $categories = Category::pluck('name', 'id')->all();
        $id = $id;
        return view('categoryclients.create', compact('id', 'categories'));
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
        $request->request->add(['ip_created' => $ip]);
        $request->request->add(['user_created' => $user]);
     
        $exist = CategoryClient::where('company_id',$request->company_id)->where('client_id',$request->client_id)->where('category_id',$request->category_id)->exists();
        if(!$exist){
        $CategoryClient = CategoryClient::create($request->all());   
        if ($CategoryClient)
            return redirect()->to('/clientcategory/list/' . $request->client_id)->with('flash_message', 'Client category created!');
        else
            return redirect()->to('/clientcategory/list/' . $request->client_id)->with('flash_message', 'Can not create!.');
        }else{
             return redirect()->to('/clientcategory/list/' . $request->client_id)->with('flash_message', 'Can not create!. Already exist');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = CategoryClient::where('id', $id)->first();
        $companys = Company::where('category_id', $data->category_id)->pluck('name_full', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();
        return view('categoryclients.edit', compact('data', 'categories', 'companys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = \Auth::user()->id;
        $ip = $request->ip();
        $CategoryClient = CategoryClient::where('id', $id)->first();
        $CategoryClient->category_id = $request->category_id;
        $CategoryClient->company_id = $request->company_id;
        $CategoryClient->status = $request->status;
        $CategoryClient->user_edited = $user;
        $CategoryClient->ip_edited = $ip;
        $result = $CategoryClient->update();
        if ($result)
            return redirect()->to('/clientcategory/list/' . $CategoryClient->category_id)->with('flash_message', 'Client category updated!');
        else
            return redirect()->to('/clientcategory/list/' . $CategoryClient->category_id)->with('flash_message', 'Can not update!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $CategoryClient = CategoryClient::findOrFail($id);
        $CategoryClient->delete();
        return redirect()->to('/clientcategory/list/' . $CategoryClient->category_id)->with('flash_message', 'Client category deleted!');
    }

}
