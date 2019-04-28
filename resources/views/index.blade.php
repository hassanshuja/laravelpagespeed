<!doctype html>
<html lang="de">
    @include('head')

  <body>


    @include('navBar')
    @if($isNavigate==0)
    <div id="pageDynamic">
      {!!$dataView!!}
    </div>
    @endif
    @include('footer')

  </body>
</html>
