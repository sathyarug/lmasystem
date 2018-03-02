<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use App\User;
use Auth;
use App\Publication;
use App\PublicationSection;
use App\Upload;
use App\PublicationUpload;
use Carbon\Carbon ;


//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class PublicationUploadController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::findOrFail(\Auth::user()->id);
        // $publications = Publication::pluck('name','id')->all();
        $publications = $user->uploader->pluck('name','id')->all();
        
        // return $publications;

        // foreach ($publications as $publication) {
        //     echo $publication->name;
        //     echo " ";
        //     // echo $publication->id;

        //     echo "<br>";
        // }

        // var_dump($publications);
        
         return view('publicationupload.create',compact('publications'));
    }

     public function sections($id)
    {
       // $sections = DB::table("publication_sections")
        $sections = PublicationSection::where("publication_id",$id)
                    ->pluck("name","id");
        // return $sections;
        return json_encode($sections);
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
            'publication_id' => 'required',
            'page_no' => 'required',  
            'published_date' => 'required', 
            'file' => 'required',
        ]);

        $input = $request->all();
        $user = \Auth::user()->id;
        $ip  = $request->ip();
        $fileupload = $request->all();
        $fileupload['published_date'] = Carbon::parse($request->published_date);
        // $fileupload['upload_id'] = $upload->id;
        $fileupload['user_created'] = $user;
        $fileupload['user_edited'] = $user;
        $fileupload['ip_created'] = $ip;
        $fileupload['ip_edited'] = $ip;

        $publication = PublicationUpload::create($fileupload);

       if($file = $request->file('file')) {

            $s3 = \Storage::disk('uploads');
              $name = time() . $file->getClientOriginalName();
              $filePath = 'publication/'.date("Y").'/'.date("m").'/'.date("d").'/' . $name;
              $s3->put($filePath, file_get_contents($file), 'public');
             
              // $name = 'logo/'.time() . $file->getClientOriginalName();
              //$file->move('logo',$name);
              $upload = new Upload();
              $upload->file = 'publication/'.date("Y").'/'.date("m").'/'.date("d").'/'.$name;
              $upload->user_created = $user;
              $upload->user_edited = $user;
              $upload->ip_created = $ip;
              $upload->ip_edited = $ip;
              $publication->uploads()->save($upload);


             //  $name = 'file/'.date("Y").'/'.date("m").'/'.date("d").'/'.time() . $file->getClientOriginalName();
             //  $file->move( 'file/'.date("Y").'/'.date("m").'/'.date("d"),$name);
             // $upload = Upload::create(['file' => $name,'user_created'=> $user,'user_edited'=> $user,'ip_created'=> $ip,'ip_edited'=> $ip]);

          }

        
         


        return redirect()->route('upload.create')
            ->with('flash_message',
             'Page Uploaded');
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
