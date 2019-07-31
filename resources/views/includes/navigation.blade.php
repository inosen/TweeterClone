<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <a class="navbar-brand" href="#">Twitter Clone</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/twitterClone/public/timeline">Timeline</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/twitterClone/public/profile/{{Auth::user()->username}}">My Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/twitterClone/public/post">Post a tweet</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/twitterClone/public/list">Users list</a>
      </li>
    </ul>
    <span style="position:absolute;right:150px;">Hi, {{ Auth::user()->username }}!</span>
    <span style="position:absolute;right:50px;" class="ml-2"><a href="{{ route('logout') }}">Logout</a></span>
  </div>

</nav>