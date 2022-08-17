<div class="mt-3 d-flex flex-column justify-content-center  mt-4">
    <div class="d-flex align-items-center mb-3">

        <img src="<?=base_url?>css/png/robot.png" alt='robotito' />
        <p class="mb-0">Hola, <strong><?php echo $this->session->user_name; ?></strong></p>
    </div>

    <div class="d-flex flex-column justify-content-center">
        <p class=" mb-0">Nuestros datos:</p>
        <div class='d-flex flex-wrap justify-content-between'>

            <?php  if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                        in_array('GABINETE', array_column($this->session->acceso,'nombre'))) { ?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/tabla_gabinete')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Gabinete
                </a>
            </div>
            <?php }; ?>


            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                    in_array('SECRETARIOS', array_column($this->session->acceso,'nombre'))) { ?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/tabla_secretarios')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Secretarios</a>

            </div>
            <?php }; ?>


            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                        in_array('SUBSECRETARIOS', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/tabla_SubSecretarios')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Subsecretarios</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                    in_array('PTES. COMUNAS', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/tabla_ptesComunas')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Ptes. Comunas</a>

            </div>
            <?php } ?>



            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) ||
             in_array('LEGISLADORES', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/tabla_Legisladores')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Legisladores</a>
            </div>
            <?php }; ?>



            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
            in_array('JDG', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/tabla_JDG')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    JDG</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
            in_array('DG', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/tabla_DG')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    DG</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
            in_array('GO', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/tabla_GO')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    GO</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
            in_array('SAS ACTIVOS', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/sas_activos')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    SAS Activos</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
            in_array('MUJERES LIDERES', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/tabla_mujeres_lideres')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Mujeres Lideres</a>
            </div>
            <?php }; ?>

            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
            in_array('USUARIOS BADA', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/bada_celulares')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Usuarios Bada</a>
            </div>
            <?php }; ?>
            <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) ||
             in_array('AFILIADOS', array_column($this->session->acceso,'nombre'))) {  ?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/tabla_Afiliados')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    Afiliados</a>
            </div>
            <?php }?>
            <div class='table-card d-flex justify-content-center align-items-center my-3'>
                <a href='<?php echo site_url('examples/tabla_tags')?>' class="d-flex align-items-center w-100 h-100">
                    <img src="<?=base_url?>css/svg/table.svg" alt="Icono de base de datos" class="ms-4 me-2">
                    TAGS</a>
            </div>
        </div>
    </div>