@extends('admin.layouts.template')
@section('admin.content')

				<section role="main" class="content-body">

					<header class="page-header">
						<h2>{{$header}}</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="{{url('admin/dashboard')}}">
										<i class="fa fa-home"></i>
									</a>
								</li>

								<li><span>{{$header}}</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>


					<!-- start: page -->




							<div class="row">
							<div class="col-md-2 col-lg-2">




							</div>







              <div class="col-md-10 col-lg-10">

							<div class="tabs">

								<div class="tab-content">

									<div id="edit" class="tab-pane active">

                    @if (count($errors) > 0)
                    <br>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

										<form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
											{{ csrf_field() }}

											<h4 class="mb-xlg">เพิ่ม slideshows</h4>

											<fieldset>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ชื่อรูปภาพ*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="name"  >
														</div>
												</div>


                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ข้อความ 1*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="first_text"  >
														</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ข้อความ 2*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="secend_text"  >
														</div>
												</div>


                        <div class="form-group">
                          <label class="col-md-3 control-label">ICON Image Upload</label>
                          <div class="col-md-9">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="input-append">
                                <div class="uneditable-input">
                                  <i class="fa fa-file fileupload-exists"></i>
                                  <span class="fileupload-preview"></span>
                                </div>
                                <span class="btn btn-default btn-file">
                                  <span class="fileupload-exists">Change</span>
                                  <span class="fileupload-new">Select file</span>
                                  <input type="file" name="icon">
                                </span>
                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                              </div>
                            </div>
                          </div>
                        </div>



                                    <div class="form-group">
              												<label class="col-md-3 control-label">BG Image Upload</label>
              												<div class="col-md-9">
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
              											</div>



											</fieldset>







											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">เพิ่มใหม่</button>
														<button type="reset" class="btn btn-default">ยกเลิก</button>
													</div>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>











						</div>

</section>
@stop


@section('scripts')

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

@stop('scripts')
