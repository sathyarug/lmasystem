@extends('layouts.page.master')
@section('title')

	<title>LMA Add Company</title>

@endsection

@section('css')
<link href="{{asset('/assets/plugins/dropzone/css/dropzone.css')}}" rel="stylesheet" type="text/css" />

	

@endsection


@section('breadcrumbs')
<div class="bg-white">
    <div class="container">
    	<ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item"><a href="#">Company</a></li>
             <li class="breadcrumb-item active">Create</li>
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
                      
                      	{!! Form::open(['method'=>'POST','action'=>'CompanyController@store','files'=>true]) !!}
                       
                        <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('name_short') ? ' has-error' : '' }}">
                          	{!! Form::label('name_short','Short Name') !!}
                          	
                       
                        	  {!! Form::text('name_short','',array('class' => "form-control" ,'required')) !!}
                          

                          </div>
                         
                        </div>
                        <br>
                         <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('name_full') ? ' has-error' : '' }}">
                            {!! Form::label('name_full','Full Name') !!}
                            
                       
                            {!! Form::text('name_full','',array('class' => "form-control" ,'required')) !!}
                          

                          </div>
                         
                        </div>
                        <br>
                         <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            {!! Form::label('category_id','Category') !!}
                            
                            {!! Form::select('category_id',[''=>'Choose Options'] + $categories, null,['class'=>'form-control']) !!}
                       
                           
                          

                          </div>
                         
                        </div>
                       

                      <br>

                      
                        <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('logo') ? ' has-error' : '' }}">
                          
                            
                            
                            {!! Form::file('logo',['class'=>'form-control']) !!}
                            {!! Form::label('logo','Logo') !!}

                          </div>
                          
                          
                       
                          
                        </div>
                        <br>
                        
                        <br>
                        {{-- <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-default"><i class="pg-close"></i> Clear</button> --}}
                         {{Form::button('<i class="pg-plus"></i>'.' Add', array('type' => 'submit', 'class' => 'btn btn-primary'))}}
                        
                         {{Form::button('<i class="pg-close"></i>'.' Clear', array('type' => 'reset', 'class' => 'btn btn-default'))}}

    					 {{ Form::close() }}
                      
                    </div>
                  </div>
                  <!-- END card -->
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTAINER FLUID -->

	

@endsection

@section('js')

<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<script type="text/javascript" src="{{asset('/assets/plugins/dropzone/dropzone.min.js')}}"></script>

	

@endsection


