<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center mt-5">Player Lists</h1>

    <div class="d-flex justify-content-end mr-5">
        <form action="/logout" method="POST">
            @csrf
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-danger">Logout</button>
            </div>
        </form>
    </div>


    @can('isAdmin')

        <div class="text-center h3">
            Welcome "{{auth()->user()->fullname}}" as <p class="text-danger">&nbsp;Administrator</p>
        </div>

        <div class="d-flex justify-content-center">
            <a href="/store" class="btn btn-success">&#43; Add New Players</a>
        </div>
    @else
        <div class="text-center h3">
            Welcome "{{auth()->user()->fullname}}" as <p class="text-danger">&nbsp;Visitor</p>
        </div>


    @endcan


    <div class="container">
        <div class="row">
          @foreach($players as $player)
          <div class="col-md-4 mt-5">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="{{asset('storage/Player/' . $player->image )}}" alt="Card image cap" style="width:18rem; height: 18rem;">
              <div class="card-body">
                <h5 class="card-title text-center">{{$player->name}}</h5>
                <p class="card-text">Club: {{$player->club}}</p>
                <p class="card-text">Number: {{$player->number}}</p>
                <div class="d-flex justify-content-center" style="gap: 25px">
                    @can('isAdmin')
                        <a href="/update/{{$player->id}}" class="btn btn-primary">Edit</a>
                        <form action="/delete/{{$player->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endcan
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>




</body>
</html>
