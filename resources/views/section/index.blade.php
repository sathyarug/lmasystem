@extends('layouts.page.master')
@section('title')

	<title>LMA Publication Sections</title>

@endsection

@section('css')

	

@endsection


@section('breadcrumbs')

	<ol class="breadcrumb breadcrumb-alt">
        <li class="breadcrumb-item"><a href="#">Publication</a></li>
         <li class="breadcrumb-item"><a href="#">Section</a></li>
        <li class="breadcrumb-item active">Show All</li>
        
    </ol>


@endsection

@section('content')

 <!-- START CONTAINER FLUID -->
          <div class=" no-padding    container-fixed-lg bg-white">
            <div class="container">
              <!-- START card -->
              <div class="card card-transparent">
                <div class="card-header ">
                  <div class="card-title"> <h1><i class="fa fa-list"></i> {{ $publication->name }}</h1>
    
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
                    <th>Section Name</th>
                    <th>Status</th>
                    <th>Date/Time Added</th>
                    <th>Publication</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($sections as $section)
                <tr>

                    <td>{{ $section->name }}</td>
                    <td>
                        {{-- {{ $subcategory->sub_category_status }} --}}
                        @if($section->section_status == 1)
                        Active
                        @else
                        Deactive
                        @endif

                    </td>
                    <td>{{  Carbon\Carbon::parse($section->created_at)->format('d-m-Y') }}</td>
                    <td>{{  $section->publication->name }}
                    </td> 
                    <td>
                    
                    <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;margin-bottom: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['sections.destroy', $section->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
                  </table>
                </div>
              </div>
              <!-- END card -->
              {{-- <div class="col-xs-12">
                <a href="{{ route('categories.create') }}" class="btn btn-success" style="margin-top: 15px;margin-bottom: 15px;">Add Category</a>
              </div> --}}
             {{--  <button id="show-modal" class="btn btn-primary btn-cons" data-target="#modalSlideUp" data-toggle="modal" style="margin-bottom: 30px;"><i class="fa fa-plus"></i>
                Add New Category
              </button>
           --}}
                <a href="{{ route('sections.add', $publication->id) }}" class="btn btn-primary" style="margin-bottom: 40px;">Add Section</a>

               {{--  <button 
                id="show-modal" 
                class="btn btn-primary btn-cons" 
                data-target="#modalSlideUpAdd" 
                data-toggle="modal" 
                data-id="{{ $category->id }}"
                data-title="{{ $category->name }}"
                style="margin-bottom: 30px;">
                <i class="fa fa-plus"></i>
                Add Sub Category
              </button>
 --}}




              
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


