@extends('layouts.page.master')
@section('title')

	<title>LMA Category Edit</title>

@endsection

@section('css')

	

@endsection


@section('breadcrumbs')

	<ol class="breadcrumb breadcrumb-alt">
        <li class="breadcrumb-item"><a href="#">Category</a></li>
         <li class="breadcrumb-item active">Edit</li>
    </ol>


@endsection

@section('content')
<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-legal'></i> Edit {{$category->name}}</h1>
    <br>
    {{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

    <div class="form-group">
        {{ Form::label('name', 'Category Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <br>
    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
	

@endsection

@section('js')

	

@endsection


