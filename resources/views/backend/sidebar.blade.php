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
                            <span class="nxl-micon"><i class="fa-solid fa-gas-pump engine-spin"></i></span>
                            <span class="nxl-mtext">Inquiry</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{route('inquiry.create')}}">Add Inquiry</a></li>
                        </ul>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="fa-solid fa-cog engine-spin2"></i></span>
                            <span class="nxl-mtext">Inquiry List</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="">HOT</a></li>
                        </ul>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="">COLD</a></li>
                        </ul>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="">WARM</a></li>
                        </ul>
                    </li>
                    
                  

                    <li class="nxl-item nxl-hasmenu">
                        <li class="nxl-item"><a class="nxl-link" href="{{url('logout')}}"><span class="nxl-micon"><i class="feather-power"></i> </span><strong>Log Out</strong></a></li>
                    </li>                              
                </ul>
                
            </div>
        </div>
    </nav>

    <style>

         .engine-spin {
            font-size: 20px;
            color: rgb(14, 143, 143);
            display: inline-block;
            animation: moveTractor 3s linear infinite;
            }
         .engine-spin2 {
            font-size: 20px;
            color: rgb(80, 48, 209);
            display: inline-block;
            animation: moveTractor 3s linear infinite;
            }
 
        /* .nxl-micon i {
            color: green; /* bright orange, for example */
            font-size: 2rem;
        } */
    </style>

