<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\City;
use Illuminate\Support\Facades\Input;

class ProvincesController extends Controller
{


  public function exampleModel()
  {
      $countCity = City::where('PROVINCE_ID', '=', Input::get('PROVINCE_ID'))->count();
      if(!empty($countCity))
      {
          $dataCity = City::where('PROVINCE_ID', '=', Input::get('PROVINCE_ID'))->get();
          foreach ($dataCity as $rowCity) {
              echo '<option value="' . $rowCity->AMPHUR_ID .'">' . $rowCity->AMPHUR_NAME_ENG .'</option>';
          }
      }else{
          echo '<option value="">--ไม่พบข้อมูล--</option>';
      }
  }
}
