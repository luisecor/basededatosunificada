<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=site_url('examples')?>">BADA Unificada</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <!-- <a class="nav-link active" href='<?php echo site_url('examples/bada_celulares')?>'>Usuarios Bada</a> -->
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tablas
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
               <?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
                        in_array('GABINETE', array_column($this->session->acceso,'tabla'))) { ?>
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_gabinete')?>'>Gabinete</a></li>
               <?php }; ?> 
               <?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || in_array('SECRETARIOS', array_column($this->session->acceso,'tabla'))) { ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_secretarios')?>'>Secretarios</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
                        in_array('SUBSECRETARIOS', array_column($this->session->acceso,'tabla'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_SubSecretarios')?>'>SubSecretarios</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || in_array('PTES. COMUNAS', array_column($this->session->acceso,'tabla'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_ptesComunas')?>'>Ptes. Comunas</a></li>
               <?php } ?> 
               <?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || in_array('LEGISLADORES', array_column($this->session->acceso,'tabla'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_Legisladores')?>'>Legisladores</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || in_array('JDG', array_column($this->session->acceso,'tabla'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_JDG')?>'>JDG</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || in_array('DG', array_column($this->session->acceso,'tabla'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_DG')?>'>DG</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || in_array('GO', array_column($this->session->acceso,'tabla'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_GO')?>'>GO</a></li>
               <?php }; ?>  
                <li><hr class="dropdown-divider"></li>
               <?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || in_array('SAS ACTIVOS', array_column($this->session->acceso,'tabla'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/sas_activos')?>'>SAS Activos</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || in_array('MUERES LIDERES', array_column($this->session->acceso,'tabla'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_mujeres_lideres')?>'>Mujeres Lideres</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || in_array('USUARIOS BADA', array_column($this->session->acceso,'tabla'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/bada_celulares')?>'>Usuarios Bada</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || in_array('AFILIADOS', array_column($this->session->acceso,'tabla'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_Afiliados')?>'>Afiliados</a></li>
              <?php }?>  
                
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_tags')?>'>TAGS</a></li>
            </ul>
           
            <li class="nav-item dropdown justify-content-end">
            
            <?php if (in_array('SI', array_column($this->session->acceso,'carga_masiva')))  {  ?> 
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Carga Masiva
                    </a>
                    <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/guia_uso')?>'>Guia de uso</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/gabinete')?>'>Gabinete</a></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/tabla_secretarios')?>'>Secretarios</a></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/tabla_SubSecretarios')?>'>SubSecretarios</a></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/tabla_ptesComunas')?>'>Ptes. Comunas</a></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/tabla_Legisladores')?>'>Legisladores</a></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/tabla_JDG')?>'>JDG</a></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/tabla_DG')?>'>DG</a></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('excarga_masivaamples/tabla_GO')?>'>GO</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/sas_activos')?>'>SAS Activos</a></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/tabla_mujeres_lideres')?>'>Mujeres Lideres</a></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/bada_celulares')?>'>Usuarios Bada</a></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/tabla_Afiliados')?>'>Afiliados</a></li>
                        <li><a class="dropdown-item" href='<?php echo site_url('carga_masiva/tabla_tags')?>'>TAGS</a></li>
                    
                    </ul>
        <?php } ?>

            <li class="nav-item dropdown justify-content-end">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?=$this->session->user_name;?>
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href='<?=site_url('usuario/datos_ingreso')?>'>Datos de acceso</a></li>
                <li><a class="dropdown-item" href='<?=site_url('logout')?>'>Cerrar Sesion</a></li>
                <?php if (('SU' === $this->session->tipo_usuario))  {  ?> 
                    <li><hr class="dropdown-divider"> SUPER USER </li>
                    <li><a class="dropdown-item" href='<?php echo site_url('registrarUsuario')?>'>Registrar Nuevo Usuario</a></li>
                <?php } ?>
            </ul>

           
           
        </ul>
        
        </div>
     </div>
</nav>
<div class="container">