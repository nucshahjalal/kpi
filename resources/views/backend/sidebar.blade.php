<nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="#" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="{{asset('backend/assets/images/logo.jpg')}}" alt="" class="logo logo-lg" />
                    <img src="{{asset('backend/assets/images/logo.jpg')}}" alt="" class="logo logo-sm" />
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">
                    <li class="nxl-item nxl-caption">
                        <label></label>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{url('/dashboard')}}" class="nxl-link">
                             <span class="nxl-micon"><i class="feather-airplay"></i> </span> Dashboard
                        </a>                 
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon">
                                <i class="">
                                    <img src="{{asset('backend/assets/icon/icon11.jpg')}}" width="18px" height="50%" class="img-fluid">
                                </i>
                            </span>
                            <span class="nxl-mtext">Inquiry</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li style="margin-left: 10px;" class=""><a class="nxl-link" href="{{route('inquiry.create')}}">Add Inquiry</a></li>
                        </ul>
                        <ul class="nxl-submenu">
                            <li style="margin-left: 10px;" class=""><a class="nxl-link" href="{{route('inquiry.list')}}"> Inquiry List</a></li>
                        </ul>
                        <ul class="nxl-submenu">
                            <li style="margin-left: 10px;" class=""><a class="nxl-link" href="{{route('visit.list')}}"> Check-In List</a></li>
                        </ul>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon">
                                <i class="">
                                    <img src="{{asset('backend/assets/icon/icon12.jpg')}}" width="18px" height="50%" class="img-fluid">
                                </i>
                            </span>
                            <span class="nxl-mtext">Inquiry List</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li style="margin-left: 10px;" class=""><a class="nxl-link" href="{{route('inquiry-hot.list')}}">HOT</a></li>
                        </ul>
                        <ul class="nxl-submenu">
                            <li style="margin-left: 10px;" class=""><a class="nxl-link" href="{{route('inquiry-cold.list')}}">COLD</a></li>
                        </ul>
                        <ul class="nxl-submenu">
                            <li style="margin-left: 10px;" class=""><a class="nxl-link" href="{{route('inquiry-warm.list')}}">WARM</a></li>
                        </ul>
                    </li>
                    
                  

                    <li class="nxl-item nxl-hasmenu">
                        <li class="nxl-item"><a class="nxl-link" href="{{url('logout')}}"><span class="nxl-micon"><i class="feather-power"></i> </span><strong>Log Out</strong></a></li>
                    </li>                              
                </ul>
                
            </div>
        </div>
    </nav>

    