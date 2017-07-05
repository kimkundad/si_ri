<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
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

    }

    public function my_wishlist(){
      $home = DB::table('wishlists')
      ->select(
      'wishlists.*',
      'wishlists.id as id_w',
      'product.*',
      'product.id as id_p',
      'amphures.AMPHUR_NAME_ENG'
      )
      ->leftjoin('product', 'product.id', '=', 'wishlists.product_id')
      ->leftjoin('amphures', 'amphures.AMPHUR_ID', '=', 'product.amphur_id')

      ->where('wishlists.user_id', Auth::user()->id)
      ->limit(8)
      ->paginate(8);
      //dd($home);
      $data['home'] = $home;
      return view('my_wishlist', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function my_wishlist_del(Request $request)
     {
       $gallary = $request->get('product_wish');

       if (sizeof($gallary) > 0) {

         for ($i = 0; $i < sizeof($gallary); $i++) {

           DB::table('wishlists')->where('id', $gallary[$i])->delete();

         }

       }
       //dd($objs);
       return redirect(url('my_wishlist'));

     }



    public function wishlist_up(Request $request)
    {

     $product_id = $request['product_id'];


     if(isset(Auth::user()->id)){

       $obj = DB::table('wishlists')->insertGetId(
           [
             'product_id' => $product_id,
             'user_id' => Auth::user()->id
           ]
         );

         return response()->json(['status' => 200, 'success' => true, 'data' => $obj]);

     }else{

          return response()->json(['status' => 100, 'success' => false]);
     }



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
