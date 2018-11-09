<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">The winner of this contest is automatically selected at the end of the period, and will be sent an e-mail on how to claim their price. Netflix has all rights to widthdraw the contest or disqualify any participants</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="https://twitter.com/netflix" class="text-white">Follow on Twitter</a></li>
            <li><a href="https://www.facebook.com/netflix/?brand_redir=6275848869" class="text-white">Like on Facebook</a></li>

            @if (Auth::check())
              <li><a class="text-white" 
              href="{{ route('logout') }}" 
                  onclick="event.preventDefault(); 
                          document.getElementById('logout-form').submit();">
                  {{ __('Sign out') }}
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
              <li><a href="/login" class="text-white">Sign in</a></li>
            @endif

          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="/" class="navbar-brand d-flex align-items-center">
        <img src="/img/logo.png" alt="" style="width:20px; height: 20px; margin-right: 10px;">
        <strong>Netflix</strong>
      </a>

      @if (Auth::check())
        <a href="/dashboard" class="navbar-brand d-flex align-items-center">
          <strong>Dashboard</strong>
        </a>
      @endif


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>