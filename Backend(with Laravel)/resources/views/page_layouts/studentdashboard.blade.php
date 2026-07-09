<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Get to the sky')</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Registration Form </title>
    <style>
        .html{
           background-color: rgba(204, 204, 204);
        }
        .container {
            background-color: rgba(204, 204, 204); 
            padding: 20px;
            border-radius: 10px;
            position: relative; /* Ensure content stacks correctly above background */
            z-index: 1;
        }

        .row.jumbotron {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    
        @yield('content')
      
</body>
</html>