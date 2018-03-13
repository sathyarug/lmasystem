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
            <li class="breadcrumb-item active">show</li>
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
                <a href="{{ route('original.article',$id) }}" class="btn btn-primary btn-cons" target="_blank" style="margin-bottom: 30px;margin-top: 50px;"><i class=""></i>
                                Show original publication
                            </a>
                <div class="card card-transparent">
                    <div class="card-block">
                        <div class="clipParent">
                            @foreach($data as $dt)
                            <img  src="{{Storage::disk('s3')->url($dt->photo->first()->file)}}" class="images" />  
                            <br>
                            @endforeach 
                        </div>
                        <form action="{{ route('article.update',$id) }}" method="post">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <input type="hidden" id="annotationsJSON" name="publication_id" value="{{$id}}" />
                             @if($publication->status == 2)
                            <button type="submit" id="show-modal" class="btn btn-primary btn-cons" style="margin-bottom: 30px;margin-top: 50px;"><i class=""></i>
                                Approve Article
                            </button>
                             @endif 
                        </form>
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
<script src="{{ asset('js/polyclip-p.js')}}" data-polyclip-clippreference="SVG" data-polyclip-forcepointerevents='true'></script>

<script>
setTimeout(
        function()
        {  

            $('.allarticle').val(imgarray)              
            var imgarray = [];
            $('.polyClip-clipped').each(function(i, obj) {             
                var dataURL = this.toDataURL();
                imgarray.push(dataURL);
            });
            $('.allarticle').val(imgarray)
        }, 1000);
</script>
@endsection


