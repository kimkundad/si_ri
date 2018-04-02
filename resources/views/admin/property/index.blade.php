@extends('admin.layouts.template')
@section('admin.content')


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



        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$datahead}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('admin/dashboard')}}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>{{$datahead}}</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->



<div class="row">
              <div class="row">
              <div class="col-xs-12">

            <section class="panel">
              <header class="panel-heading">
                <div class="panel-actions">
                  <a href="#"  class="panel-action panel-action-toggle" data-panel-toggle></a>

                </div>

                <h2 class="panel-title">{{$datahead}}</h2>
              </header>
              <div class="panel-body">

                
                <div class="col-md-4 ">
                  <a class="btn btn-primary " href="{{url('admin/property/create')}}" role="button">
                      <i class="fa fa-plus"></i> เพิ่มอสังหาใหม่</a>
                </div>


                <div class="col-md-8 ">

                     <div class="form-group ">
                       <label class="col-md-4 control-label"></label>
                       <div class="col-md-8">
                         <form class="form-horizontal" action="{{url('admin/searchproperty')}}" method="GET" enctype="multipart/form-data">
                           {{ csrf_field() }}

                         <div class="input-group input-search">
                           <input type="text" class="form-control" name="q" id="q" placeholder="Search..." required>
                           <span class="input-group-btn">
                             <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                           </span>
                         </div>

                       </form>
                       </div>
                     </div>
                   </div>
                   <br><br>
                <table class="table table-striped" >

                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ชื่ออสังหา</th>
                      <th>หมวดหมู่</th>
                      <th>ยอมชม</th>
                      <th>วันที่เพิ่ม</th>


                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($objs)
                @foreach($objs as $u)
                    <tr>
                      <td>{{$u->id_p}}</td>
                      <td>{{$u->name_p}}</td>
                      <td>{{$u->name_c}}</td>
                      <td>{{$u->view}}</td>
                      <td><?php echo DateThai($u->created_atss); ?></td>



                      <td>
                        <a style="float:left; margin-right:8px;" title="แก้ไขหมวดหมู่" class="btn btn-primary btn-xs" href="{{url('admin/property/'.$u->id_p.'/edit')}}" role="button"><i class="fa fa-cog "></i> </a>

                          <form  action="{{url('admin/property/'.$u->id_p)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                            <input type="hidden" name="_method" value="DELETE">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" title="ลบหมวดหมู่" class="btn btn-danger btn-xs"><i class="fa fa-times "></i></button>
                          </form>

                      </td>


                      </tr>
                       @endforeach
              @endif

                  </tbody>
                </table>
                <div class="pagination"> {{$objs->links()}} </div>
              </div>
            </section>

              </div>
            </div>
        </div>
</section>
@stop



@section('scripts')

<script>

</script>



@if ($message = Session::get('success'))
<script type="text/javascript">
PNotify.prototype.options.styling = "fontawesome";
new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success'
    });
</script>
@endif


@if ($message = Session::get('del_product'))
<script type="text/javascript">
PNotify.prototype.options.styling = "fontawesome";
new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success'
    });
</script>
@endif

@if ($message = Session::get('delete'))
<script type="text/javascript">
PNotify.prototype.options.styling = "fontawesome";
new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success'
    });
</script>
@endif


@stop('scripts')
