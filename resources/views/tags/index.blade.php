@extends('layouts.page.master')
@section('title')

    <title>LMA Tags</title>

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
            <li class="breadcrumb-item"><a href="#">Tags</a></li>
            <li class="breadcrumb-item active">Show All</li>
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
                  <div class="card-title"> <h1><i class="fa fa-list"></i> Tag Management</h1>
    
                  </div>
                  <div class="pull-right">
                    <div class="col-xs-12">
                      <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="card-block">
                  <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Date/Time Added</th>
                        <th>Operations</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tags as $tag)
                <tr>

                    <td>
                        {{ $tag->name }}
                    </td>
                    <td>
                        
                        @if($tag->status == 1)
                        Active
                        @else
                        Deactive
                        @endif
                    </td>
                    <td>
                        {{  Carbon\Carbon::parse($tag->created_at)->format('d-m-Y') }}
                    </td>
                    
                    <td>
                    
                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;margin-bottom: 3px;">Edit</a>

                   
                    </td>
                </tr>
                @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- END card -->
              
              <button id="show-modal" class="btn btn-primary btn-cons" data-target="#modalSlideUp" data-toggle="modal" style="margin-bottom: 30px;"><i class="fa fa-plus"></i>
                Add New Tag
              </button>
          





              
            </div>
          </div>
          <!-- END CONTAINER FLUID -->

               <!-- Modal -->
          <div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog ">
              <div class="modal-content-wrapper">
                <div class="modal-content">
                  <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Create New <span class="semi-bold">Tag</span></h5>
                    
                  </div>
                  <div class="modal-body">
                    {{-- <form role="form"> --}}
                     {{ Form::open(array('url' => 'tags')) }}

                        

                      <div class="form-group-attached">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group form-group-default">
                              {{ Form::label('name', 'Tag') }}
                              {{ Form::text('name', '', array('class' => "form-control" ,'required')) }}  
                            </div>
                          </div>
                        </div>
                        
                      </div>
                           <div class="row">
                      <div class="col-md-8">
                        
                      </div>
                      <div class="col-md-4 m-t-10 sm-m-t-10">
                        {{ Form::submit('Add', array('class' => 'btn btn-primary btn-block m-t-5')) }}
                        
                      </div>
                    </div>
                      {{ Form::close() }}

                   
               
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          </div>


    

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


