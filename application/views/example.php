<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body>
	<div>
		<a href='<?php echo site_url('examples/bada_celulares')?>'>Usuarios Bada</a> |
		<a href='<?php echo site_url('examples/sas_activos')?>'>Activos</a> |
		<a href='<?php echo site_url('examples/tabla_facts')?>'>Tabla de Historicos</a> |
		<!-- <a href='<?php echo site_url('examples/roles_asignados')?>'>Roles Asignados</a> |
		<a href='<?php echo site_url('examples/tabla_roles')?>'>Tabla de Roles</a> |
		<a href='<?php echo site_url('examples/tabla_acciones')?>'>Tabla de Acciones</a> |
		<a href='<?php echo site_url('examples/taba_rol_acciones')?>'>Tabla de Rol-Acciones</a> | -->
		<a href='<?php echo site_url('examples/tabla_tags')?>'>Tabla de Tags</a> |
		<!-- <a href='<?php echo site_url('examples/tabla_tag_asignado')?>'>Tabla de CUIT-TAG</a> | -->
<!-- 		 
		<a href='<?php echo site_url('examples/employees_management')?>'>Employees</a> |		 
		<a href='<?php echo site_url('examples/film_management')?>'>Films</a> |
		<a href='<?php echo site_url('examples/multigrids')?>'>Multigrid [BETA]</a> -->
		
	</div>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
