<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = 1;
      $obj = setting::find($id);
      $data['url'] = url('admin/setting/'.$id);
      $data['header'] = "แก้ไขการตั้งค่า";
      $data['method'] = "put";
      $data['objs'] = $obj;
      return view('admin.setting.index', $data);
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
      $id = 1;
      $image = $request->file('image');



   if($image == NULL){

     $this->validate($request, [
           'name_website' => 'required',
           'title_website' => 'required',
           'detail_website' => 'required',
           'address_website' => 'required',
           'tel_website' => 'required',
           'email_website' => 'required',
           'facebook_website' => 'required',
           'twitter_website' => 'required',
           'line_website' => 'required'
       ]);

       $id = 1;

       $package = setting::find($id);
        $package->name_website = $request['name_website'];
        $package->title_website = $request['title_website'];
        $package->detail_website = $request['detail_website'];
        $package->tel_website = $request['tel_website'];
        $package->email_website = $request['email_website'];
        $package->facebook_website = $request['facebook_website'];
        $package->twitter_website = $request['twitter_website'];
        $package->line_website = $request['line_website'];
        $package->address_website = $request['address_website'];
        $package->save();

      return redirect(url('admin/setting'))->with('success','แก้ไขการตั้งค่า สำเร็จ');


     }else{


       $this->validate($request, [
             'image' => 'required|max:8048',
             'name_website' => 'required',
             'title_website' => 'required',
             'detail_website' => 'required',
             'address_website' => 'required',
             'tel_website' => 'required',
             'email_website' => 'required',
             'facebook_website' => 'required',
             'twitter_website' => 'required',
             'line_website' => 'required'
         ]);

         $id = 1;


         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $destinationPath = asset('assets/banner/');
          $img = Image::make($image->getRealPath());
          $img->resize(938, 180, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/banner/'.$input['imagename'], 80);

        //dd($input['imagename']);
        $image_web = $input['imagename'];

          $package = setting::find($id);
          $package->name_website = $request['name_website'];
          $package->title_website = $request['title_website'];
          $package->detail_website = $request['detail_website'];
          $package->tel_website = $request['tel_website'];
          $package->email_website = $request['email_website'];
          $package->facebook_website = $request['facebook_website'];
          $package->twitter_website = $request['twitter_website'];
          $package->line_website = $request['line_website'];
          $package->address_website = $request['address_website'];
          $package->image = $image_web;
          $package->save();


        return redirect(url('admin/setting'))->with('success','แก้ไขการตั้งค่า สำเร็จ');


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
