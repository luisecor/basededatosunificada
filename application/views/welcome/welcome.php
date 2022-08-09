<h1>hola welcome page</h1>

<?php echo $this->session->user_name; ?>

<?php if (isset($ingresado)) {
    echo "<h1>".$ingresado."</h1>"; 
} ?>

<?php if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
                        in_array('GABINETE', array_column($this->session->acceso,'tabla'))) { ?>
                <button><a  href='<?php echo site_url('examples/tabla_gabinete')?>'>Gabinete</a></button>
               <?php }; ?> 