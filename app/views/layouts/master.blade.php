<html>
    <head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    {{HTML::style('/css/bootstrap.min.css')}}
    <!-- {{HTML::style('/css/bootswatch.min.css')}} -->
    <!-- {{HTML::style('/css/main.css')}} -->
    {{HTML::script('/js/jquery.min.js')}}
    {{HTML::script('/js/bootstrap.min.js')}}
    {{HTML::script('/js/bootswatch.js')}}
  </head>
    <body>
      <div class="navbar navbar-default">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        
       </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
          <ul class="nav navbar-nav">
          

                @if(Auth::check())
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        

                      </ul>
                    </li>
                    @if(Auth::user()->email=="ratulcse27@gmail.com")
                      <li>{{ HTML::linkRoute('user.index','Users') }}</li>
                    @endif


                    <li>{{ HTML::linkRoute('user.edit','Change Info',$parameters = [Auth::user()->id]) }}</li>


                    
                    @endif
                    
                    
          
        </ul>
          <ul class="nav navbar-nav navbar-right">
            
             @if(!Auth::check())
                    
                    
                    <li>{{ HTML::linkRoute('login','Login') }}</li>
                    <li>{{ HTML::linkRoute('register','Register') }}</li>
                    @else
                        
                       <li>{{ HTML::linkRoute('logout','Logout ('.Auth::user()->username.')') }}</li> 
                    @endif
        </ul>
      </div>
    </div>
      <div id="container">
        <div id="content">
        @if(Session::has('message'))
        <p id="message">{{Session::get('message')}}</p>
        @endif
        @yield('content')
        </div> <!-- end content -->
          <footer>
            <div class="container">
              <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                
                <hr>
                <p>Project HUDAI</a>.<br>Unilever &copy; {{date('Y')}}</p>
              </div>
            </div>
          </div>
          </footer><!-- end footer -->
          </div> <!-- end container -->
          
        </body>
      </html>
    </head>