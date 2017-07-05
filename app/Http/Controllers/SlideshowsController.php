<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slideshow;
use Illuminate\Support\Facades\DB;

class SlideshowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = DB::table('slideshows')->select(
              'slideshows.*'
              )
              ->orderBy('id', 'desc')
              ->paginate(15);


                $data['objs'] = $cat;
                $data['datahead'] = "จัดการ slideshows";
        return view('admin.slideshows.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['header'] = 'เพิ่ม slideshows';

      $data['url'] = url('admin/slideshows');

      return view('admin.slideshows.create',$data);
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
             'image' => 'required|max:4048',
             'icon' => 'required|max:4048',
             'name' => 'required',
             'first_text' => 'required'
         ]);

      $file = $request->file('image');
       $path = 'assets/uploads/';
       $filename = time()."-".$file->getClientOriginalName();
       $file->move($path, $filename);


        $icon = $request->file('icon');
        $filename_icon = time()."_".$icon->getClientOriginalName();
        $icon->move($path, $filename_icon);


       $package = new slideshow;
       $package->name = $request['name'];
       $package->first_text = $request['first_text'];
       $package->secend_text = $request['secend_text'];
       $package->icon = $filename;
       $package->bg_image = $filename_icon;
       $package->save();

       return redirect(url('admin/slideshows'))->with('success_slideshows','เพิ่ม slideshows สำเร็จแล้วค่ะ');
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
      $obj = slideshow::find($id);
      $data['url'] = url('admin/slideshows/'.$id);
      $data['header'] = "แก้ไข slideshows";
      $data['method'] = "put";
      $data['objs'] = $obj;
      return view('admin.slideshows.edit', $data);
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
      $file = $request->file('image');

       $icon = $request->file('icon');

        if($file != NULL && $icon != NULL){

          $this->validate($request, [
               'image' => 'required|max:4048',
               'icon' => 'required|max:4048',
               'name' => 'required',
               'first_text' => 'required'
           ]);

        $file = $request->file('image');
         $path = 'assets/uploads/';
         $filename = time()."-".$file->getClientOriginalName();
         $file->move($path, $filename);


          $icon = $request->file('icon');
          $filename_icon = time()."_".$icon->getClientOriginalName();
          $icon->move($path, $filename_icon);


         $package = slideshow::find($id);
         $package->name = $request['name'];
         $package->first_text = $request['first_text'];
         $package->secend_text = $request['secend_text'];
         $package->icon = $filename_icon;
         $package->bg_image = $filename;
         $package->save();

         return redirect(url('admin/slideshows/'.$id.'/edit'))->with('success_slideshows','แก้ไข slideshows สำเร็จแล้วค่ะ');

        }elseif($file != NULL && $icon == NULL){

          $this->validate($request, [
               'image' => 'required|max:4048',
               'name' => 'required',
               'first_text' => 'required'
           ]);

        $file = $request->file('image');
         $path = 'assets/uploads/';
         $filename = time()."-".$file->getClientOriginalName();
         $file->move($path, $filename);



         $package = slideshow::find($id);
         $package->name = $request['name'];
         $package->first_text = $request['first_text'];
         $package->secend_text = $request['secend_text'];
         $package->bg_image = $filename;
         $package->save();

         return redirect(url('admin/slideshows/'.$id.'/edit'))->with('success_slideshows','แก้ไข slideshows สำเร็จแล้วค่ะ');

        }elseif($file == NULL && $icon != NULL){



          $this->validate($request, [
               'icon' => 'required|max:4048',
               'name' => 'required',
               'first_text' => 'required'
           ]);

         $path = 'assets/uploads/';

          $icon = $request->file('icon');
          $filename_icon = time()."_".$icon->getClientOriginalName();
          $icon->move($path, $filename_icon);

        //  dd($filename_icon);

         $package = slideshow::find($id);
         $package->name = $request['name'];
         $package->first_text = $request['first_text'];
         $package->secend_text = $request['secend_text'];
         $package->icon = $filename_icon;
         $package->save();

         return redirect(url('admin/slideshows/'.$id.'/edit'))->with('success_slideshows','แก้ไข slideshows สำเร็จแล้วค่ะ');


        }else{

          $this->validate($request, [
               'name' => 'required',
               'first_text' => 'required'
           ]);

         $package = slideshow::find($id);
         $package->name = $request['name'];
         $package->first_text = $request['first_text'];
         $package->secend_text = $request['secend_text'];

         $package->save();

         return redirect(url('admin/slideshows/'.$id.'/edit'))->with('success_slideshows','แก้ไข slideshows สำเร็จแล้วค่ะ');
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
      $objs = DB::table('slideshows')
          ->select(
             'slideshows.*'
             )
          ->where('id', $id)
          ->first();

      $file_path = 'assets/uploads/'.$objs->icon;
      unlink($file_path);

      $file_path = 'assets/uploads/'.$objs->bg_image;
      unlink($file_path);

      $obj = slideshow::find($id);
      $obj->delete();
      return redirect(url('admin/slideshows/'))->with('del_slideshows','คุณทำการลบ slideshows สำเร็จ');
    }
}
