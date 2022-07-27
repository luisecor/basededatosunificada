<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<form action="<?=base_url('registroVerificar')?>" method="post" id="formRegistro" class="needs-validation">
    <?php if(isset($error)) { 
    echo 
    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    
    <ul class="list-group">';

    foreach ($error as $err) 
    echo  '<li class="list-group-item list-group-item-danger"> <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>' . $err . "</li>";
    echo '
    </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; } ?>
    <div class="mb-3">
        <label for="cuit_username" class="form-label">CUIT</label>
        <input type="text" name="cuit" class="form-control <?php if(isset($tipo) && in_array("1", $tipo)) echo "is-invalid"?>" id="cuit" aria-describedby="emailHelp"  required <?php if(isset($usuario)) echo "placeholder=".$usuario['cuit'] ?> >
        <div id="emailHelp" class="form-text">Ingrese CUIT</div>
        <div class="invalid-feedback"> Cuit incorrecto. </div>
    </div>
    <div class="mb-3">
        <label for="cuit_username" class="form-label">Usuario</label>
        <input type="text" name="user_name" class="form-control <?php if(isset($tipo) && in_array("2", $tipo)) echo "is-invalid"?>" id="username" aria-describedby="emailHelp" required <?php if(isset($usuario)) echo "placeholder=".$usuario['user_name'] ?>>
        <div id="emailHelp" class="form-text">Ingrese Usuario</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" id="password" minlength="8" maxlenght="10" required>
    </div>
    <div class="mb-3">
        <label for="tablas" class="form-label">Acceso a Tablas</label>
        <select name="acceso_a_tabla" >
          <option value="TODAS"> TODAS </option>
          <option value="GABINETE">Gabinete</option>
          <option value="SECRETARIOS">Secretarios</option>
          <option value="SUBSECRETARIOS">SubSecretarios</option>
          <option value="PTES. COMUNAS">Ptes. Comunas</option>
          <option value="LEGISLADORES">Legisadores</option>
          <option value="JDG">JDG</option>
          <option value="DG">DG</option>
          <option value="GO">GO</option>
          <option value="SAS ACTIVOS">SAS Activos</option>
          <option value="MUJERES LIDERES">Mujeres Lideres</option>
          <option value="USUARIOS BADA">Usuarios Bada</option>
          <option value="AFILIADOS">Afiliados</option>
        </select>
        <label for="rol" class="form-label">ROL</label>
        <select name="rol" >
          <option value="SU">Super Usuario</option>
          <option value="CREAT">Crear, Ver y Modificar</option>
          <option value="UPDATE">Ver y Modificar</option>
          <option value="VIEW">Solo Ver</option>
          <!-- <option value="CREAT">Solo Ver</option> -->
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Registrar</button>
    <button type="button" class="btn btn-primary" onclick="history.back()" id="cancelar">Cancelar</button>
</form>

<script src="<?=base_url?>js/registro.js"></script>