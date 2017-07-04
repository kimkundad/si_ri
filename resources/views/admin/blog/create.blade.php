@extends('admin.layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="{{URL::asset('assets/text/dist/summernote.css')}}" rel="stylesheet">
@section('admin.content')

<style>
.note-editor.note-frame .note-editing-area .note-editable {
    padding-left: 50px;
    padding-right: 50px;
}
</style>

        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$header}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="dashboard.html">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>{{$header}}</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->

<style>
.fileupload .uneditable-input .fa {
    position: absolute;
    margin-top: 4px;
    /* top: 12px; */
}
</style>

           <div class="row">
              <div class="row">
                <div class="col-xs-1">
                </div>
              <div class="col-xs-10">

            <section class="panel">
              <header class="panel-heading">
                <div class="panel-actions">
                  <a href="#"  class="panel-action panel-action-toggle" data-panel-toggle></a>

                </div>

                <h2 class="panel-title">{{$header}}</h2>
              </header>
              <div class="panel-body">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              <form action="{{$url}}" method="post" enctype="multipart/form-data">
                {{ method_field($method) }}


                <div class="form-group">
                  <label for="exampleInputEmail1">ชื่อ บทความ</label>
                  <input type="text" class="form-control" name="title" placeholder="ใส่หัวข้อบทความ"  value="{{ old('title') }}" required>

                </div>


                <div class="form-group">
                  <label >เลือกประเภท บทความ</label>
                    <select name="blog_type" class="form-control mb-md" required="required">
                      <option>-- เลือกประเภท --</option>

                      <option value="ข่าวสาร">ข่าวสาร</option>
                      <option value="กิจกรรม">กิจกรรม</option>

                    </select>
                </div>




                <div class="form-group">
                  <label for="exampleInputEmail1">รูป บทความ</label>
                  <div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="image">
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">รายละเอียด</label>
                  <textarea class="form-control" name="detail" id="summernote" rows="4" required>{{old('detail')}}</textarea>
                </div>














              <button type="submit" class="btn btn-default pull-right">เพิ่ม บทความ</button>
              <br><br>
            </form>

              </div>
            </section>

              </div>
              <div class="col-xs-1">
              </div>
            </div>
        </div>
</section>
<br><br><br><br><br>


@stop

@section('scripts')

<script src="{{URL::asset('assets/text/dist/summernote.js?v2')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  $('#summernote').summernote({

    fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
    disableDragAndDrop: true,
    height: 650,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote

  });
});
var postForm = function() {
var content = $('textarea[name="detail"]').html($('#summernote').code());
}
</script>


@stop('scripts')
