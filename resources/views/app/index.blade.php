<!DOCTYPE html>
<html lang="en">
@include('app.components.head')
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

 @include('app.components.header')

 @yield('content')

 @include('app.components.scripts')

</body>
</html>