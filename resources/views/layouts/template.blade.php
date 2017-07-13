<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="oocSY2-MoXZUym1JQu4kiAtdLYXCr5mVaH8QIrXbfbs">

    @if(isset($setting))
    <title>{{$setting->title_website}} || {{$setting->name_website}}</title>
    <meta name="description" content="{{$setting->detail_website}}">
    @else
    <title>The Original Real Estate CASHBACK Network | Siri Space </title>
    <meta name="description" content="SIRISPACE.com is a real estate company located in Bangkok, Thailand that helps connect property hunters with the most current database of commercial and residential properties for sale and rent, with property news and all the resources a buyer, renter or seller needs to make their next real estate decision.  SIRISPACE.com offer the first cash back program for renters, buyers or referrals in Asia.">
    @endif

    <link rel="shortcut icon" type="image/png" href="{{url('assets/image/SiriSpace-icon-x.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{url('assets/image/SiriSpace-icon-x.png')}}">

    @include('layouts.inc-style')
    @yield('stylesheet')

</head>
<body id="app-layout">



    @include('layouts.inc-header')






@yield('content')










    @include('layouts.inc-footer')

    <!-- JavaScripts -->
    @include('layouts.inc-script')
    @yield('scripts')


        </body>
</html>
