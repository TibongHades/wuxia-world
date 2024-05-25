<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .book {
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            page-break-inside: avoid; 
        }
        .book h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .book img {
            display: block;
            margin: 0 auto 10px;
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .book-info {
            margin-top: 10px;
        }
        .book-info p {
            margin: 5px 0;
            line-height: 1.4;
        }
        .book-info p strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Book List</h1>
        @foreach($books as $book)
        <div class="book">
            <h2>{{ $book->title }}</h2>
            <img src="data:image/png;base64,{{ base64_encode($book->qrCode) }}" alt="QR Code">
            <div class="book-info">
                <p><strong>Description:</strong> {{ $book->description }}</p>
                <p><strong>Chapters:</strong> {{ $book->chapters }}</p>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
