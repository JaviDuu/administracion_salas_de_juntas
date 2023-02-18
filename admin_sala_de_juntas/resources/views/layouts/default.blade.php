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
      <h1>Meeting Rooms Administration</h1>
      <?php 
        $servidor='localhost: 33065';
        $cuenta='root';
        $password='';
        $bd='meeting_rooms';  

        $conexion = new mysqli($servidor,$cuenta,$password,$bd);

        if ($conexion->connect_errno){
            die('Error en la conexion');
        }
      ?>
      
      {{-- the table is made with bootstrap. the dimensions are 4 columns x 9 rows --}}
      <div class="container" style="height: 500px;">
        <button type="button" class="btn btn-success">Create New Room</button>
        <?php
          $sql = 'SELECT * FROM boardroom';//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
          $resultado = $conexion -> query($sql); //aplicamos sentencia
          if ($resultado -> num_rows){ //si la consulta genera registros
              echo '<table class="table table-dark table-striped">';
                echo '<thead>';
                  echo '<tr>';
                    echo '<th>BOARDROOM</th>';
                    echo '<th>AVAILABLE</th>';
                    echo '<th>ENTRY TIME</th>';
                    echo '<th>DEPARTURE TIME</th>';
                    echo '<th>RESERVE</th>';
                    echo '<th>UPDATE/DELETE</th>';
                  echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                  while( $fila = $resultado -> fetch_assoc()){ //recorremos los registros obtenidos de la tabla
                    echo '<tr>';
                      echo '<td>'. $fila['id_room'] . '</td>';
                      echo '<td>'. $fila['availability'] . '</td>';
                      echo '<td>'. $fila['entry_time'] . '</td>';
                      echo '<td>'. $fila['departure_time'] . '</td>';
                      echo '<td>'.'<button type="button" class="btn btn-light">Reserve</button>'.'</td>';
                      echo '<td>'.'<button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">DELETE</button>'.'</td>';
                    echo '</tr>';
                  }
                echo '</tbody>';
              echo '</table">';
          }
        ?>
          
      </div>

    </main>
    {{-- footer is made with bootstrap --}}
      {{--<footer class="bg-dark text-white py-3">

        @yield('footer-content')  
        
      </footer>--}}
      
</body>

</html>