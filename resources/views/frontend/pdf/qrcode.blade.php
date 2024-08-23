<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@isset($qrcodePath)
    <img src="{{ asset($qrcodePath)  }}" alt="QR Code">
    @else
    <p>No OR Code Available.</p>
    @endisset
</body>
</html>