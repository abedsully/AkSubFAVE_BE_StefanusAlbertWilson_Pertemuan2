<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>
<body>
    <h1 class="text-center mt-5">Login</h1>

    @if(session('loginError'))
        <div class="alert alert-danger text-center" role="alert">
                {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="/login" method="post" class="ml-5 mr-5" style="padding: 5rem 30rem">
        @csrf

        <div class="mb-3">
            <label for="club" class="form-label">Enter your email</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Enter your password</label>
            <input class="form-control" type="password" id="formFile" name="password">
        </div>

        <div class="d-flex justify-content-center flex-column">
            <button type="submit" class="btn btn-success">Submit</button>
            <p class="text-center mt-2">Dont have an account yet? <a href="/" class="primary">Register Here</a></p>
        </div>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>
</html>
