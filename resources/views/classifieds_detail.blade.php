@extends('layouts.template')

@section('title')
{{$objs->subject}}
@stop

@section('description')
{!! strip_tags(str_limit($objs->detail, 150)) !!}
@stop

@section('ogtags')
    @include('layouts.og_tags', ['title' => $objs->subject , 'description' => strip_tags(str_limit($objs->detail, 150)),
    'image' => url('assets/blog/'.$objs->image) ])
@stop


@section('stylesheet')

@stop('stylesheet')

@section('content')


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
.img_list {
    overflow: hidden;
    min-height: 70px;
    text-align: center;
    position: relative;
}
ol, ul, li {
    list-style: none;
    -webkit-padding-start: 0px;
}
.img_list img {
    width: auto;
    height: 70px;
    position: absolute;
    left: -10%;
}
.text-content{
  padding-right: 1px;
    padding-left: 1px;
}
.list-blog{
  list-style: none;
  margin-bottom: 10px;
      border-bottom: 1px dashed #dff0d8;
}
.rowss{
  margin-right: -15px;
margin-left: -15px;
}
.text-content a{
  text-decoration: none;
  color: #666;
}
.text-content a:hover{

  color: #00c402;
}
.detail img {
  width: 100%;
}
</style>
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

<br>
 <div class="container" style="margin-bottom:65px;">
     <div class="row">




         <div class="col-md-12" >


           <div class="row">
           <div class="col-md-8" >
             <h3>{{$objs->subject}} </h3>

             <hr>
             <img src="{{url('assets/blog/'.$objs->image)}}" class="img-responsive">
             <div class="descript" style="margin-top: 10px;border-bottom: 1px dashed #dff0d8; padding-bottom: 5px; font-size: 14px;">
               <span><i class="fa fa-folder-o "></i> {{$objs->email}} <i class="fa fa-caret-right"></i> <i class="fa fa-user"></i> admin <i class="fa fa-caret-right"></i> <i class="fa fa-clock-o"></i>
               <?php echo DateThai($objs->created_at); ?></span>
             </div>
             <br>
             <div class="detail">
               {!! $objs->detail !!}
             </div>

           </div>

           <div class="col-md-4" >
             <h3>Sirispace New update </h3>

             <hr>
             <a target="_blank" href="https://www.jbhired.com/"><img src="{{url('assets/image/Screen-Shots-JBmonster.png')}}" class="img-responsive"></a>
             <br>

             <ul style="margin: 0; padding: 0;">

            @foreach($home_list as $uu)
             <li class="list-blog">
                <div class="row" style="margin-right: -1px;     margin-left: -1px;">
             <div class="col-md-4">
               <div class="img_list">
                 <a href="{{url('News/'.$uu->id)}}">
               <img src="{{url('assets/blog/'.$uu->image)}}" class="img-responsive">
             </a>
              </div>
             </div>
             <div class="col-md-8 text-content">
               <a href="{{url('News/'.$uu->id)}}"><?=mb_strimwidth($uu->subject, 0, 65, '...');?> </a><br><span style="font-size:11px;"> <i class="fa fa-clock-o"></i>
             <?php echo DateThai($uu->created_at); ?></span></div>
           </div>
             </li>
             @endforeach





           </ul>


           <style>
           .article-tags {
                margin-bottom: 24px;
                font-size: 14px;
                line-height: 19px;
                font-weight: 400;
                text-transform: capitalize;
            }
            .article-tags a {
                white-space: nowrap;
                line-height: 36px!important;
                padding: 5px 10px;
                margin-right: 12px;
                border-radius: 3px;
                -moz-border-radius: 3px;
                -webkit-border-radius: 3px;
                -o-border-radius: 3px;
                -ms-border-radius: 3px;
                color: #666!important;
                font-size: 13px;
                font-weight: 400;
                background-color: #f1f1f1;
            }
           </style>


           <div class="article-tags">
															<a href="/topic/tech-startups" title="Tech Startups" data-id="related-tagname0">Tech Startups</a>
																				<a href="/topic/news-and-trends" title="News and Trends" data-id="related-tagname1">News and Trends</a>
																				<a href="/topic/hiring-employees" title="Hiring Employees" data-id="related-tagname2">Hiring Employees</a>
																				<a href="/topic/h-1b-visas" title="H-1B Visas" data-id="related-tagname3">H-1B Visas</a>
																				<a href="/topic/immigrant-entrepreneurs" title="Immigrant Entrepreneurs" data-id="related-tagname4">Immigrant Entrepreneurs</a>
												</div>



           </div>



           </div>

         </div>


     </div>
 </div>

@stop

@section('scripts')

@stop('scripts')
