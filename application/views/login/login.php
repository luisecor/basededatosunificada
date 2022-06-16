<div class="row">
    <div>
        <h2 class="text-center"> Bienvenido a la </h2>
        <h1 class="text-center"> Base de Datos Unificada </h1>
        <p class="text-center">Para poder utilizar la BDU debe solicitar acceso y los persisos necesarios a su nivel.</p>
    </div>
<form action="<?=base_url('confirm')?>" method="post" id="formLogin">
    <div class="mb-3">
        <label for="cuit_username" class="form-label">CUIT - Usuario</label>
        <input type="text" name="user_name" class="form-control" id="cuit_username" aria-describedby="emailHelp" required>
        <div id="emailHelp" class="form-text">Ingrese CUIT o Usuario</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" id="password" minlength="8" maxlenght="10" required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="sesion_abierta" class="form-check-input" id="sesion_abierta">
        <label class="form-check-label" for="sesion_abierta">Mantener sesion abierta</label>
    </div>
    <button type="submit" class="btn btn-primary">Ingresar</button>
</form>


</div>
<script src="../js/hola.js"></script>
    