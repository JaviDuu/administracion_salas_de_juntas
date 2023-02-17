<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    //linking bootstrap CDN's (version 5.2)
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    //linking font awesome. mainly for the icons in the footer 
    <script src="https://kit.fontawesome.com/075aea6f98.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <header>
        //using bootstrap to make the header 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
                //add an image to the navbar
              <img src="{{URL('images/logo.jpg')}}" alt="Logo" width="40" height="40" class="d-inline-block align-text-top me-2">
              <span class="fs-4">Meeting Rooms</span>
            </a>
            //when the screen hits a small size the navbar will react 
            and make a button that collapses the navigation items
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                //none of the items direct to anywhere. theyre for cosmetic reasons 
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      
    <main>
        <br>
        //the table is made with bootstrap. the dimensions are 4 columns x 9 rows   
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
    //footer is made with bootstrap
    <footer class="bg-dark text-white py-3">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-6">
              <h3>Lion Systems Solutions</h3>
              <br>
              //using pre instead of p so the text can stay aligned with the title of the company
              <pre>
Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
Quia est velit unde optio totam inventore illum fugit per
doloribus id non laboriosam quaerat. Iste deleniti itaque
rerum repellat! Lorem ipsum dolor sit amet consectetur, a
Lorem ipsum dolor sit amet consectetur, adfugiat officiis.
              </pre>
            </div>
            <div class="col-12 col-md-6">
              <h3>Contact Us</h3>
              <br>
              <ul class="list-unstyled">
                //using public information on the official site
                <li><i class="fas fa-map-marker-alt me-2"></i> República de Perú 920-A, Jardines de Santa Elena, 20236 Aguascalientes, Ags.</li>
                <li><i class="fas fa-phone-alt me-2"></i>+52 (449) 454 0705</li>
                <li><i class="fas fa-envelope me-2"></i> contacto@lionintel.com</li>
              </ul>
              //here normally the class would be using bootstrap icons. but in this case we are using fontawesome, 
              as it is easier and more convenient to use
              <div class="d-flex">
                <a href="#" class="me-3 text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="me-3 text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="me-3 text-white"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="me-3 text-white"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-12">
                //add an image of the official logo in the bottom of the footer with a copyright notice
              <img src="{{URL('images/footer_logo.png')}}" alt="footer_image" width="150" height="120">
              <p class="text-muted small">© 2023 lion systems solutions. All rights reserved.</p>
            </div>
          </div>
        </div>
      </footer>
      
    
</body>
</html>