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







              <div class="col-md-8 col-lg-8">

							<div class="tabs">

								<div class="tab-content">

									<div id="edit" class="tab-pane active">



										<form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
                      {{ method_field($method) }}
											{{ csrf_field() }}

											<h4 class="mb-xlg">แก้ไขหมวดหมู่</h4>

											<fieldset>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ชื่อเว็บไซต์*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="name_website" value="{{ $objs->name_website }}" >
														</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">title เว็บไซต์*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="title_website" value="{{ $objs->title_website }}" >
														</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">รายละเอียด*</label>
													<div class="col-md-8">

                            <textarea class="form-control" name="detail_website"  rows="4" required>{{ $objs->detail_website }}</textarea>
														</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ที่อยู่*</label>
													<div class="col-md-8">
													  <textarea class="form-control" name="address_website"  rows="4" required>{{ $objs->address_website }}</textarea>
														</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">เบอร์ติดต่อ เว็บไซต์*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="tel_website" value="{{ $objs->tel_website }}" >
														</div>
												</div>


                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">อีเมล์ เว็บไซต์*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="email_website" value="{{ $objs->email_website }}" >
														</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">facebook เว็บไซต์*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="facebook_website" value="{{ $objs->facebook_website }}" >
														</div>
												</div>


                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">twitter เว็บไซต์*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="twitter_website" value="{{ $objs->twitter_website }}" >
														</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">line เว็บไซต์*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="line_website" value="{{ $objs->line_website }}" >
														</div>
												</div>



                        @if($objs->image != NULL)
                        <div class="form-group">
								                        <label for="name" class="col-sm-3 control-label">รูปภาพ branner</label>
								                        <div class="col-sm-8">
								                            <img src="{{url('assets/banner/'.$objs->image)}}" class="img-responsive" height="250">
								                        </div>
								                    </div>
                        @endif
                        <p>ขนาดรูป branner 938 x 180 px<p>
                                    <div class="form-group">
              												<label class="col-md-3 control-label">รูปภาพ branner</label>
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
														<button type="submit" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
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
