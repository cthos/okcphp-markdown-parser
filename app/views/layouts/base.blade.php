<html>
    <head>
        {{ HTML::style("//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css") }}
        {{ HTML::script("//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js") }}
        {{ HTML::style("/css/base.css") }}
        @yield('head')
    </head>
    
    <body>
       <nav class="navbar navbar-default" role="navigation">
          <div class="container container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Markity</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/">Create Note</a>
                    </li>
                </ul>
            </div>
        </nav>
       
        <div class="content container">
             @if ($error = Session::get('error'))
                <div class="alert alert-danger">
                    {{{ $error }}}
                </div>
            @endif
            
            @yield('content')
        </div>
    </body>
</html>