<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/home">LibreDesk</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/home">Home</a>
        </li>
        @auth
            @if(auth()->user()->role->name == 'Admin')
            <li class="nav-item">
                <a class="nav-link" href="/admin/home">Admin</a>
            </li>
              @endif
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            {{auth()->user()->firstName}}
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
	            <li><a class="dropdown-item" href="/profile">Profile</a></li>
	            <li><a class="dropdown-item" href="/loans">Loans</a></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
	          </ul>
	        </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Library
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/home">Home</a></li>
                        <li><a class="dropdown-item" href="/guides">Guides</a></li>
                        <li><a class="dropdown-item" href="/tags">Tags</a></li>
                    </ul>
                </li>
        @endauth
        @guest
        	<li class="nav-item">
        		<a class="nav-link" href="/login">Login</a>
        	</li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
