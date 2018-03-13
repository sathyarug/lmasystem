@extends('layouts.page.mastercrop')
@section('title')
<?php
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
?>
	<title>LMA Add Publication</title>
@endsection

@section('css')
	<link rel="stylesheet" href="//cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.css">	
  

@endsection

@section('breadcrumbs')
<!--<div class="bg-white">
    <div class="container">
    	<ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item"><a href="#">Publication</a></li>
             <li class="breadcrumb-item active">show</li>
        </ol>
    </div>
</div>-->


@endsection

@section('content')

  <!-- START CONTAINER FLUID -->
<!--          <div class=" no-padding    container-fixed-lg bg-white">
            <div class="container">
              <div class="row">
                
                <div class="col-md-12">
                   START card 
                  <div class="card card-transparent">
                    <div class="card-block">-->

                  <div id="annotation"></div>      
                        
                  <form action="{{ url('/croped-articles') }}" method="post" target="_blank">
                      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                      <input type="hidden" id="annotationsJSON" name="annotationsJSON" />
                      <input type="hidden" id="publication_upload_id" value="@if(!empty($data['publication_upload_id'])) {{$data['publication_upload_id']}} @endif" name="publication_upload_id" />
                      <input type="hidden" name="image" value="@if(!empty($data['publication_page'])) {{$data['publication_page']}} @endif" />
                      <button type="submit" id="show-modal" class="btn btn-primary btn-cons" style="margin-bottom: 30px;margin-top: 50px;border-color: #07c25f;background-color: #07c25f;color: #fff;padding: 12px;font-size:  14px;border: 1px solid;border-radius: 5px;"><i class=""></i>
                          Process Article
                      </button>
                  </form>
	
<!--	     
                    </div>
                  </div>
                   END card 
                </div>
              </div>
            </div>
          </div>-->
          <!-- END CONTAINER FLUID -->
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.js"></script>	
<script src="{{ asset('js/annotation.js')}}"></script>
<script type="text/javascript">
		$('#annotation').annotation({
			image: "{{$data['publication_page']}}",
			editable: true,
			hiddenInputId: 'annotationsJSON'
		});
              
</script>  
@endsection


