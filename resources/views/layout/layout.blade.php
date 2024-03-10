<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    {{-- HEADER - NAV --}}
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>

    {{-- BODY CONTENT --}}
    @yield('content')

    {{-- FOOTER --}}
    <footer>
        <footer class="py-3 fixed-bottom">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 Company, Inc</p>
          </footer>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
