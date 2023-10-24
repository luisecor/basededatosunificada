<div class="mt-3 d-flex flex-column justify-content-center  mt-4">
    <div class="d-flex align-items-center mb-3">

        <img src="<?=base_url?>css/png/robot.png" alt='robotito' />
        <p class="mb-0">Hola, <strong><?php echo $this->session->user_name; ?></strong></p>
    </div>
<?php  if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                        in_array('META', array_column($this->session->acceso,'nombre'))) { ?>
    <div class="d-flex flex-column justify-content-center">
        <p class=" mb-0">META:</p>
        <div class='d-flex flex-wrap justify-content-between'>

            
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('meta/jovenes')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Jovenes
                </a>
            </div>
            

           

        </div>



    </div>
    <?php }; ?> 

    <div class="d-flex flex-column justify-content-center">
        <p class=" mb-0">Vistas:</p>
        <div class='d-flex flex-wrap justify-content-between'>

            <?php if (in_array('TODAS', array_column($this->session->acceso_vistas,'nombre')) || 
                        in_array('COORDINACION Y PLANEAMIENTO', array_column($this->session->acceso_vistas,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('vista/coordinacion')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                   Coordinacion y Planeamiento</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso_vistas,'nombre')) || 
                        in_array('COACHES', array_column($this->session->acceso_vistas,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('vista/coaches')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                   Coaches</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso_vistas,'nombre')) || 
                        in_array('ECH', array_column($this->session->acceso_vistas,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('vista/ech')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                   ECH</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso_vistas,'nombre')) || 
                        in_array('ECI', array_column($this->session->acceso_vistas,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('vista/eci')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                   ECI</a>
            </div>
            <?php }; ?>


            <?php if (in_array('TODAS', array_column($this->session->acceso_vistas,'nombre')) || 
                        in_array('EMBAJADORES', array_column($this->session->acceso_vistas,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('vista/embajadores')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                   Embajadores</a>
            </div>
            <?php }; ?>


            <?php if (in_array('TODAS', array_column($this->session->acceso_vistas,'nombre')) || 
                        in_array('JOVENES', array_column($this->session->acceso_vistas,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('vista/jovenes')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                   Jóvenes</a>
            </div>
            <?php }; ?>


            <?php  if (in_array('TODAS', array_column($this->session->acceso_vistas,'nombre')) || 
                        in_array('LIDERES GCBA', array_column($this->session->acceso_vistas,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/lideres_gcba')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Lideres GCBA
                </a>
            </div>
            <?php }; ?>  

            <?php if (in_array('TODAS', array_column($this->session->acceso_vistas,'nombre')) || 
                        in_array('LIDERES GCBA', array_column($this->session->acceso_vistas,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/lideres_gcba_hacienda')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Lideres GCBA - Hacienda
                </a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso_vistas,'nombre')) || 
                        in_array('MARCA EMPLEADORA', array_column($this->session->acceso_vistas,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('vista/marca_empleadora')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                   Marca Empleadora</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso_vistas,'nombre')) || 
                        in_array('MUJERES LIDERES', array_column($this->session->acceso_vistas,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('vista/mujeres_lideres')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Mujeres Lideres</a>
            </div>
            <?php }; ?>

            

            <?php if (in_array('TODAS', array_column($this->session->acceso_vistas,'nombre')) || 
                        in_array('SECRETARIAS PARTICULAR', array_column($this->session->acceso_vistas,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('vista/secretarias_particular')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Secretarias Particular</a>
            </div>
            <?php }; ?>

            

            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/tags')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    TAGS</a>
            </div>

           

        </div>



    </div>

    <?php  if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                        in_array('ANALITICAS', array_column($this->session->acceso,'nombre'))) { ?>

    <div class="d-flex flex-column justify-content-center">
        <p class=" mb-0">Analíticas:</p>

        <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('analiticas/dashboard')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                   Datos Analiticos</a>
        </div>
    
    </div>

    <?php }; ?>

    <?php  if ($this->session->tipo_usuario == 'SU') { ?>

    <div class="d-flex flex-column justify-content-center">
        <p class=" mb-0">Nuestros datos:</p>
        <div class='d-flex flex-wrap justify-content-between'>

            <?php  if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                        in_array('LIDERES GCBA', array_column($this->session->acceso,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/lideres_gcba')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Lideres GCBA
                </a>
            </div>
            <?php }; ?>

            <?php  if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                        in_array('LIDERES GCBA', array_column($this->session->acceso,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/secretarias_particular')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Secretarias Particular -> IN PROGRESS
                </a>
            </div>
            <?php }; ?>

            <?php  if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                        in_array('GABINETE', array_column($this->session->acceso,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/gabinete')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Gabinete
                </a>
            </div>
            <?php }; ?>


            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                    in_array('SECRETARIOS', array_column($this->session->acceso,'nombre'))) { ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/secretarios')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Secretarios</a>

            </div>
            <?php }; ?>


            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                        in_array('SUBSECRETARIOS', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/subsecretarios')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Subsecretarios</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                    in_array('PTES. COMUNAS', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/ptes._comunas')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Ptes. Comunas</a>

            </div>
            <?php } ?>



            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) ||
             in_array('LEGISLADORES', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/legisladores')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Legisladores</a>
            </div>
            <?php }; ?>



            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
            in_array('JDG', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/jdg')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    JDG</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
            in_array('DG', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/dg')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    DG</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
            in_array('GO', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/go')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    GO</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
            in_array('SAS ACTIVOS', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/sas_activo')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    SAS Activos</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
            in_array('MUJERES LIDERES', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/mujeres_lideres')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Mujeres Lideres</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
            in_array('USUARIOS BADA', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/bada_celulares')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Usuarios Bada</a>
            </div>
            <?php }; ?>
            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) ||
             in_array('AFILIADOS', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card shadow-box d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('tabla/afiliados')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Afiliados</a>
            </div>
            <?php }?>
            
        </div>
    </div>
    <?php }; ?>