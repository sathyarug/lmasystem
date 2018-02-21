@extends('layouts.page.master')
@section('title')

	<title>LMA Client Email</title>

@endsection

@section('css')

	

@endsection


@section('breadcrumbs')
<div class="bg-white">
    <div class="container">
    	<ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item"><a href="#">Client Email</a></li>
             <li class="breadcrumb-item active">edit</li>
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
                          {!! Form::open(['method'=>'POST','action'=>'ClientEmailController@store','files'=>true]) !!}            
                        <br>
                        <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('value') ? ' has-error' : '' }}">
                          {!! Form::label('Email Address','Value') !!}                          	                       
                          {!! Form::text('email','',array('class' => "form-control" ,'required')) !!}
                          {!! Form::hidden('client_id',$id,array('class' => "" )) !!}
                          </div>
                        </div>   
                        <div class="form-group-attached">
                            <label class="">Monitoring Types</label>
                            <br> 
                            <div class="check-warning no-margin ">
                                <input class="" name="press" value="1" type="checkbox">
                                <label for="press">Press</label>    
                                <input class="" name="radio" value="1" type="checkbox">
                                <label for="radio">Radio</label>    
                                <input class="" name="tv" value="1" type="checkbox">
                                <label for="tv">Tv</label>    
                            </div>                         
                        </div>
                        <br>
                         {{Form::button('<i class="pg-plus"></i>'.' Save', array('type' => 'submit', 'class' => 'btn btn-primary'))}}
                        {{ Form::close() }}
                      
                    </div>
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
@endsection