<div class="container mt-5">
	<div class="card">
		<div class="card-header text-center">
			<strong>Carga masiva de datos - Tabla <?=  strtoupper($tabla)?></strong>
		</div>
		<div class="card-body">
		<div class="mt-2">
		<div class="mt-2">
			<?php if (isset($erro)){ ?>
				<div class="alert alert-class" >
					<?=$error?>
				</div>
			<?php } ?>
			
		</div>	

		</div>	
			<form action="<?=site_url('carga_masiva/'.strtolower($tabla).'/importarCSVaDB') ?>" method="post" enctype="multipart/form-data">
				<div class="form-group mb-3">
					<div class="mb-3">
						<input type="file" name="file" class="form-control" id="file">
					</div>					   
				</div>
				<div class="d-grid">
					<input type="submit" name="submit" value="IMPORTAR" class="btn btn-dark" />
				</div>
                <input type="input" name="tabla" value="<?=strtolower($tabla)?>" hidden>
			</form>
		</div>
	</div>
</div>