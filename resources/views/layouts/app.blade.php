<!DOCTYPE html>
<html lang="en">
  @include('includes.style')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
      
@include('includes.navbar')
@include('includes.sidebar')
@yield('content')
@include('includes.footer')
</div>
@include('includes.script')





</body>
</html>