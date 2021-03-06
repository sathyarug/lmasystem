@extends('layouts.page.master')
@section('title')

	<title>LMA Tag Edit</title>

@endsection

@section('css')

	

@endsection


@section('breadcrumbs')

	<ol class="breadcrumb breadcrumb-alt">
        <li class="breadcrumb-item"><a href="#">Tag</a></li>
         <li class="breadcrumb-item active">Edit</li>
    </ol>


@endsection

@section('content')
<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-legal'></i> Edit {{$tag->name}}</h1>
    <br>
    {{ Form::model($tag, array('route' => array('tags.update', $tag->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

    <div class="form-group">
        {{ Form::label('name', 'Tag Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <br>
    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
	

@endsection

@section('js')

	

@endsection


