<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ url('/assets/img/avatars/boalemo.jpg') }}" type = "image/x-icon">

   <!-- Bootstrap core CSS -->
   <link href="{{asset('/assets/home/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- My CSS -->
  <link href="{{asset('/assets/home/styles/styles.css')}}" rel="stylesheet">

  <title>Dashboard</title>
</head>

<body class="bg-dashboard">
  <main class='container vh-100'>
    <div class="row h-50">
      <div class="col-12 col-md-8">
        <div class="card border-0 shadow-lg m-0 m-md-2 p-2 h-100">

        </div>
      </div>

      <div class="col-12 col-md-4 h-100">
        <div class="row h-100">
          <div class="col-6 p-2 h-50">
            <div class="card bg-info h-100">

            </div>
          </div>
          <div class="col-6 p-2 h-50">
            <div class="card bg-success h-100">

            </div>
          </div>
          <div class="col-12 p-2 h-50">
            <div class="card bg-warning h-100">

            </div>
          </div>
        </div>
      </header>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="collapse navbar-collapse py-2 mb-2">
              <ul class="nav d-flex justify-content-center">
                  <li class="nav-item ">
                    <a class="nav-link text-muted" href="#">BERANDA<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      TENTANG KAMI
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{route('visitor.test.ui')}}">SAMBUTAN</a>
                      <a class="dropdown-item" href="#">VISI MISI</a>
                      <a class="dropdown-item" href="#">TUGAS DAN FUNGSI</a>
                      <a class="dropdown-item" href="#">STRUKTUR ORGANISASI</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                  </li>
              </ul>
        </div>
      </nav>

      <div class="col-12 col-md-8 mt-3">
        <div class="card border-0 shadow-lg m-0 m-md-2 p-2 h-100">
        </div>
      </div>

      <div class="col-12 col-md-4 h-50 mt-3">
        <div class="row h-100">
          <div class="col-6 p-2 h-50">
            <div class="card bg-info h-100">

            </div>
          </div>
          <div class="col-6 p-2 h-50">
            <div class="card bg-success h-100">

            </div>
          </div>
          <div class="col-12 p-2 h-50">
            <div class="card bg-warning h-100">

            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>

</body>

</html>