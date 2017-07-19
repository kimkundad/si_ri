@extends('admin.layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="{{URL::asset('assets/text/dist/summernote.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/upload_image/css/fileinput.css')}}" rel="stylesheet">

@section('admin.content')

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
                                      {{ method_field($method) }}
                											{{ csrf_field() }}


                <div class="col-md-12">

                <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Owner <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" name="owner" class="form-control" value="{{ $objs->Owner }}" placeholder="Owner" required>
                </div>
                </div>

                <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email address <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" value="{{ $objs->email }}" placeholder="Email" >
                </div>
                </div>

                <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">Phone Number <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" name="tel" value="{{ $objs->tel }}" class="form-control" placeholder="Phone Number" required>
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-3 control-label" for="textareaAutosize">Additional Contact Information</label>
                <div class="col-md-9">
                <textarea class="form-control" name="Additional" placeholder="(Key Location, Local/International Contact if Owner is not in Bangkok, etc.)" rows="3"  data-plugin-textarea-autosize >{{ $objs->Additional }}</textarea>
                </div>
                </div>

                <hr>


                <div class="form-group">
                <label for="category_id" class="col-sm-3 control-label">Category <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <select  name="category_id" id="category_id " class="form-control " required="">
                        <option value="">-- choice category --</option>
                        @if(isset($category))
                        @foreach($category as $u)
                            <option value="{{$u->id}}"
                              @if($objs->id_c == $u->id)
                              selected="selected"
                              @endif
                              >{{$u->name}}</option>
                        @endforeach
                      @endif

                </select>
                </div>
                </div>

                <hr>
                <div class="form-group">
                <label for="category_id" class="col-sm-3 control-label">SIRI RECOMMEND หน้าแรกบน</label>
                <div class="col-sm-9">
                    <select  name="findex" id="findex" class="form-control " required="">

                        <option value="0"
                        @if($objs->first_index == 0)
                        selected="selected"
                        @endif
                        >none</option>
                        <option value="2" @if($objs->first_index == 2)
                        selected="selected"
                        @endif
                        >show</option>

                </select>
                </div>
                </div>

                <div class="form-group">
                <label for="category_id" class="col-sm-3 control-label">RECENT UPDATES</label>
                <div class="col-sm-9">
                    <select  name="hot_property" class="form-control " required="">

                        <option value="0"
                        @if($objs->hot_index == 0)
                        selected="selected"
                        @endif
                        >none</option>
                        <option value="2"
                        @if($objs->hot_index == 2)
                        selected="selected"
                        @endif
                        >show</option>

                </select>
                </div>
                </div>

                <hr>
                <div class="form-group">
                <label for="category_id" class="col-sm-3 control-label">Choose Post For <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <select  name="For_Sale" id="typePay" class="form-control " required="">
                        <option value="">-- choice Buy or Rent --</option>
                        <option value="1" @if($objs->For_Sale == 1)
                        selected="selected"
                        @endif>For Sale</option>
                        <option value="2" @if($objs->For_Sale == 2)
                        selected="selected"
                        @endif>For Rent</option>

                </select>
                </div>
                </div>


                <div class="typePay2  @if($objs->For_Sale == 1)
                hide
                @endif">
                    <div class="form-group">

                        <label for="Status" class="col-sm-3 control-label">Status</label>
                       <div class="col-sm-9">
                <select name="Status" id="Status" class="form-control " >
                        <option value="0" @if($objs->Status == 0)
                        selected="selected"
                        @endif>Available</option>
                        <option value="1" @if($objs->Status == 1)
                        selected="selected"
                        @endif>Rented</option>

                </select>


                    </div>
                         </div>



                <div class="typePay3 @if($objs->Status == 0)
                hide
                @endif  form-group">
                        <label for="dealDate" class="col-sm-3 control-label">Available Agian</label>

                            <div class="col-sm-3  input-group date" style="padding-left:15px;">
                                <input id="dealDate" value="{{$objs->startDate2}}" name="startDate2" class="form-control" type="text">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>

                        </div>
                    </div>





                    </div>


                <hr>

                <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" name="name" value="{{$objs->name_p}}"  class="form-control" required>
                </div>
                </div>





                <div class="form-group">
                <label class="col-md-3 control-label" for="textareaAutosize">Detail <span class="text-danger">*</span></label>
                <div class="col-md-9">

                <textarea class="form-control" name="detail" id="summernote"  rows="4" required>{{$objs->detail}}</textarea>
                </div>
                </div>


                <div class="form-group">
                <label class="col-md-3 control-label" for="textareaAutosize">short Detail <span class="text-danger">*</span></label>
                <div class="col-md-9">
                <label class="control-label text-primary" for="textareaAutosize"><i class="fa fa-info-circle"></i> ข้อความสั้นๆ ที่จะปรากฏให้ผู้ชมเห็นในหน้าค้นหาประกาศ และหน้ารวมประกาศ</label>
                <textarea class="form-control" name="shortdetail" maxlength="150" rows="1" id="textareaAutosize" data-plugin-textarea-autosize required>{{$objs->shortdetail}}</textarea>
                </div>
                </div>


                <div class="form-group">
                <label class="col-md-3 control-label" for="textareaAutosize">address <span class="text-danger">*</span></label>
                <div class="col-md-9">
                <textarea class="form-control" name="address" rows="1" id="textareaAutosize" data-plugin-textarea-autosize required>{{$objs->address}}</textarea>
                </div>
                </div>




                <div class="form-group">
                <label class="col-md-3 control-label" for="textareaAutosize"></label>
                <div class="col-sm-4">
                    <select data-plugin-selecttwo id="province_id" name="province_id" class="form-control " required="">
                        <option value="">-- choice provinces --</option>

                        @foreach($rowsProvince as $dataPro)
                        <option value="{{$dataPro->PROVINCE_ID}}" @if($objs->province_id == $dataPro->PROVINCE_ID)
                        selected="selected"
                        @endif >{{$dataPro->PROVINCE_NAME_ENG}}</option>
                        @endforeach
                </select>
                </div>


                <div class="col-sm-4">
                    <select data-plugin-selecttwo id="city_id" name="amphur_id" class="form-control " required="">
                        <option value="{{$objs->amphur_id}}">{{$objs->AMPHUR_NAME_ENG}}</option>

                </select>
                </div>



                </div>


                <!-- /////////////////////////////////////////// SOCIAL //////////////////////////////////////////////////////////////-->
                <hr>

                <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Location <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <div id="map_canvas" style="width:100%; border:0; height:316px;" frameborder="0">
                  </div>
                <br>
                </div>
                <label for="name" class="col-sm-3 control-label">Location <span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <input type="text" name="lat" id="lat" size="10" value="{{$objs->lat}}" class="form-control" required>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="lng" id="lng" size="10" value="{{$objs->lng}}" class="form-control" required>
                </div>
                </div>


                <hr>

                <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Details for Detached </label>
                <div class="col-sm-2">
                  <label for="name" class=" control-label">*Size </label>
                    <input type="text" name="Size" value="{{$objs->Size}}" class="form-control" placeholder="Sqm." required>
                </div>

                <div class="col-sm-2">
                  <label for="name" class=" control-label">*Square Wah</label>
                    <input type="text" name="Square_Wah" value="{{$objs->Square_Wah}}" class="form-control" placeholder="Square Wah." >

                </div>

                <div class="col-sm-2">
                  <label for="name" class=" control-label">*Floors</label>
                    <input type="text" name="Floors" value="{{$objs->Floors}}" class="form-control" placeholder="Floors." >

                </div>

                <div class="col-sm-2">
                  <label for="name" class=" control-label">*Bedrooms</label>
                    <select id="Bedrooms" name="Bedrooms" class="form-control " >
                      <option value="{{$objs->Bedrooms}}">{{$objs->Bedrooms}}</option>
                  <option value="0" >0</option>
                  <option value="1">1</option><option value="2">2</option>
                  <option value="3">3</option><option value="4">4</option>
                  <option value="5">5</option><option value="6">6</option>
                  <option value="7">7</option><option value="8">8</option>
                  <option value="9">9</option><option value="10">10</option>
                  <option value="11">11</option><option value="12">12</option>
                  <option value="13">13</option><option value="14">14</option>
                  <option value="15">15</option><option value="16">16</option>
                  <option value="17">17</option><option value="18">18</option>
                  <option value="19">19</option><option value="20">20</option>
                </select>
                </div>


                <label for="name" class="col-sm-3 control-label"> </label>
                <div class="col-sm-2">
                  <label for="name" class=" control-label">*Bathrooms</label>
                    <select id="Bathrooms" name="Bathrooms" class="form-control " required="">
                      <option value="{{$objs->Bathrooms}}">{{$objs->Bathrooms}}</option>
                  <option value="0" >0</option>
                  <option value="1">1</option><option value="2">2</option>
                  <option value="3">3</option><option value="4">4</option>
                  <option value="5">5</option><option value="6">6</option>
                  <option value="7">7</option><option value="8">8</option>
                  <option value="9">9</option><option value="10">10</option>
                  <option value="11">11</option><option value="12">12</option>
                  <option value="13">13</option><option value="14">14</option>
                  <option value="15">15</option><option value="16">16</option>
                  <option value="17">17</option><option value="18">18</option>
                  <option value="19">19</option><option value="20">20</option>
                </select>
                </div>
                <div class="col-sm-2">
                  <label for="name" class=" control-label">*Living Rooms</label>
                    <select id="Living" name="Living" class="form-control " >
                      <option value="{{$objs->Living}}">{{$objs->Living}}</option>
                  <option value="0">0</option>
                  <option value="1">1</option><option value="2">2</option>
                  <option value="3">3</option><option value="4">4</option>
                  <option value="5">5</option><option value="6">6</option>
                  <option value="7">7</option><option value="8">8</option>
                  <option value="9">9</option><option value="10">10</option>
                  <option value="11">11</option><option value="12">12</option>
                  <option value="13">13</option><option value="14">14</option>
                  <option value="15">15</option><option value="16">16</option>
                  <option value="17">17</option><option value="18">18</option>
                  <option value="19">19</option><option value="20">20</option>
                </select>
                </div>

                <div class="col-sm-2">
                  <label for="name" class=" control-label">*Maid Rooms</label>
                    <select id="Maid" name="Maid" class="form-control " >
                      <option value="{{$objs->Maid}}">{{$objs->Maid}}</option>
                  <option value="0" >0</option>
                  <option value="1">1</option><option value="2">2</option>
                  <option value="3">3</option><option value="4">4</option>
                  <option value="5">5</option><option value="6">6</option>
                  <option value="7">7</option><option value="8">8</option>
                  <option value="9">9</option><option value="10">10</option>
                  <option value="11">11</option><option value="12">12</option>
                  <option value="13">13</option><option value="14">14</option>
                  <option value="15">15</option><option value="16">16</option>
                  <option value="17">17</option><option value="18">18</option>
                  <option value="19">19</option><option value="20">20</option>
                </select>
                </div>

                <div class="col-sm-2">
                  <label for="name" class=" control-label">*Parking Lots</label>
                    <select id="Parking" name="Parking" class="form-control " >
                      <option value="{{$objs->Parking}}">{{$objs->Parking}}</option>
                  <option value="0" >0</option>
                  <option value="1">1</option><option value="2">2</option>
                  <option value="3">3</option><option value="4">4</option>
                  <option value="5">5</option><option value="6">6</option>
                  <option value="7">7</option><option value="8">8</option>
                  <option value="9">9</option><option value="10">10</option>
                  <option value="11">11</option><option value="12">12</option>
                  <option value="13">13</option><option value="14">14</option>
                  <option value="15">15</option><option value="16">16</option>
                  <option value="17">17</option><option value="18">18</option>
                  <option value="19">19</option><option value="20">20</option>
                </select>
                </div>
                </div>

                <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Price <span class="text-danger">*</span></label>
                <div class="col-sm-3">
                    <input type="text" name="Price" value="{{$objs->Price}}" class="form-control" required>
                </div>

                <label for="name" class="col-sm-2 control-label">Refer Bonus <span class="text-danger">*</span></label>
                <div class="col-sm-3">
                    <input type="text" name="Refer" value="{{$objs->Refer}}" class="form-control" required>
                </div>

                </div>





                <hr>


                <!-- /////////////////////////////////////////// SOCIAL //////////////////////////////////////////////////////////////-->

                <div class="form-group">
                <label class="col-md-3 control-label">Facility</label>
                        <div class="col-sm-6">
                              <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="Cable" value="1"
                                @if($objs->Cable == 1)
                                checked
                                @endif>
                                <label for="checkboxExample1">Cable TV</label>
                              </div>

                              <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="Wifi"  value="1" @if($objs->Wifi == 1)
                                checked
                                @endif>
                                <label for="checkboxExample2">Free Wifi</label>
                              </div>

                              <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="Poll"   value="1" @if($objs->Poll == 1)
                                checked
                                @endif>
                                <label for="checkboxExample3">Swimming Pool</label>
                              </div>

                              <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="Breakfast"  value="1" @if($objs->Fitness == 1)
                                checked
                                @endif>
                                <label for="checkboxExample4">Fitness</label>
                              </div>

                              <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="allowed"  value="1" @if($objs->allowed == 1)
                                checked
                                @endif>
                                <label for="checkboxExample5">Pet allowed</label>
                              </div>

                              <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="Accessibiliy" value="1"  @if($objs->Accessibiliy == 1)
                                checked
                                @endif>
                                <label>Accessibiliy</label>
                              </div>

                              <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="Parking2" value="1" @if($objs->Restaurant == 1)
                                checked
                                @endif>
                                <label>Restaurant</label>
                              </div>

                            </div>
                      </div>



                <hr>





                <div class="form-group">
                <label class="col-md-3 control-label">BTS</label>
                        <div class="col-sm-3">
                              <select id="BTS" name="BTS" class="form-control " required="">

                                <option value="@if($objs->BTS != '-')
                                {{$objs->BTS}}
                                @else
                                -
                                @endif" >@if($objs->BTS != '-')
                                {{$objs->BTS}}
                                @else
                                Choose BTS
                                @endif</option>

                  <option value="-" selected="selected">Choose BTS</option>
                  <option value="BTS Mo Chit">BTS Mo Chit</option><option value="BTS Saphan Khwai">BTS Saphan Khwai</option>
                  <option value="BTS Ari">BTS Ari</option><option value="BTS Sanam Pao">BTS Sanam Pao</option>
                  <option value="BTS Victory Monument">BTS Victory Monument</option><option value="BTS Phaya Thai">BTS Phaya Thai</option>
                  <option value="BTS Ratchathewi">BTS Ratchathewi</option><option value="BTS Siam">BTS Siam</option>
                  <option value="BTS Chit Lom">BTS Chit Lom</option><option value="BTS Ploen Chit">BTS Ploen Chit</option>
                  <option value="BTS Nana">BTS Nana</option><option value="BTS Asoke">BTS Asoke</option>
                  <option value="BTS Phrom Phong">BTS Phrom Phong</option><option value="BTS Thong Lo">BTS Thong Lo</option>
                  <option value="BTS Ekkamai">BTS Ekkamai</option><option value="BTS Phra Khanong">BTS Phra Khanong</option>
                  <option value="BTS On Nut">BTS On Nut</option><option value="BTS Bang Chak">BTS Bang Chak</option>
                  <option value="BTS Punnawithi">BTS Punnawithi</option><option value="BTS Udom Suk">BTS Udom Suk</option>

                  <option value="BTS Bang Na">BTS Bang Na</option><option value="BTS Bearing">BTS Bearing</option>
                  <option value="BTS National Stadium">BTS National Stadium</option><option value="BTS Ratchadamri">BTS Ratchadamri</option>
                  <option value="BTS Sala Daeng">BTS Sala Daeng</option><option value="BTS Chong Nonsi">BTS Chong Nonsi</option>
                  <option value="BTS Surasak">BTS Surasak</option><option value="BTS Saphan Taksin">BTS Saphan Taksin</option>

                  <option value="BTS Krung Thon Buri">BTS Krung Thon Buri</option>
                  <option value="BTS Wongwian Yai">BTS Wongwian Yai</option>
                  <option value="BTS Pho Nimit">BTS Pho Nimit</option>
                  <option value="BTS Talat Phlu">BTS Talat Phlu</option>
                  <option value="BTS Wutthakat">BTS Wutthakat</option>
                  <option value="BTS Bang Wa">BTS Bang Wa</option>


                </select>

                            </div>


                            <label class="col-md-1 control-label">MRT</label>
                        <div class="col-sm-3">
                              <select id="MRT" name="MRT" class="form-control " required="">
                                <option value="@if($objs->MRT != '-')
                                {{$objs->MRT}}
                                @else
                                -
                                @endif" >@if($objs->MRT != '-')
                                {{$objs->MRT}}
                                @else
                                Choose MRT
                                @endif</option>
                  <option value="-" selected="selected">Choose MRT</option>
                  <option value="MRT Bang Sue">MRT Bang Sue</option><option value="MRT Kamphaeng Phet">MRT Kamphaeng Phet</option>
                  <option value="MRT Chatuchak Park">MRT Chatuchak Park</option><option value="MRT Phahon Yothin">MRT Phahon Yothin</option>
                  <option value="MRT Lat Phrao">MRT Lat Phrao</option><option value="MRT Ratchadaphisek">MRT Ratchadaphisek</option>
                  <option value="MRT Sutthisan">MRT Sutthisan</option><option value="MRT Huai Khwang">MRT Huai Khwang</option>
                  <option value="MRT Thailand Cultural Centre">MRT Thailand Cultural Centre</option><option value="MRT Phra ram 9">MRT Phra ram 9</option>
                  <option value="MRT Phetchaburi">MRT Phetchaburi</option><option value="MRT Sukhumvit">MRT Sukhumvit</option>
                  <option value="MRT Queen Sirikit">MRT Queen Sirikit</option><option value="MRT Khlong Toei">MRT Khlong Toei</option>
                  <option value="MRT Lumphini">MRT Lumphini</option><option value="MRT Silom">MRT Silom</option>
                  <option value="MRT Sam Yan">MRT Sam Yan</option><option value="MRT Hua Lamphong">MRT Hua Lamphong</option>

                </select>

                            </div>
                      </div>







                <hr>
                <div class="form-group">
					             <label class="col-md-3 control-label"></label>
												<div class="col-md-6">
													<img src="{{url('assets/cusimage/'.$objs->image)}}" class="img-responsive img-thumbnail">
												</div>
											</div>


                <div class="form-group">
                <label class="col-md-3 control-label">รูปหน้าร้าน <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="input-append">
                              <div class="uneditable-input">
                                <i class="fa fa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                              </div>
                              <span class="btn btn-default btn-file">
                                <span class="fileupload-exists">Change</span>
                                <span class="fileupload-new">Select file</span>
                                <input type="file" name="image" accept="image/*" />
                              </span>
                              <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                          </div>
                        </div>
                      </div>









                <div class="form-group">
                <label for="rating" class="col-sm-3 control-label">Rating <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <select name="rating" id="rating " class="form-control" >
                        <option value="1" @if($objs->rating == 1)
                        selected="selected"
                        @endif>Rating 1</option>
                        <option value="2" @if($objs->rating == 2)
                        selected="selected"
                        @endif>Rating 2</option>
                        <option value="3" @if($objs->rating == 3)
                        selected="selected"
                        @endif>Rating 3</option>
                        <option value="4" @if($objs->rating == 4)
                        selected="selected"
                        @endif>Rating 4</option>
                        <option value="5" @if($objs->rating == 5)
                        selected="selected"
                        @endif>Rating 5</option>
                </select>
                </div>
                </div>





                <div class="form-group">
                <label class="col-sm-3 control-label">รูปลายประกอบ <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                <label for="exampleInputFile">Image input</label>

                <input id="file-0a" class="file " type="file" name="product_image[]" accept="image/*" multiple>



                </div>
                </div>







                <legend class="section"></legend>
                <div class="text-center">
                <button type="submit" class="btn btn-info" onclick="clicksound.playclip()"><i class="fa fa-save"></i> อัพเดทข้อมูล</button>
                <button type="reset" class="btn btn-default" onclick="showhide('#show','#add');"><i class="fa fa-eraser"></i> ยกเลิก</button>
                </div>

                </div>

</form>
































              </div>
            </section>

              </div>
              <div class="col-xs-1">
              </div>
            </div>
        </div>
</section>





<section class="content-body">
<!-- start: page -->
<section class=" content-with-menu-has-toolbar media-gallery">
<div class="content-with-menu-container">

  <form  action="{{url('admin/property_image_del/')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
    <input type="hidden" name="_method" value="POST">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <input type="hidden" name="property_id" value="{{$objs->id_p}}">
<div class="row mg-files" data-sort-destination data-sort-id="media-gallery">

@if($img_all)
@foreach($img_all as $img_u)
  <div class="isotope-item  col-sm-6 col-md-4 col-lg-3">
    <div class="thumbnail">
      <div class="">
        <a class="thumb-image" >
          <img src="{{url('assets/cusimage/'.$img_u->image)}}" class="img-responsive" >
        </a>
        <br>
        <div class="mg-thumb-options">
          <div class="checkbox-custom checkbox-default">
            <input type="checkbox" name="product_image[]" value="{{$img_u->id}}"  >
            <label>เลือกรูปภาพประกอบ</label>
          </div>
        </div>
      </div>

      <div class="mg-description">

        <small class="pull-right text-muted"></small>
      </div>
    </div>
  </div>
@endforeach
@endif




</div>
<button type="submit" class="btn btn-danger pull-right" style="margin-top:-15px;">ลบรูปภาพที่เลือกไว้</button>
</form>



</div>
</section>
<!-- end: page -->
</section>

<br><br><br><br><br><br><br><br><br><br>



@stop

@section('scripts')

<script src="{{URL::asset('assets/text/dist/summernote.js')}}"></script>
<script src="{{URL::asset('assets/upload_image/js/fileinput.js')}}"></script>


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
    height: 450,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote

  });
});
var postForm = function() {
var content = $('textarea[name="detail"]').html($('#summernote').code());
}
</script>

