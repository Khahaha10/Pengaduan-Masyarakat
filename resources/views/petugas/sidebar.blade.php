<div class="row">
    <div class="col-md-2">
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
        <nav class="sidebar">
            <header style="margin-top: 25px; margin-bottom: 30px">
                <div class="image-text">
                    <span class="image">
                        <img src="{{asset('assets/images/logo.png')}}" alt="logo" style="margin-left: 5px" />
                    </span>
                    <div class="text header-text">
                        <span class="main">SIGMA</span>
                    </div>
                </div>
            </header>

            <div class="menu-bar">
                <div class="menu" style="margin-left: -35px; margin-top: 20px;">
                    <ul class="menu-links">
                        <li class="nav-link" style="margin-top: 20px; padding: 0px">
                            <a href="home">
                                <i class="bx bx-home-alt icons"></i>
                                <span class="text nav-text">Home</span>
                            </a>
                        </li>
                        <li class="nav-link" style="margin-top: 20px; padding: 0px">
                            <a href="pengaduan">
                                <i class="bx bx-mail-send icons"></i>
                                <span class="text nav-text">Pengaduan</span>
                            </a>
                        </li>
                        <li class="nav-link" style="margin-top: 20px; padding: 0px">
                            <a href="forum">
                                <i class="bx bx-conversation icons"></i>
                                <span class="text nav-text">Forum</span>
                            </a>
                        </li>
                        @if(auth()->user()->role != 'petugas')
                        <li class="nav-link" style="margin-top: 20px; padding: 0px">
                            <a href="masyarakat">
                                <i class="bx bx-group icons"></i>
                                <span class="text nav-text">Masyarakat</span>
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role != 'petugas')
                        <li class="nav-link" style="margin-top: 20px; padding: 0px">
                            <a href="petugas">
                                <i class="bx bx-hard-hat icons"></i>
                                <span class="text nav-text">Petugas</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="bottom-content">
                    <li class="nav-link" style="margin-top: -80px; padding: 0px">
                        <a style="width: 100%">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn nav-link" style="width: 100%; border: none; background: none; display:flex">
                                <i class="bx bx-log-out icons" style="margin-left: -3px;"></i>
                                <span class="text nav-text">Log Out</span>
                            </button>
                        </form>
                        </a>
                    </li>
                </div>
            </div>
        </nav>
    </div>