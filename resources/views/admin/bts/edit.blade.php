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




                        <div class="col-md-8 col-lg-8 col-md-offset-2" >

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

          											<h4 class="mb-xlg">แก้ไขสถานีรถไฟฟ้า</h4>

          											<fieldset>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เลือกหมวดหมู่*</label>
          													<div class="col-md-8">

                                      <select  name="category_id"  class="form-control " required="">
                                              <option value="">-- เลือกสถานีรถไฟฟ้าหลัก --</option>
                                              @if(isset($objs))
                                              @foreach($objs as $u)
                                                  <option value="{{$u->id}}"  @if($bts->cat_bts_id == $u->id)
                                    selected='selected'
                                    @endif
                                    >{{$u->cat_bts_name}}</option>
                                              @endforeach
                                            @endif

                                      </select>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อภานีรถไฟฟ้า*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name" value="{{ $bts->name_bts_en }}">
          														</div>
          												</div>



                                  <br>





          											</fieldset>







          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          														<button type="reset" class="btn btn-default">ยกเลิก</button>
          													</div>
          												</div>
          											</div>

          										</form>

          									</div>
          								</div>
          							</div>
          						</div>





                      <div class="col-md-12" >

                      <div class="tabs">

                        <div class="tab-content">

                          <div id="edit" class="tab-pane active">

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
                                @if($get_home)
                            @foreach($get_home as $u)
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
                            <div class="pagination"> {{$get_home->links()}} </div>


                          </div>
                        </div>
                      </div>
                    </div>









          						</div>




</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>


@if ($message = Session::get('success'))
<script type="text/javascript">
var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
var notice = new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success',
      addclass: 'stack-bar-top',
      stack: stack_bar_top,
      width: "100%"
    });
</script>
@endif


@if ($message = Session::get('delete'))
<script type="text/javascript">
var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
var notice = new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success',
      addclass: 'stack-bar-top',
      stack: stack_bar_top,
      width: "100%"
    });
</script>
@endif

@stop('scripts')
