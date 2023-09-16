<!DOCTYPE html>
<html style="height: 100%;">
<head>
  <title>Paymob Iframe</title>
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }

    iframe {
      display: block;
      width: 100%;
      height: 100%;
      border: 0;
    }
  </style>
</head>
<body style="height: 100%;">
  <iframe src="{{ $url }}" frameborder="0" allowfullscreen></iframe>
</body>
</html>

