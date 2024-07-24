<header class="navbar navbar-expand-md d-print-none sticky-top" >
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
              <img src="./back/static/logo.png" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
              
              
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
  <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
  <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
</svg></span></a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                
                
                <a href="{{ route('author.logout')}}" class="dropdown-item" on-click="event.preventDefault();document.getElementByID('logout-form').submit();">Logout</a>
                <form action="{{route('author.logout')}}" id="logout-form" method="POST"></form>
              </div>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
              <ul class="navbar-nav">
                
                <li class="nav-item ">
                  <a class="nav-link " href="{{route('author.posts.all-post')}}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                    </span>
                    <span class="nav-link-title">
                      All Blog
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('author.posts.add-post')}}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                    </span>
                    <span class="nav-link-title">
                      Add Blog
                    </span>
                  </a>
                </li>
                
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header>