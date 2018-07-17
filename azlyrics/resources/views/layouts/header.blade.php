<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="/azlyrics/public/">AZLyrics</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    @if (!Auth::check())
        <li class="nav-item">
            <a class="nav-link" href="/azlyrics/public/login">Sign In</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/azlyrics/public/register">Sign Up</a>
        </li>
        @else

        <li class="nav-item">
            <a class="nav-link" href="#">{{Auth::user()->name}}</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Log Out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        @if(Auth::user()->role == 'admin')
        <?php $count = DB::table('demands')->count(); ?>
            <li class="nav-item">
                <a class="nav-link" href="/azlyrics/public/admin/request"><b>Requests {{($count > 0) ? "(".$count.")":""}} </b></a>
            </li>
        @endif
    @endif
</ul>


<form class="form-inline my-2 my-lg-0" method="get" action="/azlyrics/public/search?q={{ isset($GET['q']) ? $GET['q'] : ""}}" >
  <input class="form-control mr-sm-2" type="search" placeholder="{{ isset($GET['q']) ? $GET['q'] : "Search"}}" aria-label="Search" name="q" required>
  <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" >Search</button>
</form>
</div>

</nav>