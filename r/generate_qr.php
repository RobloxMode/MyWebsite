<?php
// Define your app download link
$downloadLink = "https://example.com/download-app"; // Replace with your actual link

// Generate the QR code URL
$qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($downloadLink) . "&size=200x200";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download App QR Code</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background-image: url(images/b1.jpg);

        }
        .qr-container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        img {
            width: 200px; /* Adjust QR code size */
            height: auto;
        }
        h2 {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="qr-container">
    <h1>Download Our App</h1>
    <img src="<?php echo $qrCodeUrl; ?>" alt="Download App QR Code">
    <h2>Scan to Download</h2>
</div>

</body>
</html>
