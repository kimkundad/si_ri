<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\product;
use App\setting;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $setting_id = 1;
      $setting = setting::find($setting_id);
      $data['setting'] = $setting;

      $home = DB::table('product')
      ->select(
      'product.*',
      'product.id as id_pro',
      'product.name as name_pro',
      'categorys.*',
      'categorys.name as name_cat',
      'categorys.id as id_cat',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')
      ->leftjoin('categorys', 'categorys.id', '=', 'product.category_id')
      ->where('product.id', $id)
      ->first();

      $package = product::find($id);
      $package->view += 1;
      $package->save();

      $home_image = DB::table('product_image')
      ->select(
      'product_image.*'
      )
      ->where('product_image.product_id', $id)
      ->limit(5)
      ->get();

      $home_image_all = DB::table('product_image')
      ->select(
      'product_image.*'
      )
      ->where('product_image.product_id', $id)
      ->get();

      $home_image_count = DB::table('product_image')
      ->select(
      'product_image.*'
      )
      ->where('product_image.product_id', $id)
      ->count();


      $comment_course = DB::table('comments')
          ->select(
             'comments.*',
             'comments.id as c_id',
             'comments.created_at as created_att',
             'users.*',
             'users.id as u_id'
             )
          ->leftjoin('users', 'users.id', '=', 'comments.user_id')
          ->where('comments.course_id', $id)
          ->orderBy('c_id', 'desc')
          ->paginate(8);


          $comment_count = DB::table('comments')
              ->select(
                 'comments.*',
                 'comments.id as c_id',
                 'comments.created_at as created_att'
                 )
              ->where('comments.course_id', $id)
              ->count();


        //  dd($home_image_all);
      $data['comment_count'] = $comment_count;
      $data['comment_course'] = $comment_course;
      $data['home_image_all'] = $home_image_all;
      $data['home_image'] = $home_image;
      $data['home_image_count'] = $home_image_count;

      //dd($home_image);
      $data['home'] = $home;

    return view('product', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
