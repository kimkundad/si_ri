<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\setting;

class CategoryController extends Controller
{


    public function siri_recommend(){

      $setting_id = 1;
      $setting = setting::find($setting_id);
      $data['setting'] = $setting;

      $home = DB::table('product')
      ->select(
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('product.first_index', 2)
      ->orderBy('id', 'desc')
      ->paginate(12);
      $data['home'] = $home;
      return view('siri_recommend', $data);
    }

    public function recent_updates(){

      $setting_id = 1;
      $setting = setting::find($setting_id);
      $data['setting'] = $setting;

      $home_top = DB::table('product')
      ->select(
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('product.hot_index', 2)
      ->orderBy('id', 'desc')
      //->inRandomOrder()
      ->paginate(12);

      $data['home'] = $home_top;
      return view('recent_updates', $data);

    }

    public function property($rent = 0, $type = 0){

      $setting_id = 1;
      $setting = setting::find($setting_id);
      $data['setting'] = $setting;

      $cat_name = DB::table('categorys')
      ->select(
      'categorys.*'
      )
      ->where('categorys.id', $type)
      ->first();

      $home = DB::table('categorys')
      ->select(
      'categorys.*',
      'categorys.name as cat_name*',
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('product', 'product.category_id', '=', 'categorys.id')
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('categorys.id', $type)
      ->where('product.For_Sale', $rent)
      ->orderBy('product.id', 'desc')
      ->paginate(8);
      //dd($cat_name);
      $data['rent'] = $rent;
      $data['type'] = $type;


      $data['cat_name'] = $cat_name;
      $data['home'] = $home;
      //dd($home);
      return view('category', $data);

    }

    public function sort_property($rent = 0, $type = 0, $sort = 0){

      $setting_id = 1;
      $setting = setting::find($setting_id);
      $data['setting'] = $setting;

      $cat_name = DB::table('categorys')
      ->select(
      'categorys.*'
      )
      ->where('categorys.id', $type)
      ->first();

      $data['cat_name'] = $cat_name;
      $data['rent'] = $rent;
      $data['type'] = $type;
      $data['sort'] = $sort;

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
        ->where('categorys.id', $type)
        ->where('product.For_Sale', $rent)
        ->orderBy('product.Status', 'desc')
        ->paginate(8);

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
        ->where('categorys.id', $type)
        ->where('product.For_Sale', $rent)
        ->orderBy('product.view', 'desc')
        ->paginate(8);

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
        ->where('categorys.id', $type)
        ->where('product.For_Sale', $rent)
        ->orderBy('product.Price', 'asc')
        ->paginate(8);

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
        ->where('categorys.id', $type)
        ->where('product.For_Sale', $rent)
        ->orderBy('product.Price', 'desc')
        ->paginate(8);

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
        ->where('categorys.id', $type)
        ->where('product.For_Sale', $rent)
        ->orderBy('product.last_update', 'desc')
        ->paginate(8);

      }

      $data['home'] = $home;
      return view('category', $data);

    }

}
