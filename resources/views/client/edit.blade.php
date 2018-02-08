@extends('layouts.page.master')
@section('title')

	<title>LMA Edit Client</title>

@endsection

@section('css')

	

@endsection


@section('breadcrumbs')
<div class="bg-white">
    <div class="container">
    	<ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item"><a href="#">Client</a></li>
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
                      
                      	
                        {{ Form::model($data, array('route' => array('client.update', $data->id), 'method' => 'PUT')) }}
                       
                       
                         <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('type') ? ' has-error' : '' }}">
                             {!! Form::label('user_id','Select User') !!}
                            
                            {!! Form::select('user_id',[''=>'Choose Options'] + $users, null,['class'=>'form-control','required'=>'']) !!}

                          </div>
                         
                        </div>
                        <br>
                         <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('name') ? ' has-error' : '' }}">
                          	{!! Form::label('name','Client name') !!}                          	                       
                        	  {!! Form::text('name',$data->name,array('class' => "form-control" ,'required')) !!}

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
                        <br>
                        
                        <br>
                        {{-- <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-default"><i class="pg-close"></i> Clear</button> --}}
                         {{Form::button('<i class="pg-plus"></i>'.' Update', array('type' => 'submit', 'class' => 'btn btn-primary'))}}
                        
                         

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

	

@endsection


