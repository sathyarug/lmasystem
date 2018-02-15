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
                           
                            <div class="field_wrapper ">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-4">
                                        {!! Form::label('category_id','Select Category') !!}
                                        {!! Form::select('category[0][category_id]',[''=>'Choose Options'] + $categories, null,['class'=>'form-control client_cat','required'=>'','data-id' => 0]) !!}
                                </div>
                                <div class="col-md-4">
                                        {!! Form::label('company_id','Select Company') !!}
                                        <div class="progress">
                                        <div style="display: block;" class="progress-bar-indeterminate"></div>
                                        </div>
                                        <div class="company-selectbox">
                                        </div>         
                                </div>
                                <div class="col-md-4 cat-indexv" data-id="0">
                                        <a href="javascript:void(0);" data-id="0" class="add_button" title="Add field"><img src="{{ asset('assets/img/addbtn.png') }}"/></a>
                                </div>
                            </div>


                        </div>
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
<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
          //New input field html 
        $(addButton).click(function() { //Once add button is clicked
//        var kid = $(this).attr('data-id');
        var kid = $( ".cat-indexv" ).last().attr('data-id');
        var fieldHTML = $('.client_cat').prop('outerHTML');
//           console.log(JSON.stringify(fieldHTML));            
      //Increment field counter
         kid++;
         fieldHTML = fieldHTML.replace("category[0][category_id]", "category["+kid+"][category_id]");
        $(wrapper).append('<div class="row fil-set"><div style="margin-top: 5px;" class="col-md-4">'
            +fieldHTML+
            '</div><div style="margin-top: 5px;" class="col-md-4"><input class="form-control" required="" name="highlights['+kid+'][value]" value="" type="text"></div>\n\
            <div class="col-md-4" style="margin-top: 10px;"><div class="form-input-group cat-indexv" data-id="'+kid+'"><a href="javascript:void(0);" class="remove_button" data-id="'+kid+'" title="Remove field"><img src="http://localhost/lma/tetsima/lmasystem/public/assets/img/remove.png"></a></div></div></div>'); // Add field html      
        }); 
        $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
            e.preventDefault();
            $(this).parents('.fil-set').remove(); //Remove field html
            //Decrement field counter
        });
        
        
        $(wrapper).on('change', '.client_cat', function(e) { //Once remove button is clicked
            var ccat = $(this).val(); //Remove field html
            //Decrement field counter
            $('.company-selectbox').empty();
            $('.progress').show();           
            $.ajax({
            method: 'POST', 
            url: '{{url("/client/getcompany")}}', 
            data: {
             "_token": "{{ csrf_token() }}",
             "category_id" : ccat
            }, 
            success: function(res){ // What to do if we succeed
                var result = '<select class="form-control client_cat" required="" name="category[0][category_id]">'
                result += '<option value="" selected="selected">Choose Options</option>'
                $.each( res, function( key, value ) {  
                 result += '<option value="'+key+'">'+value+'</option>'
                });
                 result += '</select>'
                $('.company-selectbox').html(result);
                $('.progress').hide();
            },
            error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
            }
        });
        });
    });
</script>

@endsection


