<header class="header">
    
      <div class="header-block header-block-collapse hidden-lg-up" >
        <button class="collapse-btn" id="sidebar-collapse-btn">
          <i class="fa fa-bars"></i>
        </button>
      </div>
      
      <div class="header-block header-block-search ">
        <span class="member_area" >Dealer Portal</span>
      </div>
      <div class="header-block header-block-nav">
        <ul class="nav-profile">
      
          
          <li class="notifications new">
            <a href="" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <sup>
                @if(Session::has('unread_notifications'))
                  <!-- <span class="counter" style="color:red;"><mark class="big swing">{{ count(Session::get('unread_notifications')) }}</mark></span> -->
                  <span class="header_button_badge">{{ count(Session::get('unread_notifications')) }}</span>
                @else
                   <span class="counter" style="color:red;"></span>
                @endif
              </sup>
            </a>
          
            <div class="dropdown-menu notifications-dropdown-menu">
          
              <ul class="notifications-container">
                @if(Session::has('unread_notifications'))
                  @foreach(Session::get('unread_notifications') as $key => $notification)
                  <?php
                    $out = strlen($notification['Description']) > 60 ? substr($notification['Description'],0,60)."..." : $notification['Description'];
                  ?>
                  <li>
                    <a href="{{ route('notification_detail',['notification_id'=> $notification['NotificationId']]) }}" class="notification-item">
                      <!-- <div class="img-col">
                        <div class="img" style="background-image: url('assets/faces/3.jpg')"></div>
                      </div> -->
                      <div class="body-col">
                        <p>
                          <span class="accent">{{ $notification['Title'] }}</span>: 
                          <span ><?php echo nl2br($out); ?></span>.
                        </p>
                      </div>
                    </a>
                  </li>
                  @endforeach
                @endif
              </ul>
              <footer>
                <ul>
                  <li>
                    <a href="{{ route('notifications') }}">
                      View All
                    </a>
                  </li>
                </ul>
              </footer>
            </div>
          </li>
      
          <li class="profile dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <!--   <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')">
              
              </div> -->
              <span class="name">
                @if(Session::has('userInfo') && !empty(Session::get('userInfo')[0]['Name']) )
                 {{ Session::get('userInfo')[0]['Name'] }}
                @endif
              </span>
            </a>
              <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
              {{-- <a class="dropdown-item" href="{{ route('profile') }}">
                <i class="fa fa-user icon"></i>
                Profile
              </a> --}}
              <a class="dropdown-item" href="{{ route('newPassword') }}">
                <i class="fa fa-key icon"></i>
                Change Password
              </a>
              <!-- <a class="dropdown-item" href="#">
                <i class="fa fa-bell icon"></i>
                Notifications
              </a> -->
              <!-- <a class="dropdown-item" href="#">
                <i class="fa fa-gear icon"></i>
                Settings
              </a> -->
              <div class="dropdown-divider" ></div>
              <a class="dropdown-item" href="{{ route('signout') }}">
                <i class="fa fa-power-off icon"></i>
                Logout
              </a>      
            </div>
          </li>   
        </ul>
      </div>
    </header>