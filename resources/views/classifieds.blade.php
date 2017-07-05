@extends('layouts.template')
@section('stylesheet')

@stop('stylesheet')

@section('content')
<?php
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}
 ?>

<style>
@media (min-width: 1200px)
{
  #search_container {
      margin-bottom: 22px;
  }
  .container {
      width: 970px;
  }
  .t_v_midden{
    border-right: 1px solid #e0e0e0;
  }

  .col-md-4{
    margin-bottom: 15px;
    padding-right: 8px; padding-left: 8px;
  }
  .thumbnail {
      margin-bottom: 0px;
    }
    .g_l_box {
        /* top: 20px; */
        left: 5px;
    }

}
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
.block-box-content {
    overflow: hidden;
    height: 100%;
}
.block-box-content>a:first-child {
    font-size: 15px;
    font-weight: bold;
    display: block;
    margin-bottom: 10px;
    color: #2f3c4e;
}
.block-box-content>a:hover {
    font-size: 15px;
    font-weight: bold;
    display: block;
    margin-bottom: 10px;
    color: #038206;
}
.block-box-content span {
    float: left;
    margin-right: 30px;
    display: inline-block;
    margin-bottom: 8px;
    font-size: 12px;
    text-transform: uppercase;
}
.block-box-content p{
  margin-bottom: 0;
  margin: 0 0 20px 0;
line-height: 22px;
font-size: 13px;
color: #6d7683;
}
ol, ul, li {
    list-style: inside;
        -webkit-padding-start: 0px;
}
.block-recent-1 li {
    float: left;
    width: 100%;
}
.block-box-1 li {
    list-style: none;
    float: right;

    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #ecedee;
    clear: right;
}
</style>

<br>
 <div class="container" >
     <div class="row">




         <div class="col-md-12" >

           <h3>News </h3>
           <p>The Latest Real Estate News from all over Thailand.</p>
           <hr>

           <div class="row">
           <div class="col-md-12" >






@foreach($objs as $u)
             <div class="col-md-4">
             <div class="thumbnail a_sd_move">
               <div style="min-height: 155px; overflow: hidden; position: relative;">
               <a href="{{url('News/'.$u->id)}}" >
               <img src="{{url('assets/blog/'.$u->image)}}" >
               </a>
             </div>
               <div class="caption" style="padding: 3px;">
                 <div class="descript bold" style="height: 34px;border-bottom: 1px dashed #dff0d8; margin-bottom:3px;">
                     <a href="{{url('News/'.$u->id)}}"><?=mb_strimwidth($u->subject, 0, 80, '...');?></a>
                 </div>
                 <div class="descript" style="margin-top: 5px;border-bottom: 1px dashed #dff0d8; padding-bottom: 3px; font-size: 12px;">
                   <span><i class="fa fa-folder-o "></i> {{$u->email}} <i class="fa fa-caret-right"></i> <i class="fa fa-user"></i> admin <i class="fa fa-caret-right"></i> <i class="fa fa-clock-o"></i>
                   <?php echo DateThai($u->created_at); ?></span>
                 </div>
                 <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px; height: 76px;">
                   <?=mb_substr(strip_tags($u->detail),0,200,'UTF-8')?>...
                 </div>
               </div>
             </div>
             </div>
 @endforeach








<div class="text-center">
     {{ $objs->links() }}
     </div>
           </div>

















           </div>

         </div>


     </div>
 </div>

@stop

@section('scripts')

@stop('scripts')
