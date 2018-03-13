@extends('layouts.page.master')
@section('title')

<title>LMA Add Publication</title>
@endsection
@section('css')
<link rel="stylesheet" href="//cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.css">	
@endsection


@section('breadcrumbs')
<div class="bg-white">
    <div class="container">
        <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item"><a href="#">Article</a></li>
            <li class="breadcrumb-item active">Original Article</li>
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
                <div class="card card-transparent">
                    <div class="card-block">
                        <div class="clipParent">
                            <img  src="{{$url}}" class="images" />  
                            <br>
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
@endsection


