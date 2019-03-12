@extends('admin.layouts.template')
@section('admin.content')






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

                @if(isset($cat_bts))
                  @foreach($cat_bts as $j)
                <div class="col-md-12 col-lg-4 col-xl-4">
                <section class="panel panel-featured-left panel-featured-primary" style="    border-color: {{$j->color}}">
                  <div class="panel-body">
                    <div class="widget-summary">
                      <div class="widget-summary-col widget-summary-col-icon">

                        <div class="summary-icon bg-primary" style="background: {{$j->color}}">

                          <i class="fa fa-train"></i>
                        </div>
                      </div>
                      <div class="widget-summary-col">
                        <div class="summary">
                          <h4 class="title" style="font-size: 1.4rem;">{{$j->cat_bts_name}}</h4>
                          <div class="info">
                            <strong class="amount">{{$j->option}} <span style="color: #666; font-size: 14px;">สถานี</span></strong>
                            <span class="text-primary"></span>
                          </div>
                        </div>
                        <div class="summary-footer">

                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
                @endforeach
              @endif





              <div class="col-xs-12">

            <section class="panel">

              <div class="panel-body">



                <div class="col-md-12 " style="padding-left: 1px;">

                  <a class="btn btn-primary " href="{{url('admin/bts/create')}}" >
                      <i class="fa fa-plus"></i> เพิ่มสถานีรถไฟฟ้า</a>
                </div>
                <br />
                <br />

<style>
.notifications-icon {
    background: #FFF;
    border-radius: 50%;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.3);
    display: inline-block;
    height: 30px;
    position: relative;
    width: 30px;
    text-align: center;
}
.notifications-icon i {
    color: #fff;
    line-height: 30px;
    vertical-align: middle;
}
</style>



                <table class="table table-bordered table-striped mb-none dataTable " id="datatable-default">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>หมวดหมู่</th>
                      <th>สถานี</th>
                      <th>จำนวนโครงการ</th>


                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($objs)
                @foreach($objs as $u)
                    <tr>
                      <td><a href="#" class="notifications-icon" style="background: {{$u->color}}" >
            								<i class="fa fa-train"></i>
            							</a>
              </td>
                      <td>{{$u->cat_bts_name}}</td>
                      <td>{{$u->name_bts_en}}</td>
                      <td>{{$u->option}}</td>



                      <td>
                        <a style="float:left; margin-right:8px;" title="ดูข้อมูล" class="btn btn-primary btn-xs" href="{{url('admin/bts/'.$u->ids.'/edit')}}" role="button"><i class="fa fa-cog "></i> </a>
                        <form  action="{{url('admin/bts/'.$u->ids)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
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

                <br />
                <br /><br />

                <div class="row">
                  <div class="col-md-3">
                    <img src="{{url('assets/image/bts/1.jpg')}}" class="img-responsive" style="max-height:155px;" />
                  </div>
                  <br />
                  <div class="col-md-3">
                    <img src="{{url('assets/image/bts/2.jpg')}}" class="img-responsive" style="max-height:155px;"/>
                  </div>
                  <br />
                  <div class="col-md-3">
                    <img src="{{url('assets/image/bts/3.jpg')}}" class="img-responsive" style="max-height:155px;"/>
                  </div>
                  <br />
                  <div class="col-md-3">
                    <img src="{{url('assets/image/bts/4.jpg')}}" class="img-responsive" style="max-height:155px;"/>
                  </div>
                  <br />
                  <div class="col-md-3">
                    <img src="{{url('assets/image/bts/5.jpg')}}" class="img-responsive" style="max-height:155px;"/>
                  </div>
                  <br />
                  <div class="col-md-3">
                    <img src="{{url('assets/image/bts/6.jpg')}}" class="img-responsive" style="max-height:155px;"/>
                  </div>
                  <br />
                  <div class="col-md-3">
                    <img src="{{url('assets/image/bts/7.jpg')}}" class="img-responsive" style="max-height:155px;"/>
                  </div><br />
                  <div class="col-md-3">
                    <img src="{{url('assets/image/bts/8.jpg')}}" class="img-responsive" style="max-height:155px;"/>
                  </div><br />
                  <div class="col-md-3">
                    <img src="{{url('assets/image/bts/9.jpg')}}" class="img-responsive" style="max-height:155px;"/>
                  </div><br />
                  <div class="col-md-3">
                    <img src="{{url('assets/image/bts/10.jpg')}}" class="img-responsive" style="max-height:155px;"/>
                  </div><br />
                  <div class="col-md-3">
                    <img src="{{url('assets/image/bts/11.jpg')}}" class="img-responsive" style="max-height:155px;"/>
                  </div><br />
                  <div class="col-md-3">
                    <img src="{{url('assets/image/bts/12.jpg')}}" class="img-responsive" style="max-height:155px;"/>
                  </div><br />
                </div>

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

@if ($message = Session::get('add_success'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif

@if ($message = Session::get('edit_success'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการแก้ไขข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif



@if ($message = Session::get('delete'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการลบข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif

@stop('scripts')
