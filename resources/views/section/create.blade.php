@extends('layouts.page.master')
@section('title')

	<title>LMA Add Publication</title>

@endsection

@section('css')

	

@endsection


@section('breadcrumbs')
<div class="bg-white">
    <div class="container">
    	<ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item"><a href="#">Publication</a></li>
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
                      
                      	{{ Form::open(array('url' => 'sections')) }}
                        {!! Form::hidden('publication_id', $publication->id, []) !!}
                       
                        <div class="form-group-attached">
                          <div class="form-group form-group-default">
                          	{!! Form::label('name','Publication name') !!}
                          	
                       
                        	  {!! Form::text('name',$publication->name,array('class' => "form-control" ,'disabled')) !!}
                          

                          </div>
                         
                        </div>
                         <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name','Publication Section Name') !!}
                            
                       
                            {!! Form::text('name','', ['class' => "form-control" ,'required']) !!}
                          

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

	

@endsection


