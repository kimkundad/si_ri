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
      ->where('product.rating', '>', 3)
      ->where('product.Status', 1)
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
      ->where('product.rating', 5)
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
}
