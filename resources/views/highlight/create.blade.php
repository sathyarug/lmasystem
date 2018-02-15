@extends('layouts.page.master')
@section('title')

	<title>LMA Highlight</title>

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
                          {!! Form::open(['method'=>'POST','action'=>'HighlightController@store','files'=>true]) !!}            
                         <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('name') ? ' has-error' : '' }}">
                          {!! Form::label('name','Name') !!}                                     
                           {!! Form::text('name','',array('class' => "form-control" ,'required')) !!}
                           {!! Form::hidden('publication_id',$id,array('class' => "form-control" ,'required')) !!}
                          </div>
                        </div>
                        <br>
                        <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('value') ? ' has-error' : '' }}">
                          {!! Form::label('value','Value') !!}                          	                       
                          {!! Form::text('value','',array('class' => "form-control" ,'required')) !!}
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