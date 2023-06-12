<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Register</h1>

    <form action="/register" method="post" class="ml-5 mr-5">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Enter your name</label>
            <input type="text" placeholder="Enter your name" name="fullname" class="form-control @error('fullname') is-invalid @enderror" value="{{ old('fullname')}}">
            @error('fullname')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="club" class="form-label">Enter your email</label>
            <input type="text" placeholder="Enter your email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email')}}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Enter your password</label>
            <input type="password" placeholder="Enter your password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password' )}}">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Confirm your password</label>
            <input type="password" placeholder="Confirm your password" id="password" name="confirm" class="form-control @error('confirm') is-invalid @enderror" value="{{ old('confirm' )}}">
            @error('confirm')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>

        <button type="submit" class="btn btn-success">Submit</button>

        <p class="text-center mt-5">Already have an account? <a href="/login" class="primary">Login Here</a></p>
    </form>

</body>
</html>
