<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
    <!-- Add Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar a {
            color: white !important;
        }
        .hero-section {
            background-color: #007bff;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: 600;
        }
        .hero-section p {
            font-size: 1.2rem;
        }
        .card-deck .card {
            border: none;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 500;
        }
        .card-body {
            padding: 30px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Library Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('readers.index') }}">Readers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('borrows.index') }}">Borrows</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <h1>Welcome to the Library Management System</h1>
            <p class="lead">Manage books, readers, and borrow records easily</p>
            <a href="{{ route('books.index') }}" class="btn btn-light btn-lg">Explore Books</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container my-5">
        @yield('content')
    </div>

    <!-- Footer Section -->
    <footer class="text-center py-4">
        <p>&copy; 2024 Library Management System</p>
    </footer>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
