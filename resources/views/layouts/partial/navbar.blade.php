<link rel="stylesheet" href="New/assets/font-awesome/css/font-awesome.min.css">
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="/">Gudang Beruang</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        
                    
    
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="catalog"><i class="fa fa-book"> Catalog</i></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="about-us.php"><i class="fa fa-id-badge" aria-hidden="true"> About Us</i></a></li>
                    @if(Auth::check())
                        <li class="nav-item"><a class="nav-link"href="keranjang"><i class="fa fa-shopping-basket" aria-hidden="true"> My Order</i></a></li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle text-center pr-3 nav-link bg-transparent text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle text-dark"></i> {{Auth::user()->name}}
                                </a>

                                <div class="dropdown-menu item-dropdown" aria-labelledby="dropdownMenuLink">
                                    <!-- dropdown profile -->
                                    <a class="dropdown-item nav-link" href="profile" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" >

                                                <i class="fa fa-user-circle mr-3 ml-1"></i>Profile


                                    </a>
                                    <!-- dropdown Logout -->
                                    <a class="dropdown-item nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" >
                                            <i class="fa fa-power-off mr-3 ml-1"></i> Logout

                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                        @else
                            
                        <li class="nav-item"><a class="nav-link"href="{{ route('login') }}">Login</a></li>
                        @endif
                </ul>
                
            </div>
        </div>
        </div>
    </nav>
