@extends('layouts.template')
@section('stylesheet')
<link href="{{url('assets/css/select-project.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/css/confirm.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/bootstrap-sweetalert-master/dist/sweetalert.css')}}" rel="stylesheet" type="text/css" />
@stop('stylesheet')
@section('content')

<style>
.text-green{
      color: #038206;
}
h2 span, h3 span, h4 span, h5 span, h6 span {
    color: #038206;
}
ul.list_order {
    margin: 0 0 30px;
    padding: 0;
    line-height: 30px;
    font-size: 14px;
}
ul.list_order li {
    position: relative;
    padding-left: 40px;
    margin-bottom: 10px;
}
ul.list_order li span {
    background-color: #038206;
    color: #fff;
    position: absolute;
    left: 0;
    top: 0;
    text-align: center;
    font-size: 18px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    line-height: 30px;
}
 ul.list_order {
    list-style: none;
}
.conn{

  color: #888;
}
i{
  color: #038206;
}
.text-muted {
    color: #3c763d;
}
</style>
<div class="container" >
    <div class="row">




        <div class="col-md-12" style="margin-top:180px; margin-bottom:180px;">

          <hr>
          <div class="col-md-12">
            <h3 class="text-center">ข้อความของคุณ ถูกส่งไปยัง Sirispace เรียบร้อยแล้ว</h3>
          </div>
        </div>


    </div>
</div>
@endsection

@section('scripts')
<script src="{{url('assets/bootstrap-sweetalert-master/dist/sweetalert.js')}}"></script>

<script>

    swal("ส่งข้อความสำเร็จ!", "ข้อความถูกส่งไปยังครูพี่โฮมเรียบร้อยแล้ว!", "success")
    setTimeout(function () {
       window.location.href = "{{url('/')}}"; //will redirect to your blog page (an ex: blog.html)
    }, 3000);
  </script>
@stop('scripts')
