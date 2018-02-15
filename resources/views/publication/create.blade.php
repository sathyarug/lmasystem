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

                        {{ Form::open(array('url' => 'publications')) }}

                        <div class="form-group-attached">
                            <div class="form-group form-group-default required{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name','Publication name') !!}


                                {!! Form::text('name','',array('class' => "form-control" ,'required')) !!}


                            </div>

                        </div>
                        <div class="form-group-attached">
                            <div class="form-group form-group-default required{{ $errors->has('type') ? ' has-error' : '' }}">
                                {!! Form::label('type','Publication Type') !!}


                                {!! Form::select('type',[1=>'General',2=>'Special'],1, ['class'=>'form-control']) !!}


                            </div>

                        </div>
                        <p class="m-t-10">Languages</p>

                        <div class="radio radio-danger required{{ $errors->has('language') ? ' has-error' : '' }}">
                            @foreach ($languages as $language)
                            <input type="radio" value="{{$language->id}}" name="language_id" id="{{$language->name}}" class="sr-only" required>
                            <label for="{{$language->name}}">{{$language->name}}</label>
                            @endforeach

                        </div>

                        <p class="m-t-10">Frequency</p>

                        <div class="radio radio-success required{{ $errors->has('frequency') ? ' has-error' : '' }}">
                            <input type="radio" checked="checked" value="1" name="frequency" id="daily">
                            <label for="daily">Daily</label>
                            <input type="radio" value="7" name="frequency" id="weekly">
                            <label for="weekly">Weekly</label>
                        </div>


                        <div class="form-group-attached">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <div class="form-input-group">
                                            {!! Form::label('c_rate', 'Colour Rate') !!}
                                        </div>
                                        <div class="form-input-group {{ $errors->has('c_rate') ? ' has-error' : '' }}">
                                            {!! Form::number('c_rate','',array('class'=>'form-control','step'=>'any','required')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default input-group required {{ $errors->has('b_rate') ? ' has-error' : '' }}">
                                        <div class="form-input-group">
                                            {!! Form::label('b_rate','Black AND White rate') !!}
                                        </div>
                                        <div class="input-group-addon bg-transparent h-c-50">
                                            {!! Form::number('b_rate','',array('class'=>'form-control','step'=>'any','required')) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default input-group required {{ $errors->has('bc1_rate') ? ' has-error' : '' }}">
                                        <div class="form-input-group">
                                            {!! Form::label('bc1_rate', 'BC1 Rate') !!}
                                            {!! Form::number('bc1_rate','', array('class'=>'form-control','step'=>'any','required')) !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default input-group required {{ $errors->has('bc2_rate') ? ' has-error' : '' }}">
                                        <div class="form-input-group">
                                            {!! Form::label('bc2_rate', 'BC2 Rate') !!}
                                            {!! Form::number('bc2_rate','', array('class'=>'form-control','step'=>'any','required')) !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default input-group required {{ $errors->has('c_width') ? ' has-error' : '' }}">
                                        <div class="form-input-group">
                                            {!! Form::label('c_width', 'Column Width') !!}
                                            {!! Form::number('c_width','', array('class'=>'form-control','step'=>'any','required')) !!}
                                        </div>

                                    </div>
                                </div>
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


