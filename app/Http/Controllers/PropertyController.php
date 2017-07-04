<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\category;
use App\Province;
use App\City;
use App\product_2;
use App\product_image;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cat = DB::table('product')->select(
            'product.*',
            'product.id as id_p',
            'product.name as name_p',
            'product.created_at as created_atss',
            'categorys.id as id_c',
            'categorys.name as name_c'
            )
            ->leftjoin('categorys', 'categorys.id',  'product.category_id')
            ->paginate(15);


              $data['objs'] = $cat;
              $data['datahead'] = "จัดการอสังหา";
      return view('admin.property.index', $data);
    }

    public function recom_property(){

      $cat_count = DB::table('product')->select(
            'product.*',
            'product.id as id_p',
            'product.name as name_p',
            'product.created_at as created_atss',
            'categorys.id as id_c',
            'categorys.name as name_c'
            )
            ->leftjoin('categorys', 'categorys.id',  'product.category_id')
            ->where('product.first_index', 2)
            ->count();

      $cat = DB::table('product')->select(
            'product.*',
            'product.id as id_p',
            'product.name as name_p',
            'product.created_at as created_atss',
            'categorys.id as id_c',
            'categorys.name as name_c'
            )
            ->leftjoin('categorys', 'categorys.id',  'product.category_id')
            ->where('product.first_index', 2)
            ->paginate(15);


              $data['objs'] = $cat;
              $data['cat_count'] = $cat_count;
              $data['datahead'] = "จัดการอสังหา RECOMMENDED";
      return view('admin.property.recom', $data);

    }

    public function new_property(){

      $cat_count = DB::table('product')->select(
            'product.*',
            'product.id as id_p',
            'product.name as name_p',
            'product.created_at as created_atss',
            'categorys.id as id_c',
            'categorys.name as name_c'
            )
            ->leftjoin('categorys', 'categorys.id',  'product.category_id')
            ->where('product.hot_index', 2)
            ->count();

      $cat = DB::table('product')->select(
            'product.*',
            'product.id as id_p',
            'product.name as name_p',
            'product.created_at as created_atss',
            'categorys.id as id_c',
            'categorys.name as name_c'
            )
            ->leftjoin('categorys', 'categorys.id',  'product.category_id')
            ->where('product.hot_index', 2)
            ->paginate(15);


              $data['objs'] = $cat;
              $data['cat_count'] = $cat_count;
              $data['datahead'] = "จัดการอสังหา NEW";
      return view('admin.property.new', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $dataProvince = Province::all();

      //dd($dataProvince);
    //  return View::make('example.index')->with('rowsProvince', $rowsProvince);

    $data['header'] = 'เพิ่มอสังหาใหม่';
    $data['rowsProvince'] = $dataProvince;
    $data['method'] = 'post';
    $data['url'] = url('admin/property');
    $objs = category::all();
    $data['objs'] = $objs;
    return view('admin.property.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $image = $request->file('image');
      $this->validate($request, [
           'image' => 'required|max:4048',
           'product_image' => 'required|max:4048',
           'owner' => 'required',
           'tel' => 'required',
           'category_id' => 'required',
           'For_Sale' => 'required',
           'name' => 'required',
           'detail' => 'required',
           'shortdetail' => 'required',
           'address' => 'required',
           'province_id' => 'required',
           'amphur_id' => 'required',
           'lat' => 'required',
           'lng' => 'required',
           'Price' => 'required',
           'Refer' => 'required',
           'rating' => 'required',
       ]);



       if($request['Additional'] == null){
         $Additional = '-';
       }else{
         $Additional = $request['Additional'];
       }

       if($request['Cable'] == null){
         $Cable = 0;
       }else{
         $Cable = 1;
       }

       if($request['Wifi'] == null){
         $Wifi = 0;
       }else{
         $Wifi = 1;
       }

       if($request['Poll'] == null){
         $Poll = 0;
       }else{
         $Poll = 1;
       }
       if($request['Breakfast'] == null){
         $Breakfast = 0;
       }else{
         $Breakfast = 1;
       }

       if($request['allowed'] == null){
         $allowed = 0;
       }else{
         $allowed = 1;
       }

       if($request['Accessibiliy'] == null){
         $Accessibiliy = 0;
       }else{
         $Accessibiliy = 1;
       }

       if($request['Parking2'] == null){
         $Parking2 = 0;
       }else{
         $Parking2 = 1;
       }

      // dd($request['Cable']);
       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = asset('assets/cusimage/');
        $img = Image::make($image->getRealPath());
        $img->resize(800, 533, function ($constraint) {
        $constraint->aspectRatio();
      })->save('assets/cusimage/'.$input['imagename']);

       $package = new product_2();
       $package->first_index = $request['findex'];
       $package->hot_index = $request['hot_property'];
       $package->category_id = $request['category_id'];
       $package->For_Sale = $request['For_Sale'];
       $package->name = $request['name'];
       $package->detail = $request['detail'];
       $package->shortdetail = $request['shortdetail'];
       $package->address = $request['address'];
       $package->province_id = $request['province_id'];
       $package->amphur_id = $request['amphur_id'];
       $package->lat = $request['lat'];
       $package->lng = $request['lng'];
       $package->Size = $request['Size'];
       $package->Floors = $request['Floors'];
       $package->Bedrooms = $request['Bedrooms'];
       $package->Bathrooms = $request['Bathrooms'];
       $package->Living = $request['Living'];
       $package->Maid = $request['Maid'];
       $package->Parking = $request['Parking'];
       $package->Price = $request['Price'];
       $package->Cable = $Cable;
       $package->Wifi = $Wifi;
       $package->Poll = $Poll;
       $package->Fitness = $Breakfast;
       $package->allowed = $allowed;
       $package->Accessibiliy = $Accessibiliy;
       $package->Restaurant = $Parking2;
       $package->image = $input['imagename'];
       $package->rating = $request['rating'];
       $package->BTS = $request['BTS'];
       $package->MRT = $request['MRT'];
       $package->Refer = $request['Refer'];
       $package->Owner = $request['owner'];
       $package->email = $request['email'];
       $package->tel = $request['tel'];
       $package->Additional = $Additional;
       $package->Status = $request['Status'];
       $package->startDate2 = $request['startDate2'];
       $package->user_id = Auth::user()->id;
       $package->district_id = 0;
       $package->timeline = '-';
       $package->view = 0;
       $package->AP = 0;
       $package->save();

       $the_id = $package->id;
       //product_image


       if($the_id){
       $gallary = $request->file('product_image');

       if (sizeof($gallary) > 1) {

         for ($i = 0; $i < sizeof($gallary); $i++) {

           $path = 'assets/cusimage/';
           $filename = time()."-".$gallary[$i]->getClientOriginalName();
           $gallary[$i]->move($path, $filename);


           $admins[] = [
               'product_id' => $the_id,
               'image' => $filename,
           ];

         }
         product_image::insert($admins);
       }

     }


       return redirect(url('admin/property/'.$the_id.'/edit'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');


    }

    public function searchproperty(Request $request)
    {
      $this->validate($request, [
        'q' => 'required'
      ]);
      $search = $request->get('q');

      $cat = DB::table('product')->select(
            'product.*',
            'product.id as id_p',
            'product.name as name_p',
            'product.created_at as created_atss',
            'categorys.id as id_c',
            'categorys.name as name_c'
            )
            ->leftjoin('categorys', 'categorys.id',  'product.category_id')
            ->where('product.name', 'like', "%$search%")
            ->orwhere('categorys.name', 'like', "%$search%")
            ->orwhere('product.id' , $search)
            ->paginate(15);


            $cat_count = DB::table('product')->select(
                  'product.*',
                  'product.id as id_p',
                  'product.name as name_p',
                  'product.created_at as created_atss',
                  'categorys.id as id_c',
                  'categorys.name as name_c'
                  )
                  ->leftjoin('categorys', 'categorys.id',  'product.category_id')
                  ->where('product.name', 'like', "%$search%")
                  ->orwhere('categorys.name', 'like', "%$search%")
                  ->orwhere('product.id' , $search)
                  ->count();

              $data['cat_count'] = $cat_count;
              $data['objs'] = $cat;
              $data['search'] = $search;
              $data['datahead'] = "จัดการอสังหา";
      return view('admin.property.search', $data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cat = DB::table('product')->select(
            'product.*',
            'product.id as id_p',
            'product.name as name_p',
            'product.created_at as created_atss',
            'categorys.id as id_c',
            'categorys.name as name_c',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('categorys', 'categorys.id',  'product.category_id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.id', $id)
            ->first();

      $img_all = DB::table('product_image')->select(
            'product_image.*'
            )
            ->where('product_id', $id)
            ->get();
      //dd($cat);

      $dataProvince = Province::all();

      $data['rowsProvince'] = $dataProvince;
      $category = category::all();
      $data['category'] = $category;
      $data['img_all'] = $img_all;
      $data['objs'] = $cat;
      $data['url'] = url('admin/property/'.$id);
      $data['header'] = "แก้ไขอสังหา";
      $data['method'] = "put";

      return view('admin.property.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if($request['Cable'] == null){
        $Cable = 0;
      }else{
        $Cable = 1;
      }

      if($request['Wifi'] == null){
        $Wifi = 0;
      }else{
        $Wifi = 1;
      }

      if($request['Poll'] == null){
        $Poll = 0;
      }else{
        $Poll = 1;
      }
      if($request['Breakfast'] == null){
        $Breakfast = 0;
      }else{
        $Breakfast = 1;
      }

      if($request['allowed'] == null){
        $allowed = 0;
      }else{
        $allowed = 1;
      }

      if($request['Accessibiliy'] == null){
        $Accessibiliy = 0;
      }else{
        $Accessibiliy = 1;
      }

      if($request['Parking2'] == null){
        $Parking2 = 0;
      }else{
        $Parking2 = 1;
      }


      $image = $request->file('image');
      $gallary = $request->file('product_image');

      // Start step 1 //////////////////////////////////////////////////////////////

      if($image == NULL && $gallary == NULL){


        $this->validate($request, [
             'owner' => 'required',
             'tel' => 'required',
             'category_id' => 'required',
             'For_Sale' => 'required',
             'name' => 'required',
             'detail' => 'required',
             'shortdetail' => 'required',
             'address' => 'required',
             'province_id' => 'required',
             'amphur_id' => 'required',
             'lat' => 'required',
             'lng' => 'required',
             'Price' => 'required',
             'Refer' => 'required',
             'rating' => 'required',
         ]);


         $package = product_2::find($id);
         $package->first_index = $request['findex'];
         $package->hot_index = $request['hot_property'];
         $package->category_id = $request['category_id'];
         $package->For_Sale = $request['For_Sale'];
         $package->name = $request['name'];
         $package->detail = $request['detail'];
         $package->shortdetail = $request['shortdetail'];
         $package->address = $request['address'];
         $package->province_id = $request['province_id'];
         $package->amphur_id = $request['amphur_id'];
         $package->lat = $request['lat'];
         $package->lng = $request['lng'];
         $package->Size = $request['Size'];
         $package->Floors = $request['Floors'];
         $package->Bedrooms = $request['Bedrooms'];
         $package->Bathrooms = $request['Bathrooms'];
         $package->Living = $request['Living'];
         $package->Maid = $request['Maid'];
         $package->Parking = $request['Parking'];
         $package->Price = $request['Price'];
         $package->Cable = $Cable;
         $package->Wifi = $Wifi;
         $package->Poll = $Poll;
         $package->Fitness = $Breakfast;
         $package->allowed = $allowed;
         $package->Accessibiliy = $Accessibiliy;
         $package->Restaurant = $Parking2;
         $package->rating = $request['rating'];
         $package->BTS = $request['BTS'];
         $package->MRT = $request['MRT'];
         $package->Refer = $request['Refer'];
         $package->Owner = $request['owner'];
         $package->email = $request['email'];
         $package->tel = $request['tel'];
         $package->Additional = $request['Additional'];
         $package->Status = $request['Status'];
         $package->startDate2 = $request['startDate2'];
         $package->user_id = Auth::user()->id;
         $package->district_id = 0;
         $package->timeline = '-';
         $package->view = 0;
         $package->AP = 0;
         $package->save();

         return redirect(url('admin/property/'.$id.'/edit'))->with('edit_success','คุณทำการแก้ไขอสังหา สำเร็จ');

      }

      // Enf step 1 //////////////////////////////////////////////////////////////

      if($image != NULL && $gallary != NULL){

        $this->validate($request, [
             'image' => 'required|max:4048',
             'product_image' => 'required|max:4048',
             'owner' => 'required',
             'tel' => 'required',
             'category_id' => 'required',
             'For_Sale' => 'required',
             'name' => 'required',
             'detail' => 'required',
             'shortdetail' => 'required',
             'address' => 'required',
             'province_id' => 'required',
             'amphur_id' => 'required',
             'lat' => 'required',
             'lng' => 'required',
             'Price' => 'required',
             'Refer' => 'required',
             'rating' => 'required',
         ]);

         //dd(sizeof($gallary));

         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $destinationPath = asset('assets/cusimage/');
          $img = Image::make($image->getRealPath());
          $img->resize(800, 533, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/cusimage/'.$input['imagename']);

         if (sizeof($gallary) > 0) {
           for ($i = 0; $i < sizeof($gallary); $i++) {
             $path = 'assets/cusimage/';
             $filename = time()."-".$gallary[$i]->getClientOriginalName();
             $gallary[$i]->move($path, $filename);
             $admins[] = [
                 'product_id' => $id,
                 'image' => $filename,
             ];
           }
           product_image::insert($admins);
         }


         $package = product_2::find($id);
         $package->first_index = $request['findex'];
         $package->hot_index = $request['hot_property'];
         $package->category_id = $request['category_id'];
         $package->For_Sale = $request['For_Sale'];
         $package->name = $request['name'];
         $package->detail = $request['detail'];
         $package->shortdetail = $request['shortdetail'];
         $package->address = $request['address'];
         $package->province_id = $request['province_id'];
         $package->amphur_id = $request['amphur_id'];
         $package->lat = $request['lat'];
         $package->lng = $request['lng'];
         $package->Size = $request['Size'];
         $package->Floors = $request['Floors'];
         $package->Bedrooms = $request['Bedrooms'];
         $package->Bathrooms = $request['Bathrooms'];
         $package->Living = $request['Living'];
         $package->Maid = $request['Maid'];
         $package->Parking = $request['Parking'];
         $package->Price = $request['Price'];
         $package->Cable = $Cable;
         $package->Wifi = $Wifi;
         $package->Poll = $Poll;
         $package->Fitness = $Breakfast;
         $package->allowed = $allowed;
         $package->Accessibiliy = $Accessibiliy;
         $package->Restaurant = $Parking2;
         $package->image = $input['imagename'];
         $package->rating = $request['rating'];
         $package->BTS = $request['BTS'];
         $package->MRT = $request['MRT'];
         $package->Refer = $request['Refer'];
         $package->Owner = $request['owner'];
         $package->email = $request['email'];
         $package->tel = $request['tel'];
         $package->Additional = $request['Additional'];
         $package->Status = $request['Status'];
         $package->startDate2 = $request['startDate2'];
         $package->user_id = Auth::user()->id;
         $package->district_id = 0;
         $package->timeline = '-';
         $package->view = 0;
         $package->AP = 0;
         $package->save();

         return redirect(url('admin/property/'.$id.'/edit'))->with('edit_success','คุณทำการแก้ไขอสังหา สำเร็จ');
      }

      // Enf step 1 //////////////////////////////////////////////////////////////


      if($image != NULL && $gallary == NULL){

        $this->validate($request, [
             'image' => 'required|max:4048',
             'owner' => 'required',
             'tel' => 'required',
             'category_id' => 'required',
             'For_Sale' => 'required',
             'name' => 'required',
             'detail' => 'required',
             'shortdetail' => 'required',
             'address' => 'required',
             'province_id' => 'required',
             'amphur_id' => 'required',
             'lat' => 'required',
             'lng' => 'required',
             'Price' => 'required',
             'Refer' => 'required',
             'rating' => 'required',
         ]);

         //dd(sizeof($gallary));

         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $destinationPath = asset('assets/cusimage/');
          $img = Image::make($image->getRealPath());
          $img->resize(800, 533, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/cusimage/'.$input['imagename']);

         $package = product_2::find($id);
         $package->first_index = $request['findex'];
         $package->hot_index = $request['hot_property'];
         $package->category_id = $request['category_id'];
         $package->For_Sale = $request['For_Sale'];
         $package->name = $request['name'];
         $package->detail = $request['detail'];
         $package->shortdetail = $request['shortdetail'];
         $package->address = $request['address'];
         $package->province_id = $request['province_id'];
         $package->amphur_id = $request['amphur_id'];
         $package->lat = $request['lat'];
         $package->lng = $request['lng'];
         $package->Size = $request['Size'];
         $package->Floors = $request['Floors'];
         $package->Bedrooms = $request['Bedrooms'];
         $package->Bathrooms = $request['Bathrooms'];
         $package->Living = $request['Living'];
         $package->Maid = $request['Maid'];
         $package->Parking = $request['Parking'];
         $package->Price = $request['Price'];
         $package->Cable = $Cable;
         $package->Wifi = $Wifi;
         $package->Poll = $Poll;
         $package->Fitness = $Breakfast;
         $package->allowed = $allowed;
         $package->Accessibiliy = $Accessibiliy;
         $package->Restaurant = $Parking2;
         $package->image = $input['imagename'];
         $package->rating = $request['rating'];
         $package->BTS = $request['BTS'];
         $package->MRT = $request['MRT'];
         $package->Refer = $request['Refer'];
         $package->Owner = $request['owner'];
         $package->email = $request['email'];
         $package->tel = $request['tel'];
         $package->Additional = $request['Additional'];
         $package->Status = $request['Status'];
         $package->startDate2 = $request['startDate2'];
         $package->user_id = Auth::user()->id;
         $package->district_id = 0;
         $package->timeline = '-';
         $package->view = 0;
         $package->AP = 0;
         $package->save();

         return redirect(url('admin/property/'.$id.'/edit'))->with('edit_success','คุณทำการแก้ไขอสังหา สำเร็จ');
      }




      if($image == NULL && $gallary != NULL){

        $this->validate($request, [
             'product_image' => 'required|max:4048',
             'owner' => 'required',
             'tel' => 'required',
             'category_id' => 'required',
             'For_Sale' => 'required',
             'name' => 'required',
             'detail' => 'required',
             'shortdetail' => 'required',
             'address' => 'required',
             'province_id' => 'required',
             'amphur_id' => 'required',
             'lat' => 'required',
             'lng' => 'required',
             'Price' => 'required',
             'Refer' => 'required',
             'rating' => 'required',
         ]);

         //dd(sizeof($gallary));

         if (sizeof($gallary) > 0) {
           for ($i = 0; $i < sizeof($gallary); $i++) {
             $path = 'assets/cusimage/';
             $filename = time()."-".$gallary[$i]->getClientOriginalName();
             $gallary[$i]->move($path, $filename);
             $admins[] = [
                 'product_id' => $id,
                 'image' => $filename,
             ];
           }
           product_image::insert($admins);
         }


         $package = product_2::find($id);
         $package->first_index = $request['findex'];
         $package->hot_index = $request['hot_property'];
         $package->category_id = $request['category_id'];
         $package->For_Sale = $request['For_Sale'];
         $package->name = $request['name'];
         $package->detail = $request['detail'];
         $package->shortdetail = $request['shortdetail'];
         $package->address = $request['address'];
         $package->province_id = $request['province_id'];
         $package->amphur_id = $request['amphur_id'];
         $package->lat = $request['lat'];
         $package->lng = $request['lng'];
         $package->Size = $request['Size'];
         $package->Floors = $request['Floors'];
         $package->Bedrooms = $request['Bedrooms'];
         $package->Bathrooms = $request['Bathrooms'];
         $package->Living = $request['Living'];
         $package->Maid = $request['Maid'];
         $package->Parking = $request['Parking'];
         $package->Price = $request['Price'];
         $package->Cable = $Cable;
         $package->Wifi = $Wifi;
         $package->Poll = $Poll;
         $package->Fitness = $Breakfast;
         $package->allowed = $allowed;
         $package->Accessibiliy = $Accessibiliy;
         $package->Restaurant = $Parking2;
         $package->rating = $request['rating'];
         $package->BTS = $request['BTS'];
         $package->MRT = $request['MRT'];
         $package->Refer = $request['Refer'];
         $package->Owner = $request['owner'];
         $package->email = $request['email'];
         $package->tel = $request['tel'];
         $package->Additional = $request['Additional'];
         $package->Status = $request['Status'];
         $package->startDate2 = $request['startDate2'];
         $package->user_id = Auth::user()->id;
         $package->district_id = 0;
         $package->timeline = '-';
         $package->view = 0;
         $package->AP = 0;
         $package->save();

         return redirect(url('admin/property/'.$id.'/edit'))->with('edit_success','คุณทำการแก้ไขอสังหา สำเร็จ');
      }

      // Enf step 1 //////////////////////////////////////////////////////////////

      /*if($file == NULL){
      } */





    //   return redirect(url('admin/property/'.$id.'/edit'))->with('edit_success','คุณทำการแก้ไขอสังหา สำเร็จ');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function property_image_del(Request $request){
    $property_id = $request['property_id'];

    $gallary = $request->get('product_image');

    if (sizeof($gallary) > 0) {

      for ($i = 0; $i < sizeof($gallary); $i++) {

        $objs = DB::table('product_image')
          ->where('id', $gallary[$i])
          ->first();

          $file_path = 'assets/cusimage/'.$objs->image;
          unlink($file_path);
          DB::table('product_image')->where('id', $objs->id)->delete();
      /*  $path = 'assets/cusimage/';
        $filename = time()."-".$gallary[$i]->getClientOriginalName();
        $gallary[$i]->move($path, $filename); */




      }


    }
    //dd($objs);
    return redirect(url('admin/property/'.$property_id.'/edit'))->with('del_image_success','คุณทำการลบรูปประกอบ สำเร็จ');

     }



    public function destroy($id)
    {
      $image_all =   $objs = DB::table('product_image')
            ->select(
               'product_image.*'
               )
            ->where('product_id', $id)
            ->get();

      foreach ($image_all as $user) {

        $file_path = 'assets/cusimage/'.$user->image;
        unlink($file_path);

      }


      $objs = DB::table('product')
          ->select(
             'product.*'
             )
          ->where('id', $id)
          ->first();

      $file_path = 'assets/cusimage/'.$objs->image;
      unlink($file_path);

      $obj = product_2::find($id);
      $obj->delete();
      return redirect(url('admin/property/'))->with('del_product','คุณทำการลบอสังหา สำเร็จ');
    }
}
