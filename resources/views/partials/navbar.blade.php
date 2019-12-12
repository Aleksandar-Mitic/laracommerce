<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customer.login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>

                {{-- Admin part --}}
                @auth('admin')
                    <li class="nav-item dropdown">
                        <a id="adminDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('admin')->user()->name }} (ADMIN) <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropdown">
                            <a href="{{route('admin.dashboard')}}" class="dropdown-item">Admin dashboard</a>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();">
                                Logout
                            </a>
                            <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth

                {{-- Customer part  --}}
                @auth('customer')
                    <li class="nav-item dropdown">
                        <a id="customerDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('customer')->user()->name }} (customer) <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customerDropdown">
                            <a href="{{route('customer.dashboard')}}" class="dropdown-item">Customer dashboard</a>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#customer-logout-form').submit();">
                                Logout
                            </a>
                            <form id="customer-logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>  