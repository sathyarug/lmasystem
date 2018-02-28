@extends('layouts.page.master')
@section('title')

	<title>LMA Client category</title>

@endsection

@section('css')

	

@endsection


@section('breadcrumbs')
<div class="bg-white">
    <div class="container">
    	<ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item"><a href="#">Client category</a></li>
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
                      <div class="card-block field_wrapper">
                          {!! Form::open(['method'=>'POST','action'=>'ClientCategoryController@store','files'=>true]) !!}            
                         <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                   {!! Form::label('category_id','Select Category') !!}
                                    {!! Form::select('category_id',[''=>'Choose Options'] + $categories, null,['class'=>'form-control client_cat','required'=>'','data-id' => 0]) !!}
                           {!! Form::hidden('client_id',$id,array('class' => "form-control" ,'required')) !!}
                          </div>
                        </div>
                        <br>
                        <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('company_id') ? ' has-error' : '' }}">
                          {!! Form::label('company_id','Select Company') !!}
                                        <div class="progress">
                                        <div style="display: block;" class="progress-bar-indeterminate"></div>
                                        </div>
                                        <div class="company-selectbox">
                                            {!! Form::select('company_id',[''=>'Choose Options'], null,['class'=>'form-control client_cat','required'=>'','data-id' => 0]) !!}
                                        </div> 
                          </div>
                        </div>    
                         <p class="m-t-10">Status</p>

                        <div class="radio radio-success required{{ $errors->has('status') ? ' has-error' : '' }}">
                            <input type="radio" checked="checked" value="1" name="status" id="daily">
                            <label for="daily">Yes</label>
                            <input type="radio" value="0" name="status" id="weekly">
                            <label for="weekly">No</label>
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
<script type="text/javascript">
    $(document).ready(function() {
      var wrapper = $('.field_wrapper'); //Input field wrapper
        
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
                var result = '<select class="form-control" required="" name="company_id">'
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