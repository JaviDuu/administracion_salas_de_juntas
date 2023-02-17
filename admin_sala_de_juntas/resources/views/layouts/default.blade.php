<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    {{-- linking bootstrap CDN's (version 5.2) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    {{-- linking font awesome. mainly for the icons in the footer --}} 
    <script src="https://kit.fontawesome.com/075aea6f98.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <header>

      @yield('header-content')     

    </header>
      
    <main>
      <br>
      {{-- the table is made with bootstrap. the dimensions are 4 columns x 9 rows --}}
      <div class="container">
          <table class="table table-dark table-striped">
            <thead>
              <tr>
                <th>BOARDROOM</th>
                <th>AVAILABLE</th>
                <th>DEPARTURE TIME</th>
                <th>RESERVE</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>#1</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>#2</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>#3</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>#4</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>#5</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>#6</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>#7</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>#8</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
          
    </main>
    {{-- footer is made with bootstrap --}}
    <footer class="bg-dark text-white py-3">

      @yield('footer-content')  
      
    </footer>
      
</body>
</html>