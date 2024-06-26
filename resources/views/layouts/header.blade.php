<nav class="navbar navbar-expand-lg bg-white text-white">
  <a class="navbar-brand" href="{{ route('products') }}">E-Commerce App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('products') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('products-list') }}">Manage Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('cart') }}">Cart</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ auth()->user()->name; }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>