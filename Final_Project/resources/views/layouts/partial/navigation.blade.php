<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Forum Koding Indonesia</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/home">Forum</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#testimoni">Testimoni</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a></li>

                <li class="nav-item mx-0 mx-lg-1">
                    @guest
                    <div class="coba" style="background:lightblue; border-radius:10px">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" style="color:black" href="/login">Sign In</a>
                    </div>
                    @else
                    <div class="coba" style="background:lightblue; border-radius:10px">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" style="color:black" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Sign OUt') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <!-- <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" style="color:black" href="/">Sign Out</a> -->
                    </div>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>