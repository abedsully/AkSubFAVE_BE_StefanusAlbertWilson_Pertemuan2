<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Store Data</h1>

    <div class="ml-5 mb-4">
        <a href="/home" class="btn btn-secondary">&#8592 Back</a>
    </div>

    <form action="/store" method="post" enctype="multipart/form-data" class="ml-5 mr-5">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" name="country" class="form-control">
        </div>

        <div class="mb-3">
            <label for="number" class="form-label">Shirt Number</label>
            <input type="text" name="number" class="form-control">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Input Image</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>

</body>
</html>
