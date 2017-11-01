@extends('layouts.page.master')
@section('title')

	<title>LMA Permissions Create</title>

@endsection

@section('css')

	

@endsection


@section('breadcrumbs')

	<ol class="breadcrumb breadcrumb-alt">
        <li class="breadcrumb-item"><a href="#">Sub Category</a></li>
         <li class="breadcrumb-item active">Create</li>
    </ol>


@endsection

@section('content')
<div class='col-lg-6 col-lg-offset-6'>

    <h1><i class='fa fa-plus'></i> Add Sub Category</h1>
    <br>

    {{ Form::open(array('url' => 'subcategories')) }}
    {!! Form::hidden('category', $category->id, []) !!}
     <div class="form-group form-group-default disabled">
        {{ Form::label('category','Category') }}
        {{ Form::text('category_name', $category->name, array('class' => 'form-control','disabled')) }}
                        
    </div>

     <div class="form-group form-group-default required">
        {{ Form::label('sub_category', 'Sub Category') }}
        {{ Form::text('sub_category', '', array('class' => "form-control" ,'required')) }}
                           
     </div>
   
    <br>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
	

@endsection

@section('js')

	

@endsection


