<?php

namespace App\Http\Controllers;

error_reporting(E_ALL);
ini_set('display_errors', 1);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\product;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

class ContactController extends Controller
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

    public function contact_2(Request $request){
      $this->validate($request, [
           'name' => 'required',
           'email' => 'required',
           'detail' => 'required',
           'id_product' => 'required',
           'g-recaptcha-response' => 'required'
       ]);

       $token = $request->input('g-recaptcha-response');
       if ($token) {


       $obj = DB::table('contacts')->insert(
           [
             'id_product' => $request['id_product'],
             'name' => $request['name'],
             'email' => $request['email'],
             'phone' => $request['phone'],
             'detail' => $request['detail'],
             'created_at' => new \DateTime()
           ]
         );

         $package = DB::table('product')
         ->select(
         'product.*'
         )
         ->where('product.id', $request['id_product'])
         ->first();

        // dd($package);

         // send email
           $data_toview = array();
         //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
           date_default_timezone_set("Asia/Bangkok");
           $data_toview['id'] = $package->id;
           $data_toview['name_pro'] = $package->name;
           $data_toview['price'] = $package->Price;
           $data_toview['image'] = $package->image;
           $data_toview['name'] = $request['name'];
           $data_toview['email'] = $request['email'];
           $data_toview['phone'] = $request['phone'];
           $data_toview['detail'] = $request['detail'];
           $data_toview['datatime'] = date("d-m-Y H:i:s");

           $email_sender   = 'infosirispace@gmail.com';
           $email_pass     = 'siri2017';

       /*    $email_sender   = 'info@acmeinvestor.com';
           $email_pass     = 'Iaminfoacmeinvestor';  */
           $email_to       =  'siri@sirispace.com';
           //echo $admins[$idx]['email'];
           // Backup your default mailer
           $backup = \Mail::getSwiftMailer();

           try{

                       //https://accounts.google.com/DisplayUnlockCaptcha
                       // Setup your gmail mailer
                       $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'SSL');
                       $transport->setUsername($email_sender);
                       $transport->setPassword($email_pass);

                       // Any other mailer configuration stuff needed...
                       $gmail = new Swift_Mailer($transport);

                       // Set the mailer as gmail
                       \Mail::setSwiftMailer($gmail);

                       $data['emailto'] = $email_to;
                       $data['sender'] = $email_sender;
                       //Sender dan Reply harus sama

                       Mail::send('mails.contact_2', $data_toview, function($message) use ($data)
                       {
                           $message->from($data['sender'], 'มีข้อความจาก sirispace');
                           $message->to($data['emailto'])
                           ->replyTo($data['emailto'], 'มีข้อความจาก sirispace.')
                           ->subject('มีข้อความจาก sirispace.com เข้าสู่ะบบ');

                           //echo 'Confirmation email after registration is completed.';
                       });



           }catch(\Swift_TransportException $e){
               $response = $e->getMessage() ;
               echo $response;

           }


           // Restore your original mailer
           Mail::setSwiftMailer($backup);
           // send email





         return redirect(url('asset-'.$package->id))->with('success_contact','คุณทำการเพิ่มอสังหา สำเร็จ');
       } else {
         echo "No";
       }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function refer(Request $request)
     {
       $cashback = $request->input('cashback');

       $this->validate($request, [
            'cashback' => 'required'
        ]);

       if($cashback == 1){



         $this->validate($request, [
              'name' => 'required',
              'email' => 'required',
              'detail' => 'required',
              'g-recaptcha-response' => 'required'
          ]);
          $token = $request->input('g-recaptcha-response');

          if ($token) {


          $obj = DB::table('contacts')->insert(
              [
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'detail' => $request['detail'],
                'created_at' => new \DateTime()
              ]
            );

            // send email
              $data_toview = array();
            //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
              date_default_timezone_set("Asia/Bangkok");
              $data_toview['name'] = $request['name'];
              $data_toview['email'] = $request['email'];
              $data_toview['phone'] = $request['phone'];
              $data_toview['detail'] = $request['detail'];
              $data_toview['datatime'] = date("d-m-Y H:i:s");

              $email_sender   = 'infosirispace@gmail.com';
              $email_pass     = 'siri2017';

          /*    $email_sender   = 'info@acmeinvestor.com';
              $email_pass     = 'Iaminfoacmeinvestor';  */
              $email_to       =  'siri@sirispace.com';
              //echo $admins[$idx]['email'];
              // Backup your default mailer
              $backup = \Mail::getSwiftMailer();
              try{
                          //https://accounts.google.com/DisplayUnlockCaptcha
                          // Setup your gmail mailer
                          $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'SSL');
                          $transport->setUsername($email_sender);
                          $transport->setPassword($email_pass);

                          // Any other mailer configuration stuff needed...
                          $gmail = new Swift_Mailer($transport);

                          // Set the mailer as gmail
                          \Mail::setSwiftMailer($gmail);

                          $data['emailto'] = $email_to;
                          $data['sender'] = $email_sender;
                          //Sender dan Reply harus sama

                          Mail::send('mails.contact', $data_toview, function($message) use ($data)
                          {
                              $message->from($data['sender'], 'มีข้อความจาก sirispace');
                              $message->to($data['emailto'])
                              ->replyTo($data['emailto'], 'มีข้อความจาก sirispace.')
                              ->subject('มีข้อความจาก sirispace.com เข้าสู่ะบบ');

                              //echo 'Confirmation email after registration is completed.';
                          });

              }catch(\Swift_TransportException $e){
                  $response = $e->getMessage() ;
                  echo $response;
              }

              // Restore your original mailer
              Mail::setSwiftMailer($backup);
              // send email

            return redirect(url('contact_success'));
        	} else {
        		echo "No";
        	}




       }else{




         $this->validate($request, [
              'name' => 'required',
              'email' => 'required',
              'email' => 'required',
              'name_contact' => 'required',
              'email_contact' => 'required',
              'phone_contact' => 'required',
              'detail' => 'required',
              'g-recaptcha-response' => 'required'
          ]);
          $token = $request->input('g-recaptcha-response');

          if ($token) {


          $obj = DB::table('contacts')->insert(
              [
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'detail' => $request['detail'],
                'type_contact' => 2,
                'f_name' => $request['name_contact'],
                'f_email' => $request['email_contact'],
                'f_phone' => $request['phone_contact'],
                'created_at' => new \DateTime()
              ]
            );

            // send email
              $data_toview = array();
            //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
              date_default_timezone_set("Asia/Bangkok");
              $data_toview['name'] = $request['name'];
              $data_toview['email'] = $request['email'];
              $data_toview['phone'] = $request['phone'];
              $data_toview['detail'] = $request['detail'];

              $data_toview['f_name'] = $request['name_contact'];
              $data_toview['f_email'] = $request['email_contact'];
              $data_toview['f_phone'] = $request['phone_contact'];

              $data_toview['datatime'] = date("d-m-Y H:i:s");

              $email_sender   = 'infosirispace@gmail.com';
              $email_pass     = 'siri2017';

          /*    $email_sender   = 'info@acmeinvestor.com';
              $email_pass     = 'Iaminfoacmeinvestor';  */
              $email_to       =  'siri@sirispace.com';
              //echo $admins[$idx]['email'];
              // Backup your default mailer
              $backup = \Mail::getSwiftMailer();
              try{
                          //https://accounts.google.com/DisplayUnlockCaptcha
                          // Setup your gmail mailer
                          $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'SSL');
                          $transport->setUsername($email_sender);
                          $transport->setPassword($email_pass);

                          // Any other mailer configuration stuff needed...
                          $gmail = new Swift_Mailer($transport);

                          // Set the mailer as gmail
                          \Mail::setSwiftMailer($gmail);

                          $data['emailto'] = $email_to;
                          $data['sender'] = $email_sender;
                          //Sender dan Reply harus sama

                          Mail::send('mails.contact_refer', $data_toview, function($message) use ($data)
                          {
                              $message->from($data['sender'], 'มีข้อความจาก sirispace');
                              $message->to($data['emailto'])
                              ->replyTo($data['emailto'], 'มีข้อความจาก sirispace.')
                              ->subject('มีข้อความจาก sirispace.com เข้าสู่ะบบ');

                              //echo 'Confirmation email after registration is completed.';
                          });

              }catch(\Swift_TransportException $e){
                  $response = $e->getMessage() ;
                  echo $response;
              }

              // Restore your original mailer
              Mail::setSwiftMailer($backup);
              // send email

            return redirect(url('contact_success'));
        	} else {
        		echo "No";
        	}



       }






     }





     public function store(Request $request)
     {
       $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'detail' => 'required',
            'g-recaptcha-response' => 'required'
        ]);
        $token = $request->input('g-recaptcha-response');

        if ($token) {


        $obj = DB::table('contacts')->insert(
            [
              'name' => $request['name'],
              'email' => $request['email'],
              'phone' => $request['phone'],
              'detail' => $request['detail'],
              'created_at' => new \DateTime()
            ]
          );


          // send email
            $data_toview = array();
          //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
            date_default_timezone_set("Asia/Bangkok");
            $data_toview['name'] = $request['name'];
            $data_toview['email'] = $request['email'];
            $data_toview['phone'] = $request['phone'];
            $data_toview['detail'] = $request['detail'];
            $data_toview['datatime'] = date("d-m-Y H:i:s");

            $email_sender   = 'infosirispace@gmail.com';
            $email_pass     = 'siri2017';

        /*    $email_sender   = 'info@acmeinvestor.com';
            $email_pass     = 'Iaminfoacmeinvestor';  */
          //  $email_to       =  'siri@sirispace.com';
          $email_to       =  'siri@sirispace.com';
            //echo $admins[$idx]['email'];
            // Backup your default mailer
            $backup = \Mail::getSwiftMailer();

            try{

                        //https://accounts.google.com/DisplayUnlockCaptcha
                        // Setup your gmail mailer
                        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'SSL');
                        $transport->setUsername($email_sender);
                        $transport->setPassword($email_pass);

                        // Any other mailer configuration stuff needed...
                        $gmail = new Swift_Mailer($transport);

                        // Set the mailer as gmail
                        \Mail::setSwiftMailer($gmail);

                        $data['emailto'] = $email_to;

                        //dd($data['emailto']);
                        $data['sender'] = $email_sender;
                        //Sender dan Reply harus sama

                        Mail::send('mails.contact', $data_toview, function($message) use ($data)
                        {
                            $message->from($data['sender'], 'มีข้อความจาก sirispace');
                            $message->to($data['emailto'])
                            ->replyTo($data['emailto'], 'มีข้อความจาก sirispace.')
                            ->subject('มีข้อความจาก sirispace.com เข้าสู่ะบบ');

                            //echo 'Confirmation email after registration is completed.';
                        });



            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
                echo $response;

            }


            // Restore your original mailer
            Mail::setSwiftMailer($backup);
            // send email




        //  return redirect(url('contact_success'));
      	} else {
      		echo "No";
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
