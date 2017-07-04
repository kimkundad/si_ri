<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\category;

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
    public function index()
    {
      $home = DB::table('product')
      ->select(
      'product.*',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->where('product.first_index', 2)
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
      ->inRandomOrder()
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
      $ark = $request['ark'];
      $type_ark = $request['type_ark'];
      $type_home = $request['type_home'];

      $categorys = DB::table('categorys')->get();
      $data['category'] = $categorys;

      if($ark == NULL && $type_home == NULL){

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

      }elseif($ark != NULL && $type_home == NULL){
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
        ->where('product.name', 'like', "%$ark%")
        ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
        ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
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
        ->where('product.name', 'like', "%$ark%")
        ->orWhere('amphures.AMPHUR_NAME_ENG', 'like', "%$ark%")
        ->orWhere('amphures.AMPHUR_NAME', 'like', "%$ark%")
        ->orderBy('product.id', 'desc')
        ->count();

      }elseif($ark == NULL && $type_home != NULL){
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
        ->where('product.For_Sale', $type_ark)
        ->orderBy('product.id', 'desc')
        ->count();


      }

      //dd($home);


      $data['ark'] = $ark;
      $data['type_ark'] = $type_ark;
      $data['type_home'] = $type_home;


      $data['home_count'] = $home_count;
      $data['home'] = $home;
      //dd($home);
      return view('search', $data);
    }


    public function sort_search_property3($type_ark = 0, $sort = 0){

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
->orderBy('product.last_update', 'desc')
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
->where('product.For_Sale', $type_ark)
->orderBy('product.last_update', 'desc')
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
    ->where('product.For_Sale', $type_ark)
    ->orderBy('product.last_update', 'desc')
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
->orderBy('product.last_update', 'desc')
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
