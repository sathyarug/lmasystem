<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationUpload extends Model
{
    //
    protected $fillable = [
        'publication_id','section_id','page_no','published_date','upload_id','highlight_id','user_created','user_edited','ip_created','ip_edited',
    ];

    public function section()
    {
        return $this->belongsTo('App\PublicationUpload','section_id');
        
    }
    public function publication()
    {
        return $this->belongsTo('App\Publication');
        
    }
    
    public function uploads()
  {
    return $this->morphMany('App\Upload', 'uploadable');
  }

    public function highlight()
    {
        return $this>belongsTo('App\Highlight');
    }

}
