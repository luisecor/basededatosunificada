<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=site_url('')?>">BaDa Unificada</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?=site_url('')?>">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href='<?php echo site_url('examples/bada_celulares')?>'>Usuarios Bada</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tablas
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_gabinete')?>'>Gabinete</a></li>
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_secretarios')?>'>Secretarios</a></li>
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_SubSecretarios')?>'>SubSecretarios</a></li>
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_ptesComunas')?>'>Ptes. Comunas</a></li>
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_Legisladores')?>'>Legisladores</a></li>
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_JDG')?>'>JDG</a></li>
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_DG')?>'>DG</a></li>
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_GO')?>'>GO</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_Afiliados')?>'>Afiliados</a></li>
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_mujeres_lidees')?>'>Mujeres Lideres</a></li>
                <li><a class="dropdown-item" href='<?php echo site_url('examples/tabla_tags')?>'>TAGS</a></li>
            </ul>
           
        </ul>
        
        </div>
     </div>
</nav>
<div class="container">