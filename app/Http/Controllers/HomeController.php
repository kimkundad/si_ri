<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\slideshow;
use App\setting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*  public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function contact_us()
     {
       $setting_id = 1;
       $setting = setting::find($setting_id);
       $data['setting'] = $setting;

       return view('contact', $data);
     }

     public function search_data(Request $request){

       $this->validate($request, [
       'field2' => 'required'
      ]);

      $field2= $request['field2'];


      $home_count = DB::table('categorys')
      ->select(
      'categorys.*',
      'categorys.name as cat_name*',
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('product.name', 'like', "%$field2%")
      ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$field2%")
      ->orWhere('amphures.AMPHUR_NAME', 'like', "%$field2%")
      ->orWhere('product.BTS', 'like', "%$field2%")
      ->orWhere('product.MRT', 'like', "%$field2%")
      ->count();

      if($get_user_count > 0){


        $home_get = DB::table('categorys')
        ->select(
        'categorys.*',
        'categorys.name as cat_name*',
        'product.*',
        'amphures.AMPHUR_NAME_ENG'
        )
        ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
        ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
        ->where('product.name', 'like', "%$field2%")
        ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$field2%")
        ->orWhere('amphures.AMPHUR_NAME', 'like', "%$field2%")
        ->orWhere('product.BTS', 'like', "%$field2%")
        ->orWhere('product.MRT', 'like', "%$field2%")
        ->get();

        foreach($home_get as $x){
                $admin[] =
                    $x->name
                ;
              }

      }else{
        $admin = null;
      }

      return Response::json(['data' => $admin]);

     }

     public function terms_condition()
     {
       $setting_id = 1;
       $setting = setting::find($setting_id);
       $data['setting'] = $setting;

       return view('terms_condition', $data);
     }

     public function privacy()
     {
       $setting_id = 1;
       $setting = setting::find($setting_id);
       $data['setting'] = $setting;

       return view('privacy', $data);
     }

     public function refer()
     {
       $setting_id = 1;
       $setting = setting::find($setting_id);
       $data['setting'] = $setting;

       return view('refer', $data);
     }

     public function about()
     {
       $setting_id = 1;
       $setting = setting::find($setting_id);
       $data['setting'] = $setting;

       return view('about', $data);
     }


    public function index()
    {
      $setting_id = 1;
      $setting = setting::find($setting_id);
      $data['setting'] = $setting;



      $slide = DB::table('slideshows')->select(
            'slideshows.*'
            )
            ->orderBy('id', 'asc')
            ->get();
          //  dd($slide);


      $data['slide'] = $slide;

      $home = DB::table('product')
      ->select(
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('product.first_index', 2)
      ->orderBy('id', 'desc')
      ->limit(8)
      ->get();
      //dd($home);
      $data['home'] = $home;


      $home_top = DB::table('product')
      ->select(
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('product.hot_index', 2)
      ->orderBy('product.id', 'desc')
      ->limit(4)
      ->get();
      //dd($home);
      $data['home_top'] = $home_top;
      //dd($home_top);
      $categorys = DB::table('categorys')->get();

    $data['category'] = $categorys;
    return view('welcome', $data);
    }

    public function search(Request $request)
    {
      $setting_id = 1;
      $setting = setting::find($setting_id);
      $data['setting'] = $setting;

      $ark = $request['ark'];
      $type_ark = $request['type_ark'];
      $type_home = $request['type_home'];

      $min_price = $request['min_price'];
      $max_price = $request['max_price'];
      $Bedrooms = $request['Bedrooms'];
      $Bathroom = $request['Bathroom'];

      $categorys = DB::table('categorys')->get();
      $data['category'] = $categorys;

      if($ark == NULL && $type_home == NULL){








/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



        if($min_price != NULL){
          if($max_price == NULL){
            $max_price = 100000000;
          }


          if($Bedrooms != null && $Bathroom != null){

            $home = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->where('product.Bedrooms', $Bedrooms)
            ->where('product.Bathrooms', $Bathroom)
            ->whereBetween('product.Price', [$min_price, $max_price])
            ->orderBy('product.id', 'desc')
            ->paginate(8);

            $home_count = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->where('product.Bedrooms', $Bedrooms)
            ->where('product.Bathrooms', $Bathroom)
            ->whereBetween('product.Price', [$min_price, $max_price])
            ->orderBy('product.id', 'desc')
            ->count();

          }elseif($Bedrooms == null && $Bathroom != null){

            $home = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->where('product.Bathrooms', $Bathroom)
            ->whereBetween('product.Price', [$min_price, $max_price])
            ->orderBy('product.id', 'desc')
            ->paginate(8);

            $home_count = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->where('product.Bathrooms', $Bathroom)
            ->whereBetween('product.Price', [$min_price, $max_price])
            ->orderBy('product.id', 'desc')
            ->count();

          }elseif($Bedrooms != null && $Bathroom == null){

            $home = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->where('product.Bedrooms', $Bedrooms)
            ->whereBetween('product.Price', [$min_price, $max_price])
            ->orderBy('product.id', 'desc')
            ->paginate(8);

            $home_count = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->where('product.Bedrooms', $Bedrooms)
            ->whereBetween('product.Price', [$min_price, $max_price])
            ->orderBy('product.id', 'desc')
            ->count();

            //dd($home);

          }else{

            $home = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->whereBetween('product.Price', [$min_price, $max_price])
            ->orderBy('product.id', 'desc')
            ->paginate(8);

            $home_count = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->whereBetween('product.Price', [$min_price, $max_price])
            ->orderBy('product.id', 'desc')
            ->count();

          }





        //
        }else{

          if($Bedrooms != null && $Bathroom != null){

            $home = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->where('product.Bedrooms', $Bedrooms)
            ->where('product.Bathrooms', $Bathroom)
            ->orderBy('product.id', 'desc')
            ->paginate(8);

            $home_count = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->where('product.Bedrooms', $Bedrooms)
            ->where('product.Bathrooms', $Bathroom)
            ->orderBy('product.id', 'desc')
            ->count();

          }elseif($Bedrooms == null && $Bathroom != null){

            $home = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->where('product.Bathrooms', $Bathroom)
            ->orderBy('product.id', 'desc')
            ->paginate(8);

            $home_count = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->where('product.Bathrooms', $Bathroom)
            ->orderBy('product.id', 'desc')
            ->count();

          }elseif($Bedrooms != null && $Bathroom == null){

            $home = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->where('product.Bedrooms', $Bedrooms)
            ->orderBy('product.id', 'desc')
            ->paginate(8);

            $home_count = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->where('product.Bedrooms', $Bedrooms)
            ->orderBy('product.id', 'desc')
            ->count();

          }else{

            $home = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->orderBy('product.id', 'desc')
            ->paginate(8);

            $home_count = DB::table('categorys')
            ->select(
            'categorys.*',
            'categorys.name as cat_name*',
            'product.*',
            'amphures.AMPHUR_NAME_ENG'
            )
            ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
            ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
            ->where('product.For_Sale', $type_ark)
            ->orderBy('product.id', 'desc')
            ->count();

          }

        }


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////














      }elseif($ark != NULL && $type_home == NULL){







        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



                if($min_price != NULL){
                  if($max_price == NULL){
                    $max_price = 100000000;
                  }


                  if($Bedrooms != null && $Bathroom != null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.Bathrooms', $Bathroom)
                    ->where('product.For_Sale', $type_ark)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.Bathrooms', $Bathroom)
                    ->where('product.For_Sale', $type_ark)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }elseif($Bedrooms == null && $Bathroom != null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')


                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.Bathrooms', $Bathroom)
                    ->where('product.For_Sale', $type_ark)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')


                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->where('product.Bathrooms', $Bathroom)
                    ->where('product.For_Sale', $type_ark)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }elseif($Bedrooms != null && $Bathroom == null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')


                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.For_Sale', $type_ark)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')


                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.For_Sale', $type_ark)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->count();

                    //dd($home);

                  }else{

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }





                //
                }else{

                  if($Bedrooms != null && $Bathroom != null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')


                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.Bathrooms', $Bathroom)
                    ->where('product.For_Sale', $type_ark)
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')


                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.Bathrooms', $Bathroom)
                    ->where('product.For_Sale', $type_ark)
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }elseif($Bedrooms == null && $Bathroom != null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')


                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.Bathrooms', $Bathroom)
                    ->where('product.For_Sale', $type_ark)
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')


                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.Bathrooms', $Bathroom)
                    ->where('product.For_Sale', $type_ark)
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }elseif($Bedrooms != null && $Bathroom == null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')


                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.For_Sale', $type_ark)
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);
                    dd($home);
                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')


                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.For_Sale', $type_ark)
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }else{

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }

                }


                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////














      }elseif($ark == NULL && $type_home != NULL){





        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



                if($min_price != NULL){
                  if($max_price == NULL){
                    $max_price = 100000000;
                  }


                  if($Bedrooms != null && $Bathroom != null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.Bathrooms', $Bathroom)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.Bathrooms', $Bathroom)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }elseif($Bedrooms == null && $Bathroom != null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bathrooms', $Bathroom)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bathrooms', $Bathroom)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }elseif($Bedrooms != null && $Bathroom == null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->count();

                    //dd($home);

                  }else{

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }





                //
                }else{

                  if($Bedrooms != null && $Bathroom != null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.Bathrooms', $Bathroom)
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.Bathrooms', $Bathroom)
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }elseif($Bedrooms == null && $Bathroom != null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bathrooms', $Bathroom)
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bathrooms', $Bathroom)
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }elseif($Bedrooms != null && $Bathroom == null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }else{

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.For_Sale', $type_ark)
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }

                }


                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





      }else{



        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



                if($min_price != NULL){
                  if($max_price == NULL){
                    $max_price = 100000000;
                  }


                  if($Bedrooms != null && $Bathroom != null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.Bathrooms', $Bathroom)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.Bathrooms', $Bathroom)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }elseif($Bedrooms == null && $Bathroom != null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bathrooms', $Bathroom)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bathrooms', $Bathroom)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }elseif($Bedrooms != null && $Bathroom == null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->count();

                    //dd($home);

                  }else{

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->whereBetween('product.Price', [$min_price, $max_price])
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }





                //
                }else{

                  if($Bedrooms != null && $Bathroom != null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.Bathrooms', $Bathroom)
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->where('product.Bathrooms', $Bathroom)
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }elseif($Bedrooms == null && $Bathroom != null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bathrooms', $Bathroom)
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bathrooms', $Bathroom)
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }elseif($Bedrooms != null && $Bathroom == null){

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->where('product.Bedrooms', $Bedrooms)
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }else{

                    $home = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->orderBy('product.id', 'desc')
                    ->paginate(8);

                    $home_count = DB::table('categorys')
                    ->select(
                    'categorys.*',
                    'categorys.name as cat_name*',
                    'product.*',
                    'amphures.AMPHUR_NAME_ENG'
                    )
                    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
                    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
                    ->where('categorys.id', $type_home)
                    ->where('product.name', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
                    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
                    ->orWhere('product.BTS', 'like', "%$ark%")
                    ->orWhere('product.MRT', 'like', "%$ark%")
                    ->where('product.For_Sale', $type_ark)
                    ->orderBy('product.id', 'desc')
                    ->count();

                  }

                }


                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


      }

      //dd($home);

      $pagination = $home->appends ( array (
              'ark' => $ark,
              'type_ark' => $type_ark,
              'type_home' => $type_home,
              'min_price' => $min_price,
              'max_price' => $max_price,
              'Bedrooms' => $Bedrooms,
              'Bathroom' => $Bathroom
      ) );





      $data['ark'] = $ark;
      $data['type_ark'] = $type_ark;
      $data['type_home'] = $type_home;
      $data['$pagination'] = $pagination;

      $data['home_count'] = $home_count;
      $data['home'] = $home;
      //dd($home);
      return view('search', $data);
    }


    public function sort_search_property3($type_ark = 0, $sort = 0){

      $setting_id = 1;
      $setting = setting::find($setting_id);
      $data['setting'] = $setting;

      if($sort == 100){
      $home = DB::table('categorys')
      ->select(
      'categorys.*',
      'categorys.name as cat_name*',
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('product.For_Sale', $type_ark)
      ->orderBy('product.Status', 'desc')
      ->paginate(8);


      $home_count = DB::table('categorys')
      ->select(
      'categorys.*',
      'categorys.name as cat_name*',
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('product.For_Sale', $type_ark)
      ->count();
    }



    if($sort == 101){
    $home = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
    ->where('product.For_Sale', $type_ark)
    ->orderBy('product.view', 'desc')
    ->paginate(8);


    $home_count = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
    ->where('product.For_Sale', $type_ark)
    ->count();
  }


  if($sort == 102){
  $home = DB::table('categorys')
  ->select(
  'categorys.*',
  'categorys.name as cat_name*',
  'product.*',
  'amphures.AMPHUR_NAME_ENG'
  )
  ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
  ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
  ->where('product.For_Sale', $type_ark)
  ->orderBy('product.Price', 'asc')
  ->paginate(8);


  $home_count = DB::table('categorys')
  ->select(
  'categorys.*',
  'categorys.name as cat_name*',
  'product.*',
  'amphures.AMPHUR_NAME_ENG'
  )
  ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
  ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
  ->where('product.For_Sale', $type_ark)
  ->count();
}


if($sort == 103){
$home = DB::table('categorys')
->select(
'categorys.*',
'categorys.name as cat_name*',
'product.*',
'amphures.AMPHUR_NAME_ENG'
)
->leftjoin('product', 'product.category_id', '=', 'categorys.id')
->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
->where('product.For_Sale', $type_ark)
->orderBy('product.Price', 'desc')
->paginate(8);


$home_count = DB::table('categorys')
->select(
'categorys.*',
'categorys.name as cat_name*',
'product.*',
'amphures.AMPHUR_NAME_ENG'
)
->leftjoin('product', 'product.category_id', '=', 'categorys.id')
->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
->where('product.For_Sale', $type_ark)
->count();
}


if($sort == 104){
$home = DB::table('categorys')
->select(
'categorys.*',
'categorys.name as cat_name*',
'product.*',
'amphures.AMPHUR_NAME_ENG'
)
->leftjoin('product', 'product.category_id', '=', 'categorys.id')
->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
->where('product.For_Sale', $type_ark)
->orderBy('product.updated_at', 'desc')
->paginate(8);


$home_count = DB::table('categorys')
->select(
'categorys.*',
'categorys.name as cat_name*',
'product.*',
'amphures.AMPHUR_NAME_ENG'
)
->leftjoin('product', 'product.category_id', '=', 'categorys.id')
->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
->where('product.For_Sale', $type_ark)
->count();
}


    $categorys = DB::table('categorys')->get();
    $data['category'] = $categorys;

    $data['ark'] = NULL;
    $data['type_ark'] = $type_ark;
    $data['type_home'] = NULL;
    $data['sort'] = $sort;

    $data['home_count'] = $home_count;
    $data['home'] = $home;

    //dd($home);
    return view('search', $data);


    }


    public function sort_search_property($type_ark = 0, $type_home = 0, $ark = 'text', $sort = 0){

      $setting_id = 1;
      $setting = setting::find($setting_id);
      $data['setting'] = $setting;

      if($sort == 100){
      $home = DB::table('categorys')
      ->select(
      'categorys.*',
      'categorys.name as cat_name*',
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('categorys.id', $type_home)

      ->where('product.name', 'like', "%$ark%")
      ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
      ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
      ->orWhere('product.BTS', 'like', "%$ark%")
      ->orWhere('product.MRT', 'like', "%$ark%")
      ->where('product.For_Sale', $type_ark)
      ->orderBy('product.Status', 'desc')
      ->paginate(8);


      $home_count = DB::table('categorys')
      ->select(
      'categorys.*',
      'categorys.name as cat_name*',
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('categorys.id', $type_home)

      ->where('product.name', 'like', "%$ark%")
      ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
      ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
      ->orWhere('product.BTS', 'like', "%$ark%")
      ->orWhere('product.MRT', 'like', "%$ark%")
      ->where('product.For_Sale', $type_ark)
      ->count();
    }


    if($sort == 101){

    $home = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
    ->where('categorys.id', $type_home)

    ->where('product.name', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
    ->orWhere('product.BTS', 'like', "%$ark%")
    ->orWhere('product.MRT', 'like', "%$ark%")
    ->where('product.For_Sale', $type_ark)
    ->orderBy('product.view', 'desc')
    ->paginate(8);


    $home_count = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
    ->where('categorys.id', $type_home)

    ->where('product.name', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
    ->orWhere('product.BTS', 'like', "%$ark%")
    ->orWhere('product.MRT', 'like', "%$ark%")
    ->where('product.For_Sale', $type_ark)
    ->count();
  }


  if($sort == 102){
  $home = DB::table('categorys')
  ->select(
  'categorys.*',
  'categorys.name as cat_name*',
  'product.*',
  'amphures.AMPHUR_NAME_ENG'
  )
  ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
  ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
  ->where('categorys.id', $type_home)

  ->where('product.name', 'like', "%$ark%")
  ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
  ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
  ->orWhere('product.BTS', 'like', "%$ark%")
  ->orWhere('product.MRT', 'like', "%$ark%")
  ->where('product.For_Sale', $type_ark)
  ->orderBy('product.Price', 'asc')
  ->paginate(8);


  $home_count = DB::table('categorys')
  ->select(
  'categorys.*',
  'categorys.name as cat_name*',
  'product.*',
  'amphures.AMPHUR_NAME_ENG'
  )
  ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
  ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
  ->where('categorys.id', $type_home)

  ->where('product.name', 'like', "%$ark%")
  ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
  ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
  ->orWhere('product.BTS', 'like', "%$ark%")
  ->orWhere('product.MRT', 'like', "%$ark%")
  ->where('product.For_Sale', $type_ark)
  ->count();
}


if($sort == 103){
$home = DB::table('categorys')
->select(
'categorys.*',
'categorys.name as cat_name*',
'product.*',
'amphures.AMPHUR_NAME_ENG'
)
->leftjoin('product', 'product.category_id', '=', 'categorys.id')
->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
->where('categorys.id', $type_home)
->where('product.name', 'like', "%$ark%")
->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
->orWhere('product.BTS', 'like', "%$ark%")
->orWhere('product.MRT', 'like', "%$ark%")
->where('product.For_Sale', $type_ark)
->orderBy('product.Price', 'desc')
->paginate(8);


$home_count = DB::table('categorys')
->select(
'categorys.*',
'categorys.name as cat_name*',
'product.*',
'amphures.AMPHUR_NAME_ENG'
)
->leftjoin('product', 'product.category_id', '=', 'categorys.id')
->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
->where('categorys.id', $type_home)

->where('product.name', 'like', "%$ark%")
->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
->orWhere('product.BTS', 'like', "%$ark%")
->orWhere('product.MRT', 'like', "%$ark%")
->where('product.For_Sale', $type_ark)
->count();
}


if($sort == 104){
$home = DB::table('categorys')
->select(
'categorys.*',
'categorys.name as cat_name*',
'product.*',
'amphures.AMPHUR_NAME_ENG'
)
->leftjoin('product', 'product.category_id', '=', 'categorys.id')
->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
->where('categorys.id', $type_home)

->where('product.name', 'like', "%$ark%")
->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
->orWhere('product.BTS', 'like', "%$ark%")
->orWhere('product.MRT', 'like', "%$ark%")
->where('product.For_Sale', $type_ark)
->orderBy('product.updated_at', 'desc')
->paginate(8);


$home_count = DB::table('categorys')
->select(
'categorys.*',
'categorys.name as cat_name*',
'product.*',
'amphures.AMPHUR_NAME_ENG'
)
->leftjoin('product', 'product.category_id', '=', 'categorys.id')
->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
->where('categorys.id', $type_home)

->where('product.name', 'like', "%$ark%")
->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
->orWhere('product.BTS', 'like', "%$ark%")
->orWhere('product.MRT', 'like', "%$ark%")
->where('product.For_Sale', $type_ark)
->count();
}

$categorys = DB::table('categorys')->get();
$data['category'] = $categorys;


$data['ark'] = $ark;
$data['type_ark'] = $type_ark;
$data['type_home'] = $type_home;
$data['sort'] = $sort;

$data['home_count'] = $home_count;
$data['home'] = $home;
return view('search', $data);

    }








    public function sort_search_property1($type_ark = 0, $ark = 'text', $sort = 0){

      $setting_id = 1;
      $setting = setting::find($setting_id);
      $data['setting'] = $setting;

      if($sort == 100){
      $home = DB::table('categorys')
      ->select(
      'categorys.*',
      'categorys.name as cat_name*',
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

      ->where('product.name', 'like', "%$ark%")
      ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
      ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
      ->orWhere('product.BTS', 'like', "%$ark%")
      ->orWhere('product.MRT', 'like', "%$ark%")
      ->where('product.For_Sale', $type_ark)
      ->orderBy('product.Status', 'desc')
      ->paginate(8);


      $home_count = DB::table('categorys')
      ->select(
      'categorys.*',
      'categorys.name as cat_name*',
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

      ->where('product.name', 'like', "%$ark%")
      ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
      ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
      ->orWhere('product.BTS', 'like', "%$ark%")
      ->orWhere('product.MRT', 'like', "%$ark%")
      ->where('product.For_Sale', $type_ark)
      ->count();
    }


    if($sort == 101){
    $home = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
    ->where('product.name', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
    ->orWhere('product.BTS', 'like', "%$ark%")
    ->orWhere('product.MRT', 'like', "%$ark%")
    ->where('product.For_Sale', $type_ark)
    ->orderBy('product.view', 'desc')
    ->paginate(8);


    $home_count = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

    ->where('product.name', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
    ->orWhere('product.BTS', 'like', "%$ark%")
    ->orWhere('product.MRT', 'like', "%$ark%")
    ->where('product.For_Sale', $type_ark)
    ->count();
    }


    if($sort == 102){
    $home = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

    ->where('product.name', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
    ->orWhere('product.BTS', 'like', "%$ark%")
    ->orWhere('product.MRT', 'like', "%$ark%")
    ->where('product.For_Sale', $type_ark)
    ->orderBy('product.Price', 'asc')
    ->paginate(8);


    $home_count = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

    ->where('product.name', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
    ->orWhere('product.BTS', 'like', "%$ark%")
    ->orWhere('product.MRT', 'like', "%$ark%")
    ->where('product.For_Sale', $type_ark)
    ->count();
    }


    if($sort == 103){
    $home = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

    ->where('product.name', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
    ->orWhere('product.BTS', 'like', "%$ark%")
    ->orWhere('product.MRT', 'like', "%$ark%")
    ->where('product.For_Sale', $type_ark)
    ->orderBy('product.Price', 'desc')
    ->paginate(8);


    $home_count = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

    ->where('product.name', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
    ->orWhere('product.BTS', 'like', "%$ark%")
    ->orWhere('product.MRT', 'like', "%$ark%")
    ->where('product.For_Sale', $type_ark)
    ->count();
    }


    if($sort == 104){
    $home = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

    ->where('product.name', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
    ->orWhere('product.BTS', 'like', "%$ark%")
    ->orWhere('product.MRT', 'like', "%$ark%")
    ->where('product.For_Sale', $type_ark)
    ->orderBy('product.updated_at', 'desc')
    ->paginate(8);


    $home_count = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

    ->where('product.name', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
    ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
    ->orWhere('product.BTS', 'like', "%$ark%")
    ->orWhere('product.MRT', 'like', "%$ark%")
    ->where('product.For_Sale', $type_ark)
    ->count();
    }

    $categorys = DB::table('categorys')->get();
    $data['category'] = $categorys;


    $data['ark'] = $ark;
    $data['type_ark'] = $type_ark;
    $data['type_home'] = NULL;
    $data['sort'] = $sort;

    $data['home_count'] = $home_count;
    $data['home'] = $home;
    return view('search', $data);

    }








    public function sort_search_property2($type_ark = 0, $type_home = 0, $sort = 0){

      $setting_id = 1;
      $setting = setting::find($setting_id);
      $data['setting'] = $setting;

      if($sort == 100){
      $home = DB::table('categorys')
      ->select(
      'categorys.*',
      'categorys.name as cat_name*',
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('categorys.id', $type_home)
      ->where('product.For_Sale', $type_ark)
      ->orderBy('product.Status', 'desc')
      ->paginate(8);


      $home_count = DB::table('categorys')
      ->select(
      'categorys.*',
      'categorys.name as cat_name*',
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('categorys.id', $type_home)
      ->where('product.For_Sale', $type_ark)
      ->count();
    }


    if($sort == 101){

    $home = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
    ->where('categorys.id', $type_home)
    ->where('product.For_Sale', $type_ark)
    ->orderBy('product.view', 'desc')
    ->paginate(8);


    $home_count = DB::table('categorys')
    ->select(
    'categorys.*',
    'categorys.name as cat_name*',
    'product.*',
    'amphures.AMPHUR_NAME_ENG'
    )
    ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
    ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
    ->where('categorys.id', $type_home)
    ->where('product.For_Sale', $type_ark)
    ->count();
  }


  if($sort == 102){
  $home = DB::table('categorys')
  ->select(
  'categorys.*',
  'categorys.name as cat_name*',
  'product.*',
  'amphures.AMPHUR_NAME_ENG'
  )
  ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
  ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
  ->where('categorys.id', $type_home)
  ->where('product.For_Sale', $type_ark)
  ->orderBy('product.Price', 'asc')
  ->paginate(8);


  $home_count = DB::table('categorys')
  ->select(
  'categorys.*',
  'categorys.name as cat_name*',
  'product.*',
  'amphures.AMPHUR_NAME_ENG'
  )
  ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
  ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
  ->where('categorys.id', $type_home)
  ->where('product.For_Sale', $type_ark)
  ->count();
}


if($sort == 103){
$home = DB::table('categorys')
->select(
'categorys.*',
'categorys.name as cat_name*',
'product.*',
'amphures.AMPHUR_NAME_ENG'
)
->leftjoin('product', 'product.category_id', '=', 'categorys.id')
->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
->where('categorys.id', $type_home)
->where('product.For_Sale', $type_ark)
->orderBy('product.Price', 'desc')
->paginate(8);


$home_count = DB::table('categorys')
->select(
'categorys.*',
'categorys.name as cat_name*',
'product.*',
'amphures.AMPHUR_NAME_ENG'
)
->leftjoin('product', 'product.category_id', '=', 'categorys.id')
->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
->where('categorys.id', $type_home)
->where('product.For_Sale', $type_ark)
->count();
}


if($sort == 104){
$home = DB::table('categorys')
->select(
'categorys.*',
'categorys.name as cat_name*',
'product.*',
'amphures.AMPHUR_NAME_ENG'
)
->leftjoin('product', 'product.category_id', '=', 'categorys.id')
->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
->where('categorys.id', $type_home)
->where('product.For_Sale', $type_ark)
->orderBy('product.updated_at', 'desc')
->paginate(8);


$home_count = DB::table('categorys')
->select(
'categorys.*',
'categorys.name as cat_name*',
'product.*',
'amphures.AMPHUR_NAME_ENG'
)
->leftjoin('product', 'product.category_id', '=', 'categorys.id')
->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
->where('categorys.id', $type_home)
->where('product.For_Sale', $type_ark)
->count();
}

$categorys = DB::table('categorys')->get();
$data['category'] = $categorys;


$data['ark'] = NULL;
$data['type_ark'] = $type_ark;
$data['type_home'] = $type_home;
$data['sort'] = $sort;

$data['home_count'] = $home_count;
$data['home'] = $home;
return view('search', $data);

    }









}
