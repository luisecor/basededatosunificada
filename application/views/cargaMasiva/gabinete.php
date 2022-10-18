<div class="container mt-5 d-flex flex-column align-items-center">
    <div class="card w-50">
        <div class="card-header text-center d-flex flex-colum justify-content-center">
            <h2 class="h4 mb-0">Importar datos</h2>
        </div>
        <div class="card-body mt-2 mx-1">
            <div class="mt-2">
                <div class="mt-2">
                    <?php if (isset($erro)){ ?>
                    <div class="alert alert-class">
                        <?=$error?>
                    </div>
                    <?php } ?>

                </div>

            </div>
            <form action="<?=site_url('carga_masiva/tabla/importarCSVaDB') ?>" method="post"
                enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <div class="mb-3">
                        <select class="form-control" name='importData'>

                            <?php 
				$tableList = ['gabinete' ,
				'jdg', 'mujeres' ,
				'jovenes','lideres' ,
				'secretaria','go' ,
				'dg'];
				
				foreach ($tableList as $importData) {
                    echo 
                    "
							<option value='{$importData}'>{$importData}</option	>
                    ";
                }
				

				?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="file" class="form-control" id="file">
                    </div>
                </div>
                <div class="d-grid">
                    <input type="submit" name="submit" value="IMPORTAR" class="filter-btn" />
                </div>
                <input type="input" name="tabla" value="<?=strtolower($tabla)?>" hidden>
            </form>
        </div>
    </div>
</div>

<div class="filter-list">