<script>
    jQuery(function($) {
        jQuery('body').on('change','#province_id',function(){
            jQuery.ajax({
                'type':'POST',
                'url': '{{url('admin/model_x/')}}',
                'cache':false,
                'data': {PROVINCE_ID:$("#province_id").val()},
                'success':function(html){
                    $("#city_id").html(html);
                }
            });
            return false;
        });
    });
</script>


<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyAsmXKbPGLn7FfOODunI5mSQp9QWnd4-Gc&libraries=places&sensor=false'></script>
<script type="text/javascript">
      var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng({{$objs->lat}}, {{$objs->lat}}), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

      function initialize() {
var myOptions = {
                center: new google.maps.LatLng(13.7211075, 100.5904873 ),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);


            var myLatlng = new google.maps.LatLng({{$objs->lat}},{{$objs->lng}});
            var myOptions = {
                zoom: 17,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
                }
             map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
             var marker = new google.maps.Marker({
                 position: myLatlng,
                 map: map
            });


            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });

            var marker;
            function placeMarker(location) {
                if(marker){ //on vérifie si le marqueur existe
                    marker.setPosition(location); //on change sa position
                }else{
                    marker = new google.maps.Marker({ //on créé le marqueur
                        position: location,
                        map: map
                    });
                }
                document.getElementById('lat').value=location.lat();
                document.getElementById('lng').value=location.lng();
                getAddress(location);
            }










      function getAddress(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
                document.getElementById("address").value = results[0].formatted_address;
              }
              else {
                document.getElementById("address").value = "No results";
              }
            }
            else {
              document.getElementById("address").value = status;
            }
          });
        }
      }
      google.maps.event.addDomListener(window, 'load', initialize);
</script>


<script>
$(document).ready(function() {


   $('select#typePay').change(function() {
        var tex = $('select#typePay').val();

        if (tex == 2) {
            $(".typePay2").fadeIn().removeClass("hide");

        }  else {
        $(".typePay2").fadeIn().addClass("hide");


    }
    });



   $('select#Status').change(function() {
        var tex = $('select#Status').val();

        if (tex == 1) {
            $(".typePay3").fadeIn().removeClass("hide");

        }  else {
        $(".typePay3").fadeIn().addClass("hide");


    }
    });



    $('.input-group.date').datepicker({
        format: "yyyy-mm-dd",
        weekStart: 0,
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true,
        toggleActive: true
    });
});


</script>



@if ($message = Session::get('del_image_success'))
<script type="text/javascript">
PNotify.prototype.options.styling = "fontawesome";
new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success'
    });
</script>
@endif

@if ($message = Session::get('edit_success'))
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
