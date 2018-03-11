
<nav class="navbar" style="background-color:black; color: #555;">
            <div id="app" class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if(Auth::user())
                        <a class="navbar-brand" href="{{route('student.welcome')}}">
                        {{ config('app.name', 'Kazi') }}
                    </a>
                    @elseif(Auth::guest())
                        <a class="navbar-brand" href="/">
                        {{ config('app.name', 'Kazi') }}
                    </a>
                    @endif
                    

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                    <ul class="nav navbar-nav">
                        @guest
                    	   <li><a href="/how-it-works">How it works</a></li>
                        @endguest
                       	&nbsp;

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                        @if(Auth::guest())
                        	{{-- <li><a href="{{ route('client.welcome') }}">Become a Client</a></li> --}}
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>

                        @elseif(Auth::user())
                            @if(Auth::user()->cluster_id == 0)
                                <li><a href="{{route('cluster.index')}}"><i class="glyphicons glyphicons-group"></i>DASHBOARD</a></li>
                            @else
                                <li><a href="{{route('cluster.show', Auth::user()->cluster->id)}}"><i class="glyphicons glyphicons-group"></i> DASHBOARD</a></li>
                            @endif

                            <li><a class="text-capitalize" href="{{route('profile.show', ['id' => Auth::user()->id])}}"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a></li>
                            {{-- <li><a href="{{ route('student.welcome') }}"><i class="glyphicon glyphicon-home"></i>Home</a></li> --}}
                            {{-- <li><a href="{{ route('student.help') }}"><span class="glyphicon glyphicon-question-sign"></span>Help</a></li> --}}
                             <li><a href="{{ route('student.explore') }}"><span class="glyphicon glyphicon-search"></span>Explore</a></li>



                            
                           

                                    {{-- USING VUE.JS FOR NOTIFICATIONS --}}
                                    <notification v-bind:notifications="notifications"></notification>
                                
                            
                           
                            

                            

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                     <span class="glyphicon glyphicon-align-justify"></span> 
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{route('student.help')}}">Help</a></li>
                                    <li><a href="{{route('student.leaderboard')}}">Leaderboard</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li> 
                                </ul>
                            </li>


                        @endif
                    </ul>
                </div>
            </div>
        </nav>