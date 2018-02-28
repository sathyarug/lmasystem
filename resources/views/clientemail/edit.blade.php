@extends('layouts.page.master')
@section('title')

	<title>LMA Edit Highlight</title>

@endsection

@section('css')

	

@endsection


@section('breadcrumbs')
<div class="bg-white">
    <div class="container">
    	<ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item"><a href="#">Highlight</a></li>
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
                         {{ Form::model($data, array('route' => array('clientemail.update', $data->id), 'method' => 'PUT')) }}     
                         <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('name') ? ' has-error' : '' }}">
                         {!! Form::label('Email Address','Email Address') !!}                          	                       
                          {!! Form::text('email',$data->email,array('class' => "form-control" ,'required')) !!}
                          {!! Form::hidden('client_id',$data->client_id,array('class' => "" )) !!}
                        </div>
                        </div>
                        <br>
                      <div class="form-group-attached">

                        <label class="">Monitoring Types</label>
                        <br> 
                       <div class="check-warning no-margin ">
                        <input class="" name="press" @if($data['press'] == 1)  checked="checked"  @endif value="1" type="checkbox">
                        <label for="press">press</label>    
                        <input class="" name="radio" @if($data['radio'] == 1)   checked="checked"  @endif value="1" type="checkbox">
                        <label for="radio">radio</label>    
                        <input class="" name="tv" @if($data['tv'] == 1)   checked="checked"  @endif value="1" type="checkbox">
                        <label for="tv">tv</label>    
                          
                      </div>                         
                        </div>
                         <p class="m-t-10">Status</p>

                        <div class="radio radio-success required{{ $errors->has('status') ? ' has-error' : '' }}">
                            <input type="radio" @if($data['status'] == 1)  checked="checked"  @endif value="1" name="status" id="daily">
                            <label for="daily">Yes</label>
                            <input type="radio" value="0" @if($data['status'] == 0)  checked="checked"  @endif name="status" id="weekly">
                            <label for="weekly">No</label>
                        </div>
                        <br>
                         {{Form::button('<i class="pg-plus"></i>'.' Update', array('type' => 'submit', 'class' => 'btn btn-primary'))}}
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


