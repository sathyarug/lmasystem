@extends('layouts.page.master')
@section('title')

<title>LMA Show Publication Uploads</title>

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
            <li class="breadcrumb-item"><a href="#">Publications Uploads</a></li>
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
                <div class="card-title"> <h1><i class="fa fa-bullseye"></i> Publication Uploads</h1>
<a href="{{route('pending.article')}}" class="btn btn-info pull-left" style="margin-right: 3px;margin-bottom: 3px;">Pending</a>
<a href="{{route('processed.article')}}" class="btn btn-info pull-left" style="margin-right: 3px;margin-bottom: 3px;">Processed</a>
<a href="{{route('approved.article')}}" class="btn btn-info pull-left" style="margin-right: 3px;margin-bottom: 3px;">Approved</a>
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
                            <th>Date/Time Added</th>
                            <th>Section</th>
                            <th>Status</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($publicationup as $publication)
                        <tr>
                            <td>
                                {{ $publication->publication->name }}
                            </td>
                           
                            <td>
                                {{  $publication->published_date }}
                            </td>
                            <td>
                                {{  $publication->sections}}
                            </td> 
                             <td>
                                @if($publication->status == 0)
                                Open
                                @elseif($publication->status == 1)
                                Locked
                                @elseif($publication->status == 2)
                                Processed
                                @endif
                            </td>
                            <td>   
                                 @if($publication->status == 0)
                                  <a href="{{ url('article/publication') }}/{{$publication->id}}" class="btn btn-info pull-left" style="margin-right: 3px;margin-bottom: 3px;">Open</a>
                                @elseif($publication->status == 1)
                                Locked
                                @elseif($publication->status == 2)
                                  <a href="{{ route('showarticle',$publication->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;margin-bottom: 3px;">Approve</a>                                                        
                                @endif                            
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


