@extends('layouts.page.master')
@section('title')

	<title>LMA Upload Print</title>

@endsection

@section('css')
<link href="{{asset('/assets/plugins/dropzone/css/dropzone.css')}}" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<link media="screen" type="text/css" rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css')}}">


	

@endsection


@section('breadcrumbs')
<div class="bg-white">
    <div class="container">
    	<ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item"><a href="#">Print</a></li>
             <li class="breadcrumb-item active">Upload</li>
        </ol>
    </div>
</div>


@endsection

@section('content')

  <!-- START CONTAINER FLUID -->
          <div class=" no-padding    container-fixed-lg bg-white">
            <div class="container">
              <div class="row">
                
                <div class="col-md-12">
                  <!-- START card -->
                  <div class="card card-transparent">
                    <div class="card-block">
                      
                      	{!! Form::open(['method'=>'POST','action'=>'PublicationUploadController@store','files'=>true]) !!}
                       
                          <div class="form-group form-group-default required{{ $errors->has('publication_id') ? ' has-error' : '' }}">
                            {!! Form::label('publication_id','Publication') !!}
                            
                            {!! Form::select('publication_id',[''=>'Choose Options'] + $publications, null,['class'=>'form-control']) !!}
                       
                           
                          

                          </div>
                          <div class="form-group form-group-default required{{ $errors->has('section_id') ? ' has-error' : '' }}">
                           {!! Form::label('section_id','Product Sub Category') !!}

                           {!! Form::select('section_id',[''=>'Choose section'], null,['class' => 'form-control', 'required' => 'required']) !!}
                  {{-- <small class="text-danger">{{ $errors->first('section_id') }}</small> --}}
                       
                           
                          

                          </div>
                         
                         
                        
                        
                          <div class="form-group form-group-default required{{ $errors->has('page_no') ? ' has-error' : '' }}">
                          	{!! Form::label('page_no','Page No') !!}
                          	
                       
                        	  {!! Form::text('page_no','',array('class' => "form-control" ,'required')) !!}
                          

                          </div>
                          <div class="form-group form-group-default required{{ $errors->has('published_date') ? ' has-error' : '' }}">
                            <div class="input-group datepicker"> <!-- Date input -->
                                  
                                  {!! Form::label('published_date','Publish Date') !!}
                                 
                                  <input class="form-control" id="published_date" name="published_date" placeholder="  MM/DD/YYY" type="text" 'required'/><i class="fa fa-calendar"></i> 
                                  
                            </div>
                          </div>
                          
                         
                        <div class="form-group form-group-default required{{ $errors->has('file') ? ' has-error' : '' }}">
                          
                            
                            
                            {!! Form::file('file',['class'=>'form-control','required']) !!}
                            {!! Form::label('file','File') !!}

                          </div>
                         
                      

                     

                      
                        
                        <br>
                        
                        <br>
                        {{-- <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-default"><i class="pg-close"></i> Clear</button> --}}
                         {{Form::button('<i class="pg-plus"></i>'.' Uplod', array('type' => 'submit', 'class' => 'btn btn-primary'))}}
                        
                         {{Form::button('<i class="pg-close"></i>'.' Clear', array('type' => 'reset', 'class' => 'btn btn-default'))}}

    					 {{ Form::close() }}
                      
                    </div>
                  </div>
                  <script>
                    $(document).ready(function(){
                      var date_input=$('input[name="date"]'); //our date input has the name "date"
                      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                      var options={
                        format: 'mm/dd/yyyy',
                        container: container,
                        todayHighlight: true,
                        autoclose: true,
                      };
                      date_input.datepicker(options);
                    })
                         
                  </script>
                   <script type="text/javascript">
              $(document).ready(function() {
                  $('select[name="publication_id"]').on('change', function() {
                      var categoryID = $(this).val();
                      if(categoryID) {
                          $.ajax({
                              url: '/publication/sections/'+categoryID,
                              type: "GET",
                              dataType: "json",
                              success:function(data) {


                                  $('select[name="section_id"]').empty();
                                  $.each(data, function(key, value) {
                                      $('select[name="section_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                                  });

                              }
                          });
                      }else{
                          $('select[name="section_id"]').empty();
                      }
                  });
              });
          </script>
                  <!-- END card -->
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTAINER FLUID -->

	

@endsection

@section('js')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
  $(document).ready(function(){
    var date_input=$('input[name="published_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'mm/dd/yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
</script>

	{{-- <script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js">
    <script>
$(document).ready(function() {
    $('#myDatepicker').datepicker();
});
</script> --}}

@endsection


