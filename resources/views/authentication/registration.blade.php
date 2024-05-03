<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Simple Laravel Crud</h3>

    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('products.index')}}" class="btn btn-dark">Back</a>

            </div>
            
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 my-4 shadow-lg">
                    <div class="card-header">
                        <h3>Registration</h3>

                    </div>
                    <form action="{{ route('reg.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input value="{{ old('name')}}" type="text" class="@error('name') is-invalid @enderror form-control form-control-lg" placeholder="Name" name="name">
                                
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input value="{{ old('email')}}" type="text" class="@error('email') is-invalid @enderror form-control form-control-lg" placeholder="email" name="email">
                                
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input value="{{ old('password')}}" type="text" class="@error('password') is-invalid @enderror form-control form-control-lg" placeholder="Password" name="password">
                                
                            </div>
                            
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                            </div>
    
                        </div>
                    </form>
                    

                </div>

            </div>

        </div>

    </div>


  </body>
</html>