
<?php 

if($_POST){

 $persona = $_POST;
 $persona['fecha'] =time();
 core_persona::guardar($persona);
 

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- Bootstrap core CSS -->
  <link href="base/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="base/css/scrolling-nav.css" rel="stylesheet">

  <title>Tarea 2 - Conexion a base de datos</title>


</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Tarea 2</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Agregar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Listado</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Bienvenido a la Tarea 2 de Programacion III</h1>
      <p class="lead">Por: Jean Carlos Nuñez Liriano</p>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Sobre esta Tarea</h2>
          <p class="lead">Esta tarea es sobre poner a funcionar la Tarea 1 con bases de datos y utilizando el framework CodeIgnaiter. 
                          La tarea uno trataba sobre:
          </p>
          <p>Realiza un formulario que acepte los campos:</p>
          <ul>
            <li>Cedula, Nombre, Apellido, Tipo de Sangre (de un select), Genero: (Con radio), Comentario y Check box de que acento enviar mi informacion.</li>
            <li>Los datos no se enviaran hasta que marquen el check y este todo lleno.</li>
            <li>Debajo del formulario aparecera los intentos anteriores.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2>Agregar Nueva Persona</h2>

          <?php
            $array = array (
               "A+","A-","B+","B-","AB+","AB-","O+","O-"
            )
          ?>

          <h1>Formulario</h1>
         <form method="post" action="" class = "needs-validation" novalidate >
             <div class="row">
                 <div class="col-md-10">
                        <?= asgInputNum('Cedula', 'cedula');?>
                        <div class="form-row">
                            <div class = "form-group col-md-6">
                                <?= asgInput ('Nombre', 'nombre');?>
                            </div>
                            <div class = "form-group col-md-6">
                                <?= asgInput ('Apellido', 'apellido');?>
                            </div>
                        </div>     
                         
                        <div class="form-row"> 
                            <label>Genero: </label>
                            <div class="form-group col-md-6 form-check form-check-inline" >
                            
                                <?= asgInputR('Maculino', 'genero');?>
                                <?= asgInputR('Femenino', 'genero');?>
                            </div> 
                        </div>
                        <?= asgSelect('Tipo de Sangre','tipificacion', $array);?>
                        <?= asgTextArea('Comentarios', 'comentarios');?>
                        <div class= "form-check">
                            <input class = "form-check-input" type = "checkbox" required/>
                            <label class= "form-check-label">Esta seguro que quiere enviar la informacion?</label>
                            <div class = "valid-feedback">Luce Bien!</div>
                            <div class = "invalid-feedback">Confirme el envio de datos</div>

                        </div>
                        <br>
                        <button type="sumit" class="btn btn-primary">Guardar</button>
                 </div>
            </div>

        
         </form>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 mx-auto">
          <h2>Lista de Personas</h2>
          <table class = "table table-dark">
       <thead>
          <tr>
            <th>Cedula</th>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Genero</th>
            <th>Tipo de Sangre</th>
            <th>Comentario</th>

          </tr>
       </thead>
       <tbody> 
            <?php
             $rs = core_persona::listado();
             foreach($rs as $persona){
                 $url_borrar="base/main/{$persona->ID}";
                 $persona->fecha=date('d/m/Y', $persona->fecha);
                echo "
                <tr>
                <td>{$persona->cedula}</td>
                <td>{$persona->fecha}</td>
                <td>{$persona->nombre}</td>
                <td>{$persona->apellido}</td>    
                <td>{$persona->genero}</td>
                <td>{$persona->tipificacion}</td>
                <td>{$persona->comentarios}</td>
                </tr>";               

             }
            ?>
       </tbody>
    </table>

        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="base/vendor/jquery/jquery.min.js"></script>
  <script src="base/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="base/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="base/js/scrolling-nav.js"></script>

<!--tarea I script-->
  <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>