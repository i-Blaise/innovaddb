<header class="app-header">
    <!-- .top-bar -->
    <div class="top-bar">
      <!-- .top-bar-brand -->
      <div class="top-bar-brand">
        <a href="/">
          <h3 style="color:black">InnovaDDB</h3>
        </a>
      </div>
      <!-- /.top-bar-brand -->
      <!-- .top-bar-list -->
      <div class="top-bar-list">
        <!-- /.top-bar-item -->
       
        <!-- .top-bar-item -->
        <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
          <!-- .btn-account -->
          <div class="dropdown">
            <button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="user-avatar">
              </span>
              <span class="account-summary pr-lg-4 d-none d-lg-block">
                <span class="account-name" style="color:black">{{Auth::user()->name}}</span>
              </span>
            </button>
            <div class="dropdown-arrow dropdown-arrow-left"></div>
            <!-- .dropdown-menu -->
            <div class="dropdown-menu">
             <a href="/logout" style="color:black">
              <span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
              
            </div>
            <!-- /.dropdown-menu -->
          </div>
          <!-- /.btn-account -->
        </div>
        <!-- /.top-bar-item -->
      </div>
      <!-- /.top-bar-list -->
    </div>
    <!-- /.top-bar -->
  </header>