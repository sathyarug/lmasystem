@extends('layouts.page.master')
@section('title')

	<title>LMA Show User publications</title>

@endsection

@section('css')
<link href="assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="pages/css/themes/modern.css" rel="stylesheet" type="text/css" />

	

@endsection


@section('breadcrumbs')
<div class="bg-white">
    <div class="container">
        <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active">Publications</li>
        </ol>
              
    </div>
</div>


	


@endsection

@section('content')




 <!-- START CONTAINER FLUID -->
          <div class=" no-padding    container-fixed-lg bg-white">
            <div class="container">
              <!-- START card -->
              <div class="card card-transparent">
                <div class="card-header ">
                  <div class="card-title"> <h1><i class="fa fa-bullseye"></i> User Publications </h1>
    
                  </div>
                  <div class="card-block">

                      {!! Form::open(['method'=>'POST','action'=>'UserPublicationAssignController@store']) !!}
                       
                        
                        {!! Form::hidden('user_id', $user->id, []) !!}
                         <div class="form-group-attached">
                          <div class="form-group form-group-default required{{ $errors->has('publication_id') ? ' has-error' : '' }}">
                            {!! Form::label('publication_id','Publication') !!}
                            
                            {!! Form::select('publication_id',[''=>'Choose Options'] + $publications, null,['class'=>'form-control','required']) !!}
                          </div>
                         
                        </div>
                        <br>
                        <p class="m-t-10">Upload</p>
          
                       <div class="radio radio-success required{{ $errors->has('upload_status') ? ' has-error' : '' }}">
                          <input type="radio"  value="1" name="upload_status" id="enable">
                          <label for="enable">Enable</label>
                          <input type="radio" checked="checked" value="0" name="upload_status" id="disable">
                          <label for="disable">Disable</label>
                      </div>

   
                         <br>
                         <p class="m-t-10">Visibility</p>
          
                       <div class="radio radio-success required{{ $errors->has('tag_status') ? ' has-error' : '' }}">
                          <input type="radio"  value="1" name="tag_status" id="enable1">
                          <label for="enable1">Enable</label>
                          <input type="radio" checked="checked" value="0" name="tag_status" id="disable1">
                          <label for="disable1">Disable</label>
                      </div>
                      <br>
                        {{-- <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-default"><i class="pg-close"></i> Clear</button> --}}
                         {{Form::button('<i class="pg-plus"></i>'.' Add', array('type' => 'Add', 'class' => 'btn btn-primary'))}}
                        
                        
               {{ Form::close() }}


                  </div>
                  <div class="pull-right">
                    <div class="col-xs-12">
                      <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                    </div>
                  </div>
                  {{-- <div class="clearfix"></div> --}}
                </div>
                <div class="card-block">
                  <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                    <thead>
                      <tr>
                        <th>User Name</th>
                        <th>Publication Name</th>
                        <th>Upload Status</th>
                        <th>Tag Status</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($user->publications as $userpublication)
                <tr>

                    <td>
                        {{ $user->name }}
                        
                    </td>
                   <td>
                       {{  $userpublication->name}}
                    </td> 
                    <td>
                    
                        <a href="#" class="btn btn-primary pull-left" style="margin-right: 3px;margin-bottom: 3px;">
                        @if($userpublication->pivot->upload_status == 1)
                        Active
                        @else
                        Deactive
                        @endif
                        
                   {{-- <a href="{{ route('user.publication.list', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;margin-bottom: 3px;">Publications</a>
 --}}
                    </td>
                    <td>

                        <a href="#" class="btn btn-primary pull-left" style="margin-right: 3px;margin-bottom: 3px;">
                        @if($userpublication->pivot->tag_status == 1)
                        Active
                        @else
                        Deactive
                        @endif
                       
                     
                      
                    </td>
                    <td> 
                      {{-- {{$userpublication->id}}

                      {!! Form::open(['method' => 'POST', 'route' => ['user.publication.remove', $user->id,$userpublication->id] ]) !!}
                      {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!} --}}
                      <a href="{{ route('user.publication.remove', [$user->id,$userpublication->id]) }}" class="btn btn-danger pull-left" style="margin-right: 3px;margin-bottom: 3px;">Remove</a>
        
                    </td>
                </tr>
                @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- END card -->

            </div>
          </div>
          <!-- END CONTAINER FLUID -->

               <!-- Modal -->
          


	

@endsection

@section('js')

<script type="text/javascript" src="{{ asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/classie/classie.js')}}"></script>
<script src="{{ asset('assets/plugins/switchery/js/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/datatables-responsive/js/datatables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/datatables-responsive/js/lodash.min.js')}}"></script>

<script src="{{ asset('pages/js/pages.min.js')}}"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/tables.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts.js')}}" type="text/javascript"></script>

	

@endsection


