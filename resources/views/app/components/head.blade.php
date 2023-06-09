<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com">

  <title>@yield('title', 'Intellify - Your AI Companion')</title>

  <link rel="stylesheet" href="{{ asset('../assets/vendor/animate/animate.css') }}">

  <link rel="stylesheet" href="{{ asset('../assets/css/bootstrap.css') }}">

  <link rel="stylesheet" href="{{ asset('../assets/css/maicons.css') }}">

  <link rel="stylesheet" href="{{ asset('../assets/vendor/owl-carousel/css/owl.carousel.css') }}">

  <link rel="stylesheet" href="{{ asset('../assets/css/theme.css') }}">
  @yield('custom-css')
</head>