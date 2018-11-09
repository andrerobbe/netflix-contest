
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ $_SERVER['REQUEST_URI'] === '/dashboard' ? 'active' : '' }}" href="/dashboard">
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ $_SERVER['REQUEST_URI'] === '/config' ? 'active' : '' }}" href="/config">
                Configuratie
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link {{ $_SERVER['REQUEST_URI'] === '/dashboard/1' ? 'active' : '' }}" href="/dashboard/1">
                Periode 1
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ $_SERVER['REQUEST_URI'] === '/dashboard/2' ? 'active' : '' }}" href="/dashboard/2">
                Periode 2
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ $_SERVER['REQUEST_URI'] === '/dashboard/3' ? 'active' : '' }}" href="/dashboard/3">
                Periode 3
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ $_SERVER['REQUEST_URI'] === '/dashboard/4' ? 'active' : '' }}" href="/dashboard/4">
                Periode 4
              </a>
            </li>
          </ul>
        </div>
      </nav>