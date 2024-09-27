
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foods</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-bottom: 60px;
            background-image: url('public/apple-isolated-on-wood-background.webp');
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
            background-color: #f5f5f5;
        }

        p.card-text {
            margin-top: -10px;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Foods</a>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-4 mb-3">Types of Foods</h1>
        <div class="input-group mb-3">
            <form action="{{ route('food.food') }}" method="get" class="form-inline">
                <div class="d-flex">
                    <div class="form-group">
                        <input type="text" name="food" id="food" style="height: 50px" class="form-control" placeholder="foods" required>
                    </div>
                    <button style="margin-left: 20px;" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>


        @if (isset($foods) && !empty($foods))
            <div class="row">
                @foreach ($foods as $food)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ $food['image'] }}" class="card-img-top" alt="{{ $food['title'] }}">
                            <div class="card-body">
                                <h5 class="card-title">Tittle:{{ $food['title'] }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Difficulity:{{ $food['difficulty'] }}</h6>
                                <div class="foods-details" id="details-{{ $food['id'] }}">
                                    <p>ID: {{ $food['id'] }}</p>
                                </div>
                                <a href="{{route('food.details',['id'=>$food['id']]) }}" class="btn btn-primary">Recipies</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">No foods found for your search.</div>
        @endif
    </div>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">© 2024 Food. All rights reserved.</span>
        </div>
    </footer>
</body>

</html>
