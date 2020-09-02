
<!DOCTYPE html>
<html lang="en">

  <head>
  	<title>@yield('title')</title>
    @include('theme.backoffice.layouts.includes.head')
  </head>
  <body>
    <!-- Start Page Loading -->
    @include('theme.backoffice.layouts.includes.loader')
    <!-- End Page Loading -->
    <!-- START HEADER -->
    @include('theme.backoffice.layouts.includes.header')
    <!-- END HEADER -->
    <!-- START MAIN -->
    <div id="main">
      <div class="wrapper">
         @include('theme.backoffice.layouts.includes.left-sidebar')
        <section id="content">
          <div class="container">
            @yield('content')
          </div>
        </section>

      </div>
    </div>
    <!-- END MAIN -->
    <!-- START FOOTER -->
    @include('theme.backoffice.layouts.includes.footer')
    <!-- END FOOTER -->
    @include('theme.backoffice.layouts.includes.foot')
  </body>
</html>