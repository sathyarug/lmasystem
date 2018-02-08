@extends('layouts.page.mastercrop')
@section('title')
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
                <input type="hidden" id="publication_upload_id" value="{{$data['publication_upload_id']}}" name="publication_upload_id" />
		<input type="hidden" name="image" value="{{$data['publication_page']}}" />
		             <button type="submit" id="show-modal" class="btn btn-primary btn-cons" style="margin-bottom: 30px;margin-top: 50px;"><i class=""></i>
            Show Article
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
              var ht =  $( document ).height();
//              $('#annotation img').css( "height", ht);
              
</script>  
@endsection

