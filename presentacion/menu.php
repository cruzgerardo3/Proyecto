<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-4">
        <?php 
        if ($_SESSION['tipousuario'] == "A"){
         ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?mod=me&form=li">Medicos</a>
        </li>
      <?php 
        } 
        ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?mod=pa&form=li">Pacientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="index.php?mod=con&form=li">Consultas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Mi cuenta</a></li>
            <li><a class="dropdown-item" href="cerrarSesion.php">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="d-flex">
          <label class="me-4">Bienvenido:<strong> Dr/a <?php echo $_SESSION['apellidos']; ?></strong></label>
      </div>
  </div>
</nav>