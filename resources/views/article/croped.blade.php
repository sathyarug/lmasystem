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
<?php
$codi = json_decode($_POST['annotationsJSON']);
echo '<pre>';
$codi = json_decode(json_encode($codi), true);
//  var_dump($codi);
$data[] = array();
$datax[] = array();
$datay[] = array();
foreach ($codi as $ky => $value) {
    foreach ($value['path'] as $val) {
        $datax[$ky][] = $val['x'];
        $datay[$ky][] = $val['y'];
        $data[$ky][] = $val['x'];
        $data[$ky][] = $val['y'];
        $data[$ky]['text'] = $value['text'];
    }
//      var_dump(max($datax[$ky])); 
//      var_dump(min($datay[$ky])); 
//      var_dump(max($datay[$ky])); 
    echo '<br>';
}
echo '</pre>';
?>
<!-- START CONTAINER FLUID -->
<div class=" no-padding    container-fixed-lg bg-white">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <!-- START card -->
                <div class="card card-transparent">
                    <div class="card-block">

                        <div class="clipParent">
                            <?php
                            foreach ($data as $value) {
                                $text = $value['text'];
                                unset($value['text']);
                                ?>
                            <div class="parentdiv" data-tit="<?php echo $text ?>" data-desc="<?php echo $text ?>">
                              <img crossOrigin="Anonymous"  src="<?php echo $_POST['image'] ?>" class="images" data-polyclip="<?php echo implode(",", $value) ?>"  />                                    
                            </div>
                                <?php
                                echo '<br>';
                            }
                            ?>
                        </div>
                        <form enctype="multipart/form-data"  action="{{ url('/article') }}" method="post">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <input name="publication_upload_id" type="hidden" value="<?php echo $_POST['publication_upload_id'] ?>"/>
                            <input name="allarticle" type="hidden" class="allarticle" value=""/>
                            <button type="submit" id="show-modal" class="btn btn-primary btn-cons" style="margin-bottom: 30px;"><i class=""></i>
                                Upload
                            </button>
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
                var cordinates = $(this).attr('data-polyclip');
                var title=$(this).parent('.parentdiv').attr('data-tit');
                var desc=$(this).parent('.parentdiv').attr('data-desc');
                var dataURL = this.toDataURL();
                imgarray.push({title:title, image:dataURL, cordinates:cordinates});
            });
            $('.allarticle').val(JSON.stringify(imgarray));
//            $('.codinates').val(cordinates);
//            $('.txt').val(txt);
        }, 1000);
</script>
@endsection


