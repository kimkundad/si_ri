<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cat = DB::table('webboard_post')->select(
            'webboard_post.*'
            )
            ->orderBy('id', 'desc')
            ->paginate(15);


              $data['objs'] = $cat;
              $data['datahead'] = "จัดการบทความ";
      return view('admin.blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['header'] = 'เพิ่มบทความ';
      $data['method'] = 'post';
      $data['url'] = url('admin/classifieds');
      return view('admin.blog.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
         'image' => 'required|mimes:jpg,jpeg,png,gif|max:8048',
         'title' => 'required',
         'detail' => 'required',
         'blog_type' => 'required'
     ]);

     $image = $request->file('image');


     $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $destinationPath = asset('assets/blog/');
      $img = Image::make($image->getRealPath());
      $img->resize(750, 500, function ($constraint) {
      $constraint->aspectRatio();
    })->save('assets/blog/'.$input['imagename']);




     $package = new blog;
     $package->image = $input['imagename'];
     $package->subject = $request['title'];
     $package->detail = $request['detail'];
     $package->view = 0;
     $package->email = $request['blog_type'];
     $package->save();

     $the_id = $package->id;

     return redirect(url('admin/classifieds/'.$the_id.'/edit'))->with('success_blog','เพิ่มบทความสำเร็จแล้วค่ะ');

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
      $objs = blog::find($id);
      $data['objs'] = $objs;
      $data['header'] = 'แก้ไขบทความ';
      $data['url'] = url('admin/classifieds/'.$id);
      $data['method'] = "put";
      return view('admin.blog.edit',$data);
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
        'title' => 'required',
        'detail' => 'required',
        'blog_type' => 'required'
    ]);

     $package = blog::find($id);
     $package->subject = $request['title'];
     $package->detail = $request['detail'];
     $package->email = $request['blog_type'];
     $package->save();

     return redirect(url('admin/classifieds/'.$id.'/edit'))->with('success_blog_edit','แก้ไขบทความสำเร็จแล้วค่ะ');

   }else{

     $this->validate($request, [
        'image' => 'required|mimes:jpg,jpeg,png,gif|max:8048',
        'title' => 'required',
        'detail' => 'required',
        'blog_type' => 'required'
    ]);


    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

     $destinationPath = asset('assets/blog/');
     $img = Image::make($image->getRealPath());
     $img->resize(750, 500, function ($constraint) {
     $constraint->aspectRatio();
   })->save('assets/blog/'.$input['imagename']);

     $package = blog::find($id);
     $package->image = $input['imagename'];
     $package->subject = $request['title'];
     $package->detail = $request['detail'];
     $package->email = $request['blog_type'];
     $package->save();

     return redirect(url('admin/classifieds/'.$id.'/edit'))->with('success_blog_edit','แก้ไขบทความสำเร็จแล้วค่ะ');

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
      $objs = DB::table('webboard_post')
        ->select(
           'webboard_post.*',
           'webboard_post.image'
           )
        ->where('webboard_post.id', $id)
        ->first();

    $file_path = 'assets/blog/'.$objs->image;
    unlink($file_path);

    $obj = blog::find($id);
    $obj->delete();

  //  echo $objs->image;;
    return redirect(url('admin/classifieds'))
    ->with('deleteblog','ทำการลบ บทความ สำเร็จ');
    }
}
