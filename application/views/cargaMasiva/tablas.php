<div class="container mt-5 d-flex flex-column align-items-center">
    <div class="card w-50">
        <div class="card-header text-center d-flex flex-colum justify-content-center">
            <h2 class="h4 mb-0">Importar datos</h2>
        </div>
        <div class="card-body mt-2 mx-1">
            <div class="mt-2">
                <div class="mt-2">
                    <?php if (isset($mensaje)){ ?>
                    <div class="alert alert-class">
                        <?=$mensaje?>
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
				
				
				foreach ($tableList as $importData) {
                    echo 
                    "
							<option value='{$importData['nombre_tabla']}'>{$importData['nombre']}</option	>
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
              
            </form>
        </div>
    </div>
</div>

<div class="filter-list">