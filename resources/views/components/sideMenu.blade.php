<aside class="sidebar">
        <div class="sidebar-container">
    
            <div class="sidebar-header">
                <div class="brand">
                    <div class="logo_dashboard">
                       <img src="{{ asset('public/images/logo-final.png') }}" width="30%" style="margin-left: 50px;" alt="Logo">
                    </div>    
                </div>
            </div>
            <nav class="menu">
                <ul class="nav metismenu" id="sidebar-menu">
    
                    <li class="{{ Route::current()->getName() == 'dashboard' ? 'active':'' }}" >
                        <a href="{{ route('dashboard') }}">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </a>
                    </li>
    
    
                    <li class="{{ Route::current()->getName() == 'plotsList' || Route::current()->getName() == 'viewLedger' || Route::current()->getName() == 'getChallanFields' || Route::current()->getName() == 'challanGeneration' || Route::current()->getName() == 'paymentConfirmation'     ? 'active open':'' }}" >
    
                        <a href="{{ route('plotsList') }}">
                            <i class="fa fa-home"></i> My Plots <span class="button__badge">  @if(Session::has('userInfo'))
                                    {{ count(Session::get('userInfo')) }} </span>
                                @endif
                        </a>
    
                       <!--  <ul> -->
                           <!--  <li class="{{ Route::current()->getName() == 'plotsList' ? 'active':'' || Route::current()->getName() == 'viewLedger' ? 'active':'' }}"  >
                                <a href="{{ route('plotsList') }}">
                                    Plot Info
                                </a>
                            </li> -->
    
                            <!-- <li class="{{ Route::current()->getName() == 'viewLedger' ? '':'' }}"   >
                                <a href="{{ route('plotsList') }}">
                                    Payment Details
                                </a>
                            </li> -->
                        <!-- </ul> -->
                    </li>

                    {{-- <li class="{{ Route::current()->getName() == 'profile' || Route::current()->getName() == 'editProfile'  ? 'active':'' }}" >
                        <a href="{{ route('profile') }}">
                            <i class="fa fa-user icon"></i> Profile
                        </a>
                    </li> --}}
                   
                    <li class="{{ Route::current()->getName() == 'notifications' || Route::current()->getName() == 'notification_detail'  ? 'active':'' }}" >
                        <a href="{{ route('notifications') }}">
                            <i class="fa fa-bell-o icon"></i> Notifications @if(Session::has('unread_notifications')) <span class="button__badge"> 
                                    {{ count(Session::get('unread_notifications')) }} </span>
                                @endif 
                        </a>
                    </li>
    
                    <!-- <li  >
                        <a href="">
                            <i class="fa fa-bar-chart"></i> Charts 
                            <i class="fa arrow"></i>
                        </a>
    
                        <ul>
                            <li  >
                                <a href="charts-flot.html">
                                    Flot Charts
                                </a>
                            </li>
    
                            <li  >
                                <a href="charts-morris.html">
                                    Morris Charts
                                </a>
                            </li>
                        </ul>
                    </li>
     --><!-- 
                    <li  >
                        <a href="">
                            <i class="fa fa-table"></i> Tables
                            <i class="fa arrow"></i>
                        </a>
    
                        <ul>
                            <li  >
                                <a href="static-tables.html">
                                    Static Tables
                                </a>
                            </li>
    
                            <li  >
                                <a href="responsive-tables.html">
                                    Responsive Tables
                                </a>
                            </li>
    
                        </ul>
                    </li> -->
                    <li class="{{ Route::current()->getName() == 'newComplaint' || Route::current()->getName() == 'complaintStatus' ? 'active open':'' }}" >
                        <a href="{{ route('newComplaint') }} " >
                            <i class="fa fa-comment-o"></i> Complaint
                             <i class="fa arrow"></i>
                        </a>
                         <ul>
                            <li class="{{ Route::current()->getName() == 'newComplaint'  ? 'active ':'' }}">
                                <a href="{{ route('newComplaint') }}">
                                    New Complaint
                                </a>
                            </li>
                            <li class="{{ Route::current()->getName() == 'complaintStatus'  ? 'active ':'' }}">
                                <a href="{{ route('complaintStatus') }}">
                                    Complaint Status
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{ Route::current()->getName() == 'uploadChallan' ? 'active':'' }}" >
                        <a href="{{ route('uploadChallan') }} " >
                            <i class="fa fa-upload"></i> Upload Challan
                        </a>
                    </li>
    
                    <li class="{{ Route::current()->getName() == 'ndc_list' || Route::current()->getName() == 'ndc_detail' ? 'active open':'' }}">
                        <a href="">
                            <i class="fa fa-desktop"></i> Status
                            <i class="fa arrow"></i>
                        </a>
    
                        <ul>
                            <li class="{{ Route::current()->getName() == 'ndc_list' || Route::current()->getName() == 'ndc_detail'   ? 'active ':'' }}">
                                <a href="{{ route('ndc_list') }}">
                                    NDC
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{ Route::current()->getName() == 'payments' || Route::current()->getName() == 'payment_detail'  ? 'active':'' }}" >
                        <a href="{{ route('payments') }}">
                            <i class="fa fa-credit-card"></i> Payments
                        </a>
                    </li>



    
                    <!-- <li  >
    
                        <a href="">
                            <i class="fa fa-file-text-o"></i> Pages
                            <i class="fa arrow"></i>
                        </a>
    
                        <ul>
                            <li >
                                <a href="login.html">
                                    Login
                                </a>
                            </li>
                            
                            <li >
                                <a href="signup.html">
                                    Sign Up
                                </a>
                            </li>
    
                            <li >
                                <a href="reset.html">
                                    Reset
                                </a>
                            </li>
    
                            <li >
                                <a href="error-404.html">
                                    Error 404 App
                                </a>
                            </li>
    
                            <li >
                                <a href="error-404-alt.html">
                                    Error 404 Global
                                </a>
                            </li>
    
                            <li >
                                <a href="error-500.html">
                                    Error 500 App
                                </a>
                            </li>
    
                            <li >
                                <a href="error-500-alt.html">
                                    Error 500 Global
                                </a>
                            </li>
                        </ul>
                    </li> -->
    
                    <!-- <li  >
                        <a href="https://github.com/modularcode/modular-admin-html">
                            <i class="fa fa-github-alt"></i> Theme Docs
                        </a>
                    </li> -->
    
    
                </ul>
            </nav>
    
        </div>
    
        <!-- <footer class="sidebar-footer">
            <ul class="nav metismenu" id="customize-menu">
                <li>
                    <ul>
                        <li class="customize">
                            <div class="customize-item">
                                <div class="row customize-header">
                                    <div class="col-xs-4">
                                    </div>
                                    <div class="col-xs-4">
                                        <label class="title">fixed</label>
                                    </div>
                                    <div class="col-xs-4">
                                        <label class="title">static</label>
                                    </div>
                                </div>
                                <div class="row hidden-md-down">
                                    <div class="col-xs-4">
                                        <label class="title">Sidebar:</label>
                                    </div>
                                    <div class="col-xs-4">
                                        <label>
                                            <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed" >
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col-xs-4">
                                        <label>
                                            <input class="radio" type="radio" name="sidebarPosition" value="">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label class="title">Header:</label>
                                    </div>
                                    <div class="col-xs-4">
                                        <label>
                                            <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col-xs-4">
                                        <label>
                                            <input class="radio" type="radio" name="headerPosition" value="">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label class="title">Footer:</label>
                                    </div>
                                    <div class="col-xs-4">
                                        <label>
                                            <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col-xs-4">
                                        <label>
                                            <input class="radio" type="radio" name="footerPosition" value="">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="customize-item">
                                <ul class="customize-colors">
                                    <li>
                                        <span class="color-item color-red" data-theme="red"></span>
                                    </li>
                                    <li>
                                        <span class="color-item color-orange" data-theme="orange"></span>
                                    </li>
                                    <li>
                                        <span class="color-item color-green" data-theme="green"></span>
                                    </li>
                                    <li>
                                        <span class="color-item color-seagreen" data-theme="seagreen"></span>
                                    </li>
                                    <li>
                                        <span class="color-item color-blue active" data-theme=""></span>
                                    </li>
                                    <li>
                                        <span class="color-item color-purple" data-theme="purple"></span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <a href="">
                        <i class="fa fa-cog"></i> Customize
                    </a>
                </li>
            </ul>
        </footer> -->
        
    
    </aside>