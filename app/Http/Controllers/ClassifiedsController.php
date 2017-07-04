<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\blog;

class ClassifiedsController extends Controller
{
    //
    public function index()
    {
      $home = DB::table('webboard_post')
      ->select(
      'webboard_post.*'
      )
      ->orderBy('id', 'desc')
      ->paginate(9);
      //dd($home);
      $data['objs'] = $home;

        return view('classifieds', $data);
    }


    public function show($id)
    {

      $package = blog::find($id);
      $package->view += 1;
      $package->save();


      $home = DB::table('webboard_post')
      ->select(
      'webboard_post.*'
      )
      ->where('id', $id)
      ->orderBy('id', 'desc')
      ->first();

      $home_list = DB::table('webboard_post')
      ->select(
      'webboard_post.*'
      )
      ->where('id', '!=', $id)
      ->orderBy('created_at', 'desc')
      ->limit(6)
      ->get();


      //dd($home);
      $data['home_list'] = $home_list;
      $data['objs'] = $home;

        return view('classifieds_detail', $data);
    }
}
