<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PT Samafitro Bandung/title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: black;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .logo {
      width: 440px;
      height: 300px;
      object-fit: contain;
      opacity: 0;
      filter: grayscale(0) brightness(1);
      transition:
        opacity 3s ease,
        filter 5s ease;
    }
  </style>
</head>
<body>
  <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo" id="logo" />

  <script>
    window.onload = function () {
      const logo = document.getElementById('logo');

      // Fade in logo
      setTimeout(() => {
        logo.style.opacity = '1';
      }, 500);

      // Fade logo to white (grayscale + brightness)
      setTimeout(() => {
        logo.style.filter = 'grayscale(1) brightness(1)';
      }, 3500);

      // Redirect ke halaman landing setelah 5 detik
      setTimeout(() => {
        window.location.href = "{{ url('/beranda') }}";
      }, 5000);
    };
  </script>
</body>
</html>
