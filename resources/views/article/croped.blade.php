@extends('layouts.page.master')
@section('title')

<title>LMA Add Publication</title>
<?php
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
?>
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
                                <img crossorigin="anonymous" data-txt="<?php echo $text ?>" src="<?php echo $_POST['image'] ?>" class="images" data-polyclip="<?php echo implode(",", $value) ?>"  />  
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
<script src="{{asset('js/jqueryajax-cross-origin.min.js')}}"></script>
<script src="{{ asset('js/polyclip-p.js')}}" data-polyclip-clippreference="SVG" data-polyclip-forcepointerevents='true'></script>

<script>
setTimeout(
        function()
        {  



           var img = new Image,
     canvas = document.createElement("polyClip0");
    var ctx = canvas.getContext("2d");
    var src = "https://s3-ap-southeast-1.amazonaws.com/inclusivemediamonitoring/publication/2017/11/07/1510039000logo1.png"; // insert image url here

img.crossOrigin = "Anonymous";

img.onload = function() {
    canvas.width = img.width;
    canvas.height = img.height;
    ctx.drawImage( img, 0, 0 );
    localStorage.setItem( "savedImageData", canvas.toDataURL("image/png") );
}
img.src = src;
// make sure the load event fires for cached images too
if ( img.complete || img.complete === undefined ) {
    img.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
    img.src = src;
}
   alert(img.src); 


            $('.allarticle').val(imgarray)              
            var imgarray = [];
            $('.polyClip-clipped').each(function(i, obj) {
              
              
              
              
              
              
                var dataURL = this.toDataURL();
                imgarray.push(dataURL);
                alert(dataURL);
            });
            $('.allarticle').val(imgarray)
            
            
        }, 1000);
</script>
@endsection


