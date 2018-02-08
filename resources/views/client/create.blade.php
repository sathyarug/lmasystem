@extends('layouts.page.master')
@section('title')

	<title>LMA Add Client</title>

@endsection

@section('css')
<link href="{{asset('/assets/plugins/dropzone/css/dropzone.css')}}" rel="stylesheet" type="text/css" />

	

@endsection


@section('breadcrumbs')
<div class="bg-white">
    <div class="container">
    	<ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item"><a href="#">Client</a></li>
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
                      
                      	{!! Form::open(['method'=>'POST','action'=>'ClientController@store','files'=>true]) !!}
                       
                         <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            {!! Form::label('user_id','Select User') !!}
                            
                            {!! Form::select('user_id',[''=>'Choose Options'] + $users, null,['class'=>'form-control','required'=>'']) !!}

                          </div>
                         
                        </div>
                        <br>
                          <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name','Full Name') !!}
                            {!! Form::text('name','',array('class' => "form-control" ,'required')) !!}
                          </div>
                         
                        </div>
                        <br>

                      <br>

                      
                        <div class="form-group-attached">

                        <label class="">Monitoring Types</label>
                        <br> 
                       <div class="check-warning no-margin ">
                        <input class="" name="press" value="1" type="checkbox">
                        <label for="press">press</label>    
                        <input class="" name="radio" value="1" type="checkbox">
                        <label for="radio">radio</label>    
                        <input class="" name="tv" value="1" type="checkbox">
                        <label for="tv">tv</label>    
                          
                      </div>                         
                        </div>
                        <br>
                        <div class="form-group-attached">
                          <label class="">Category</label>
                          <row>
                            <div class="col-md-4"><div class=" form-group form-group-default required{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            {!! Form::label('company_id','Select Company') !!}
                            
                            {!! Form::select('category[0][company_id]',[''=>'Choose Options'] + $companies, null,['class'=>'form-control','required'=>'']) !!}

                          </div>
                        </div>
                           <div class="col-md-4">
                            <div class=" form-group form-group-default required{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            {!! Form::label('country_id','Select Country') !!}
                            
                            {!! Form::select('category[0][country_id]',[''=>'Choose Options'] + $countries, null,['class'=>'form-control','required'=>'']) !!}

                          </div>
                        </div>
                          </row>
                         <row>
                            <div class="col-md-4"><div class=" form-group form-group-default required{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            {!! Form::label('company_id','Select Company') !!}
                            
                            {!! Form::select('category[2][company_id]',[''=>'Choose Options'] + $companies, null,['class'=>'form-control','required'=>'']) !!}

                          </div>
                        </div>
                           <div class="col-md-4">
                            <div class=" form-group form-group-default required{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            {!! Form::label('country_id','Select Country') !!}
                            
                            {!! Form::select('category[2][country_id]',[''=>'Choose Options'] + $countries, null,['class'=>'form-control','required'=>'']) !!}

                          </div>
                        </div>
                          </row>
                         
                        </div>
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


