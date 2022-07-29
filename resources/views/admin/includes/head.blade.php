 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="msapplication-tap-highlight" content="no">
 <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
 <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
 <title>DFMS</title>

 <!-- Favicons-->
 <link rel="icon" href="{{ asset('admin/images/favicon/favicon-32x32.png') }}" sizes="32x32">
 <!-- Favicons-->
 <link rel="apple-touch-icon-precomposed" href="{{ asset('admin/images/favicon/apple-touch-icon-152x152.png') }}">
 <!-- For iPhone -->
 <meta name="msapplication-TileColor" content="#00bcd4">
 <meta name="msapplication-TileImage" content="{{ asset('admin/images/favicon/mstile-144x144.png') }}">
 <!-- For Windows Phone -->


 <!-- CORE CSS-->
 <link href="{{ asset('admin/css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
 <link href="{{ asset('admin/css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
 <!-- Custome CSS-->
 <link href="{{ asset('admin/css/custom/custom-style') }}.css" type="text/css" rel="stylesheet" media="screen,projection">

 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css">

 @livewireStyles

 @stack('css')

 <style>
     .primary-background-color {
         background-color: rgb(46 101 108);
     }

     .primary-text-color {
         color: rgb(46 101 108);
     }
 </style>
