<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7fafc;
        }
        .title {
            font-weight: bold;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .container {
            display: flex;
            width: 80%;
            height: 80%;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .scanner {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
        }
        .result {
            flex: 1;
            padding: 20px;
            background-color: #f7fafc;
        }
        #reader {
            width: 90%;
            height: auto;
            max-height: 80%;
        }
        #result {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .site-link {
            font-size: 16px;
            color: #3182ce;
            text-decoration: none;
        }
        .site-link:hover {
            text-decoration: underline;
        }
        a {
            color: #3182ce;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1 class="title text-center font-bold text-4xl mb-5">QR Scanner</h1>
    <div class="container">
        <div class="scanner">
            <div id='reader' class="qrscn"></div>
        </div>
        <div>
            <p>Example CSV file: <a href="https://www.mediafire.com/file/srvkifldf77vzca/Screenshot+from+2024-05-23+17-15-09.png/file" target="_blank">Download</a></p>
        </div>
        <div class="result" id='result'></div>
    </div>
</body>
<script src='https://unpkg.com/html5-qrcode' type='text/javascript'></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        console.log(`Code matched = ${decodedText}`, decodedResult);
        document.getElementById('result').innerHTML = "<p>Qr Code Result:" + decodedText + "</p>";
        document.getElementById('result').innerHTML += "<button onclick='openWebsite(\"" + decodedText + "\")' class='site-link'>Open Website</button>";
    }
    function onScanFailure(error) {
        console.warn(`Code scan error = ${error}`);
    }

    function openWebsite(url) {
        window.open(url, '_blank');
        window.location.href = 'about:blank'; 
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    {fps: 10, qrbox: {width: 250, height: 250}},
    false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
</html>
