<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!-- Styles -->
        
    </head>
    <body class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">My App</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reg.create') }}">Registration</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.form')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">Product List</a> --}}
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="jumbotron text-center">
            <h1 class="display-4">Welcome Admin</h1>
            <p class="lead">This is a simple and nice-looking landing page created with Bootstrap.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
          </div>
        
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h2>Section One</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat cum, reprehenderit labore recusandae quod quisquam, sunt, omnis unde quibusdam porro architecto aspernatur placeat beatae! Earum asperiores nemo distinctio necessitatibus ratione!</p>
              </div>
              <div class="col-md-6">
                <h2>Section Two</h2>
                <p>This is the content of section two. You can add any content or features here.</p>
              </div>
            </div>
          </div>
        
    </body>
</html>
