<nav class="navbar navbar-expand-lg navbar-bg">
    <div class="container">
        <a class="navbar-brand" href="<?=site_url('ingreso')?>">BADA Unificada</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <!-- <a class="nav-link active" href='<?php echo site_url('examples/bada_celulares')?>'>Usuarios Bada</a> -->
            </li>
            <li class="nav-item dropdown">
                
            <a class="nav-link  table-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div>
                <img src="<?=base_url?>css/svg/white-table.svg" alt="Icono de base de datos" class="mx-1">
                Tablas
                </div>
                
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
               <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                        in_array('GABINETE', array_column($this->session->acceso,'nombre'))) { ?>
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_gabinete')?>'>Gabinete</a></li>
               <?php }; ?> 
               <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || in_array('SECRETARIOS', array_column($this->session->acceso,'nombre'))) { ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_secretarios')?>'>Secretarios</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
                        in_array('SUBSECRETARIOS', array_column($this->session->acceso,'nombre'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_SubSecretarios')?>'>SubSecretarios</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || in_array('PTES. COMUNAS', array_column($this->session->acceso,'nombre'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_ptesComunas')?>'>Ptes. Comunas</a></li>
               <?php } ?> 
               <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || in_array('LEGISLADORES', array_column($this->session->acceso,'nombre'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_Legisladores')?>'>Legisladores</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || in_array('JDG', array_column($this->session->acceso,'nombre'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_JDG')?>'>JDG</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || in_array('DG', array_column($this->session->acceso,'nombre'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_DG')?>'>DG</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || in_array('GO', array_column($this->session->acceso,'nombre'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_GO')?>'>GO</a></li>
               <?php }; ?>  
                <li><hr class="dropdown-divider"></li>
               <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || in_array('SAS ACTIVOS', array_column($this->session->acceso,'nombre'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/sas_activos')?>'>SAS Activos</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || in_array('MUJERES LIDERES', array_column($this->session->acceso,'nombre'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_mujeres_lideres')?>'>Mujeres Lideres</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || in_array('USUARIOS BADA', array_column($this->session->acceso,'nombre'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/bada_celulares')?>'>Usuarios Bada</a></li>
               <?php }; ?>  
               <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || in_array('AFILIADOS', array_column($this->session->acceso,'nombre'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_Afiliados')?>'>Afiliados</a></li>
              <?php }?>  
              <?php if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || in_array('TAGS', array_column($this->session->acceso,'nombre'))) {  ?> 
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_tags')?>'>TAGS</a></li>
              <?php } ?>  
            </ul>
           
            <li class="nav-item dropdown justify-content-end">
            <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
               
            </ul> -->

            <li class="nav-item dropdown justify-content-end">
            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?=base_url?>css/svg/settings.svg" alt="Icono de base de datos" class="mx-1">
            <?php echo $this->session->user_name; ?>
               
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href='<?=site_url('usuario/datos_ingreso')?>'>Datos de acceso</a></li>
                
                <?php if (('SU' === $this->session->tipo_usuario))  {  ?> 
                    <li><a class="dropdown-item" href='<?php echo site_url('registrarUsuario')?>'>Registrar Nuevo Usuario</a></li>
                    <li><a class="dropdown-item" href='<?php echo site_url('usuarios/session')?>'>Permisos de Usuarios</a></li>
                <?php } ?>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href='<?=site_url('logout')?>'>Cerrar Sesion</a></li>
            </ul>

           
           
        </ul>
        <div>
        <a href='<?php echo site_url('logout')?>' class="d-flex align-items-center">
        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-1">
        <path d="M16.3713 0.984375C16.033 0.984375 15.7271 1.19045 15.5992 1.50498C15.4712 1.81952 15.5471 2.1796 15.79 2.41605L17.1456 3.76962H16.38C9.7972 3.76962 4.44203 9.12537 4.44203 15.7089C4.4377 16.0082 4.59603 16.2881 4.85414 16.4399C5.11441 16.5918 5.43542 16.5918 5.69569 16.4399C5.9538 16.2881 6.11214 16.0082 6.1078 15.7089C6.1078 10.0256 10.6973 5.43557 16.38 5.43557H17.1456L15.79 6.78915C15.5731 6.99956 15.4864 7.30975 15.5623 7.60043C15.6382 7.89327 15.866 8.12103 16.1588 8.19696C16.4494 8.27288 16.7596 8.18611 16.97 7.96919L19.6747 5.26203C19.8807 5.10585 20 4.85856 20 4.60043C19.9978 4.34012 19.8764 4.095 19.6681 3.93665L16.97 1.236C16.8116 1.07548 16.5969 0.984375 16.3713 0.984375ZM3.60915 0.993052C1.62672 0.993052 0 2.61995 0 4.6026V17.3748C0 19.3575 1.62672 20.9844 3.60915 20.9844H16.38C18.3624 20.9844 19.9892 19.3575 19.9892 17.3748V12.9323C19.9935 12.633 19.8352 12.3531 19.5771 12.2013C19.3168 12.0495 18.9958 12.0495 18.7355 12.2013C18.4774 12.3531 18.3191 12.633 18.3234 12.9323V17.3748C18.3234 18.4573 17.4623 19.3184 16.38 19.3184H3.60915C2.52684 19.3184 1.66576 18.4573 1.66576 17.3748V4.6026C1.66576 3.52017 2.52684 2.659 3.60915 2.659H8.05119C8.3505 2.66333 8.6303 2.50498 8.78213 2.24685C8.93396 1.98654 8.93396 1.6655 8.78213 1.4052C8.6303 1.14706 8.3505 0.988714 8.05119 0.993052H3.60915Z" fill="white"/>
    </svg>
        Salir</a>
        </div>
        </div>
     </div>
</nav>
<div class="container">