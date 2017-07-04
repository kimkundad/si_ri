<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cat = DB::table('categorys')->select(
            'categorys.*'
            )
            ->get();

            $s = 1;
            foreach ($cat as $obj) {
                $optionsRes = [];
                $options = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('product.category_id', $obj->id)
                  ->count();

                     $optionsRes['count'] = $options;

                $obj->options = $options;
              }
              $data['objs'] = $cat;
              $data['datahead'] = "จัดการหมวดหมู่";
      return view('admin.category.index', $data);

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
    $obj = category::find($id);
    $data['url'] = url('admin/category/'.$id);
    $data['header'] = "แก้ไขหมวดหมู่";
    $data['method'] = "put";
    $data['objs'] = $obj;
    return view('admin.category.edit', $data);
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
      $image = $request->file('image');



   if($image == NULL){

     $this->validate($request, [
           'name_category' => 'required'
       ]);

       $package = category::find($id);
        $package->name = $request['name_category'];
        $package->save();

      return redirect(url('admin/category/'.$id.'/edit'))->with('success','แก้ไขหมวดหมู่ '.$request['name_category'].' สำเร็จ');


   }else{

        $this->validate($request, [
             'image' => 'required|mimes:jpg,jpeg,png,gif|max:4048',
             'name_category' => 'required'
         ]);

         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $destinationPath = asset('assets/cusimage/');
          $img = Image::make($image->getRealPath());
          $img->resize(1920, 450, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/cusimage/'.$input['imagename']);

        $package = category::find($id);
         $package->name = $request['name_category'];
         $package->image = $input['imagename'];
         $package->save();

         return redirect(url('admin/category/'.$id.'/edit'))->with('success','แก้ไขหมวดหมู่ '.$request['name_category'].' สำเร็จ');

   }




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
