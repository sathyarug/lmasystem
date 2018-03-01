<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use App\Publication;
use App\PublicationSection;
use App\Upload;
use App\PublicationUpload;
use Carbon\Carbon ;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
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
//        iamonitoring/publication/2018/03/01/1519885844Chrysanthemum.jpg
       $publicationup = PublicationUpload::all();  
       return view('article.index',compact('publicationup'));
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
    public function store(Request $request) {
        if($request->allarticle){
        $imagedata = str_replace('data:image/png;base64,', '', $request->allarticle);
        $pieces = explode(",", $imagedata);
        $user = \Auth::user()->id;
        $ip = $request->ip();
        $upres = FALSE;
        foreach ($pieces as $ky => $pce) {
            $data = base64_decode($pce);
            $s3 = \Storage::disk('s3');
            $name = time() . '_' . $ky . '.jpg';
            $filePath = 'article/' . date("Y") . '/' . date("m") . '/' . date("d") . '/' . $name;
            $s3->put($filePath, $data, 'public');
            
              $Article = new Article();
              $Article->publication_upload_id = $request->publication_upload_id;
              $Article->headline = '';
              $Article->description = '';
              $Article->highlight_id = 5;
              $Article->column_cm = 5;
              $Article->cordinate_map = '';
              $Article->user_created = $user;
              $Article->ip_created = $ip;
              $Article->save();
              
              $upload = new Upload();
              $upload->file = $filePath;
              $upload->user_created = $user;
              $upload->ip_created = $ip;
              $upres = $Article->photo()->save($upload);
        }
        if($upres){
        $PublicationUpload = PublicationUpload::find($request->publication_upload_id);       
        $PublicationUpload->status = 2;     
        $result = $PublicationUpload->update();
        }
        
        return redirect()->route('article.index')
                        ->with('flash_message', 'Article added!');
        }
        return redirect()->route('article.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show',compact('publications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
    
    public function showPublication(Request $request)
    {
        $PublicationUpload = PublicationUpload::find($request->id);       
        $PublicationUpload->status = 1;     
        $result = $PublicationUpload->update();
        
        $data['publication_page'] = 'http://52.221.129.69/uploads/'.$PublicationUpload->uploads->first()->file;
//        $data['publication_page'] = url('/').'/Penguins.jpg';
        $data['publication_upload_id'] = $request->id;
        return view('article.showpub',compact('data','PublicationUpload'));
    }
    
    public function showCroped(Request $request)
    {
        $data = [];
        return view('article.croped',compact('data'));
    }
    
    public function pending()
    {
       $publicationup = PublicationUpload::where('status',0)->get(); 
       return view('article.index',compact('publicationup'));
    }
    
    public function processed()
    {
       $publicationup = PublicationUpload::where('status',2)->get(); 
       return view('article.index',compact('publicationup'));
    }
    
    public function approved()
    {
       $publicationup = PublicationUpload::where('status',3)->get();   
       return view('article.index',compact('publicationup'));
    }
}
