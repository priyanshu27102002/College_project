<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Get to the sky')</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <!-- <div id="preloader"></div> -->
    @yield('content')  
    <script>
    document.getElementById('phoneNumber').addEventListener('input', function (e) {
    let input = e.target.value;

    // Remove invalid characters (allow only digits, spaces, and '+')
    input = input.replace(/[^\d\s\+]/g, '');

    // Ensure the input starts with "+91 "
    if (!input.startsWith('+91 ')) { 
      input = '+91 ' + input.replace(/^\+91\s?/, '');
    }

    // Limit to "+91 xxxxx xxxxx" format (14 characters)
    if (input.length > 14) {
      input = input.slice(0, 14);
    }

    // Set the sanitized value back to the input field
    e.target.value = input;
  });
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
  </body>
</html>