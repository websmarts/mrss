
<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header" >
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" >
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li {{ (Request::is('/') ? 'class=active' : '') }}><a href="/">Home</a></li>
              <li {{ (Request::is('modules') ? 'class=active' : '') }}><a href="/modules">Module Specifications</a></li>
              <li {{ (Request::is('booking') ? 'class=active' : '') }}><a href="/booking">Price &amp; Bookings</a></li>
              <li {{ (Request::is('faqs') ? 'class=active' : '') }}><a href="/faqs">FAQs</a></li>
              <li {{ (Request::is('contact') ? 'class=active' : '') }}><a href="/contact">Contact Us</a></li>

            </ul>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
