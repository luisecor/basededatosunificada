<style>
    .form-control{
        width: inherit;
    }
    .filter-row{
        display: table-row;

    }
    .table{
        overflow-x: scroll;
        display: inline-block;
    }

    .grocery-crud-table .btn-group.open ul{
        display: block;
        padding: 10px;
    }

    .grocery-crud-table .btn-group.open ul a{
        color: #000;
    }

</style>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>



	
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>

