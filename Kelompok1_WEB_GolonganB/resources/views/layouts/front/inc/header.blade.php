<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="/" class="logo mr-auto">{{ config('app.name')}}</a>
      <!-- Uncomment below if you prefer to use text as a logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Butterfly</a></h1> -->

      <style>
        .font-xl{
            font-size: 18px;
        }
        .active{
            color: #299E63!important;
            font-weight: 600;
        }
    </style>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          
            <li class="nav-item">
                <?php $link = str_replace('/','',$_SERVER['REQUEST_URI']) ?>
                <a class="nav-link <?php echo $link == '' ? 'active' : '' ?>" href="{{ url('/') }}">Home
                </a>
            </li>
          
            <!-- <li><a href="{{ url('status_pesanan') }}">Status Pesanan</a></li> -->
          
          
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        
                        <li><a class="nav-link <?php echo $link == 'layanan' ? 'active' : '' ?>" href="{{ url('layanan') }}">Layanan</a></li>
                        <li><a class="nav-link <?php echo $link == 'kreasi' ? 'active' : '' ?>" href="{{ url('kreasi') }}">Kreasi</a></li>
                        

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link border dropdown-toggle" style="font-size: 13px" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="icofont-ui-user pr-1 font-xl"></i>  {{ Auth::user()->name }}
                                </a>

                                

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ url('profil') }}">

                                        {{ Auth::user()->name }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                
                            </li>
                            <li class="pl-2">
                                <a class="nav-link border" href="{{ url('notifikasi') }}">
                                    <i class="icofont-bell-alt font-xl"></i>
                                </a></li>
                        @endguest

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->