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
<style>
.ap-questions-featured {
    margin-left: 3px;
    border: medium none;
    color: #ff951e;
    display: inline;
    font-size: 16px;
    height: auto;
    margin-right: 5px;

    position: static;
    vertical-align: baseline;
    width: auto;
}
.ap-questions-featured2 {
    margin-left: 3px;
    border: medium none;
    color: #666;
    display: inline;
    font-size: 16px;
    height: auto;
    margin-right: 5px;

    position: static;
    vertical-align: baseline;
    width: auto;
}
</style>

                <table class="table table-striped" >
                  <thead>
                    <tr>

                      <th>ชื่อผู้ส่ง</th>
                      <th>อีเมล์</th>
                      <th>เบอร์โทร</th>
                      <th>วันที่เพิ่ม</th>


                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($objs)
                @foreach($objs as $u)
                    <tr>

                      <td>
                        @if($u->status == null || $u->status == 0)
                        <i class="fa fa-star ap-questions-featured"></i>
                        @else
                        <i class="fa fa-star ap-questions-featured2"></i>
                        @endif

                        @if($u->type_contact == 2)
                        <i class="fa fa-paper-plane "></i>
                        @else

                        @endif


                         {{$u->name}}</td>
                      <td>{{$u->email}}</td>
                      <td>{{$u->phone}}</td>
                      <td><?php echo DateThai($u->created_at); ?></td>



                      <td>
                        <a style="float:left; margin-right:8px;" title="แก้ไขบทความ" class="btn btn-primary btn-xs" href="{{url('admin/envelope/'.$u->id.'/edit')}}" role="button"><i class="fa fa-cog "></i> </a>

                          <form  action="{{url('admin/envelope/'.$u->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                            <input type="hidden" name="_method" value="DELETE">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" title="ลบบทความ" class="btn btn-danger btn-xs"><i class="fa fa-times "></i></button>
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



@if ($message = Session::get('delete_envelope'))
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
