<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\bts;

class BtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $cat_bts = DB::table('cat_bts')->select(
            'cat_bts.*'
            )
            ->get();

            foreach($cat_bts as $u){

              $count_bts = DB::table('main_bts')
                    ->where('cat_bts_id', $u->id)
                    ->count();
              $u->option = $count_bts;
            }

      $cat = DB::table('main_bts')->select(
            'main_bts.*',
            'main_bts.id as ids',
            'cat_bts.*'
            )
            ->leftjoin('cat_bts', 'cat_bts.id', '=', 'main_bts.cat_bts_id')
            ->get();


            foreach($cat as $j){

              $count_product = DB::table('product')
                    ->where('BTS', $j->name_bts_en)
                    ->orWhere('MRT', $j->name_bts_en)
                    ->count();

              $j->option = $count_product;
            }



            $data['objs'] = $cat;
            $data['cat_bts'] = $cat_bts;
            $data['datahead'] = "จัดการรถไฟฟ้า";

    return view('admin.bts.index', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $cat = DB::table('cat_bts')->select(
            'cat_bts.*'
            )
            ->get();

      $data['objs'] = $cat;

        //
        $data['method'] = "post";
      $data['url'] = url('admin/bts');
      $data['datahead'] = "เพิ่มสถานี";
      return view('admin.bts.create', $data);
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

        $this->validate($request, [
       'category_id' => 'required',
       'name' => 'required'
      ]);

      $package = new bts();
      $package->cat_bts_id = $request['category_id'];
      $package->name_bts_en = $request['name'];
      $package->save();
      return redirect(url('admin/bts'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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



      $cat = DB::table('cat_bts')->select(
            'cat_bts.*'
            )
            ->get();

      $data['objs'] = $cat;

        //
        $bts = bts::find($id);


        $get_home = DB::table('product')->select(
              'product.*',
              'product.id as id_p',
              'product.name as name_p',
              'product.created_at as created_atss',
              'categorys.id as id_c',
              'categorys.name as name_c'
              )
              ->leftjoin('categorys', 'categorys.id',  'product.category_id')
              ->where('product.BTS', $bts->name_bts_en)
              ->orWhere('product.MRT', $bts->name_bts_en)
              ->orderBy('product.id', 'desc')
              ->paginate(15);


                $data['get_home'] = $get_home;


      $data['url'] = url('admin/bts/'.$id);
      $data['datahead'] = "แก้ไขสถานีรถไฟฟ้า";
      $data['method'] = "put";
      $data['bts'] = $bts;
      return view('admin.bts.edit', $data);
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
        $this->validate($request, [
       'category_id' => 'required',
       'name' => 'required'
      ]);

      $package = bts::find($id);
      $package->cat_bts_id = $request['category_id'];
      $package->name_bts_en = $request['name'];
      $package->save();
      return redirect(url('admin/bts'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
      $obj = bts::find($id);
      $obj->delete();
      return redirect(url('admin/bts/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
