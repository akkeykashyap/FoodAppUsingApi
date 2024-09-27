<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $details['title'] ?? 'Food Details' }} - Food Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-bottom: 60px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('food.food') }}">Foods</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>{{ $details['title'] ?? 'No Title Available' }}</h1>
        <img src="{{ $details['image'] ?? 'default_image_url.jpg' }}" alt="{{ $details['title'] ?? 'Food Image' }}" class="img-fluid mb-3" style="height: 300px">
        <h6><strong>Difficulty:</strong> {{ $details['difficulty'] ?? 'Unknown' }}</h6>
        <h6><strong>Portion:</strong> {{ $details['portion'] ?? 'Not specified' }}</h6>
        <h6><strong>Time:</strong> {{ $details['time'] ?? 'Not specified' }}</h6>
        <p><strong>Description:</strong> {{ $details['description'] ?? 'No description available' }}</p>

        <h6><strong>Ingredients:</strong></h6>
        @if (!empty($details['ingredients']) && is_array($details['ingredients']))
            <ul>
                @foreach ($details['ingredients'] as $ingredient)
                    <li>{{ $ingredient }}</li>
                @endforeach
            </ul>
        @else
            <p>No ingredients available.</p>
        @endif

        <h6><strong>Method:</strong></h6>
        @if (!empty($details['method']) && is_array($details['method']))
            <ol>
                @foreach ($details['method'] as $step)
                    @foreach ($step as $stepNumber => $instruction)
                        <li>{{ $instruction }}</li>
                    @endforeach
                @endforeach
            </ol>
        @else
            <p>No method instructions available.</p>
        @endif
    </div>

    <footer class="footer">
        <div class="container">
            <span class="text-muted">© 2024 Food App. All rights reserved.</span>
        </div>
    </footer>
</body>

</html>
