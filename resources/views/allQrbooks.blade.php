<!DOCTYPE html>
<html>
<head>
    <title>All Book QR Codes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7fafc;
        }
        .header {
            position: sticky;
            top: 0;
            background-color: #ffffff;
            z-index: 1000;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px;
        }
        .title {
            font-size: 2rem;
            font-weight: bold;
            color: #1a202c;
            text-align: center;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            padding: 0.5rem;
        }
        @media (min-width: 768px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (min-width: 1024px) {
            .grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        .book-item {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            text-align: center;
        }
        .book-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .book-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }
        .book-description {
            color: #4a5568;
            margin-bottom: 1rem;
        }
        .qr-code {
            display: flex;
            justify-content: center;
            margin-bottom: 0.75rem;
        }
        .qr-code svg {
            max-width: 100%;
        }
        .book-link {
            color: #3182ce;
            text-decoration: none;
        }
        .book-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1 class="title">Wuxia World</h1>
    </div>

    <div class="container">
        <div class="grid">
            @foreach ($books as $book)
                <div class="book-item">
                    <h2 class="book-title">{{ $book->title }}</h2>
                    <div class="qr-code">
                        {!! $qrCodes[$book->id] !!}
                    </div>
                    <p class="text-gray-500 mb-2">Scan the QR code to view the book details:</p>
                    <a href="{{ url('/books/' . $book->id) }}" class="book-link">{{ url('/books/' . $book->id) }}</a>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
