<?php
	$this->set_css($this->default_theme_path.'/flexigrid/css/flexigrid.css');
	$this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);

	if ($dialog_forms) {
        $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
        $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
        $this->set_js_lib($this->default_javascript_path.'/common/lazyload-min.js');
    }

    $this->set_js_lib($this->default_javascript_path.'/common/list.js');

	$this->set_js($this->default_theme_path.'/flexigrid/js/cookies.js');
	$this->set_js($this->default_theme_path.'/flexigrid/js/flexigrid.js');

    $this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');

	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.numeric.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid/js/jquery.printElement.min.js');

	/** Jquery UI */
	$this->load_js_jqueryui();

?>
<script type='text/javascript'>
	var base_url = '<?php echo base_url();?>';

	var subject = '<?php echo addslashes($subject); ?>';
	var ajax_list_info_url = '<?php echo $ajax_list_info_url; ?>';
	var unique_hash = '<?php echo $unique_hash; ?>';
	var export_url = '<?php echo $export_url; ?>';

	var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";

</script>
<div id='list-report-error' class='report-div error'></div>
<div id='list-report-success' class='report-div success report-list' <?php if($success_message !== null){?>style="display:block"<?php }?>><?php
if($success_message !== null){?>
	<p><?php echo $success_message; ?></p>
<?php }
?></div>
<div class="flexigrid" style='width: 100%;' data-unique-hash="<?php echo $unique_hash; ?>">
	<div id="hidden-operations" class="hidden-operations"></div>
	<div class="mDiv">
		<div class="ftitle">  <?php if(isset($_SESSION['tabla'])) echo "Tabla {$_SESSION['tabla']}" ; ?>
			&nbsp;
		</div>
		<div title="<?php echo $this->l('minimize_maximize');?>" class="ptogtitle">
			<span></span>
		</div>
	</div>
	<div id='main-table-box' class="main-table-box">

	<?php if(!$unset_add || !$unset_export || !$unset_print){?>
	<div class="tDiv">
		<?php if(!$unset_add){?>
		<div class="tDiv2">
        	<a href='<?php echo $add_url?>' title='<?php echo $this->l('list_add'); ?> <?php echo $subject?>' class='add-anchor add_button'>
			<div class="fbutton">
				<div>
					<span class="add"><?php echo $this->l('list_add'); ?> <?php echo $subject?></span>
				</div>
			</div>
            </a>
			<div class="btnseparator">
			</div>
		</div>
		<?php }?>
		<div class="tDiv3">
			<?php if(!$unset_export) { ?>
        	<a class="export-anchor" href="<?php echo $export_url; ?>" download>
				<div class="fbutton">
					<div>
						<span class="export"><?php echo $this->l('list_export');?></span>
					</div>
				</div>
            </a>
			<div class="btnseparator"></div>
			<?php } ?>
			<?php if(!$unset_print) { ?>
        	<a class="print-anchor" data-url="<?php echo $print_url; ?>">
				<div class="fbutton">
					<div>
						<span class="print"><?php echo $this->l('list_print');?></span>
					</div>
				</div>
            </a>
			<div class="btnseparator"></div>
			<?php }?>
		</div>
		<div class='clear'></div>
	</div>
	<?php }?>

	<div id='ajax_list' class="ajax_list">
		<?php echo $list_view?>
	</div>
	<?php echo form_open( $ajax_list_url, 'method="post" id="filtering_form" class="filtering_form" autocomplete = "off" data-ajax-list-info-url="'.$ajax_list_info_url.'"'); ?>
	<div class="sDiv quickSearchBox" id='quickSearchBox'>
		<div class="sDiv2">
			<?php echo $this->l('list_search');?>: <input type="text" class="qsbsearch_fieldox search_text" name="search_text" size="30" id='search_text'>
			<select name="search_field" id="search_field">
				<option value=""><?php echo $this->l('list_search_all');?></option>
				<?php foreach($columns as $column){
					 {?>
				<option value="<?php echo $column->field_name?>"><?php echo $column->display_as?>&nbsp;&nbsp;</option>
				<?php }}?>
			</select>
            <input type="button" value="<?php echo $this->l('list_search');?>" class="crud_search" id='crud_search'>
		</div>
		<div class='search-div-clear-button'> 
			<button type="button" class="search_clear" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Filtros Excluyentes
			</button>
		</div>
        <div class='search-div-clear-button'>
        	<input type="button" value="<?php echo $this->l('list_clear_filtering');?>" id='search_clear' class="search_clear">
        </div>
	</div>
	<div class="pDiv">
		<div class="pDiv2">
			<div class="pGroup">
				<span class="pcontrol">
					<?php list($show_lang_string, $entries_lang_string) = explode('{paging}', $this->l('list_show_entries')); ?>
					<?php echo $show_lang_string; ?>
					<select name="per_page" id='per_page' class="per_page">
						<?php foreach($paging_options as $option){?>
							<option value="<?php echo $option; ?>" <?php if($option == $default_per_page){?>selected="selected"<?php }?>><?php echo $option; ?>&nbsp;&nbsp;</option>
						<?php }?>
					</select>
					<?php echo $entries_lang_string; ?>
					<input type='hidden' name='order_by[0]' id='hidden-sorting' class='hidden-sorting' value='<?php if(!empty($order_by[0])){?><?php echo $order_by[0]?><?php }?>' />
					<input type='hidden' name='order_by[1]' id='hidden-ordering' class='hidden-ordering'  value='<?php if(!empty($order_by[1])){?><?php echo $order_by[1]?><?php }?>'/>
				</span>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<div class="pFirst pButton first-button">
					<span></span>
				</div>
				<div class="pPrev pButton prev-button">
					<span></span>
				</div>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<span class="pcontrol"><?php echo $this->l('list_page'); ?> <input name='page' type="text" value="1" size="4" id='crud_page' class="crud_page">
				<?php echo $this->l('list_paging_of'); ?>
				<span id='last-page-number' class="last-page-number"><?php echo ceil($total_results / $default_per_page)?></span></span>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<div class="pNext pButton next-button" >
					<span></span>
				</div>
				<div class="pLast pButton last-button">
					<span></span>
				</div>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<div class="pReload pButton ajax_refresh_and_loading" id='ajax_refresh_and_loading'>
					<span></span>
				</div>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<span class="pPageStat">
					<?php $paging_starts_from = "<span id='page-starts-from' class='page-starts-from'>1</span>"; ?>
					<?php $paging_ends_to = "<span id='page-ends-to' class='page-ends-to'>". ($total_results < $default_per_page ? $total_results : $default_per_page) ."</span>"; ?>
					<?php $paging_total_results = "<span id='total_items' class='total_items'>$total_results</span>"?>
					<?php echo str_replace( array('{start}','{end}','{results}'),
											array($paging_starts_from, $paging_ends_to, $paging_total_results),
											$this->l('list_displaying')
										   ); ?>
				</span>
			</div>
		</div>
		<div style="clear: both;">
		</div>
	</div>
	<?php echo form_close(); ?>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
              

                    <form action="<?=site_url()?>filtro_tags" method="post">
                        <div class="filter-title d-flex align-items-center justify-content-between my-3 mx-2">
                            <div class="d-flex align-items-center">
                            <svg class="ms-1" width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.03379 0.000281271H16.0333C16.2988 -0.00417085 16.5624 0.0442698 16.809 0.142779C17.0555 0.241288 17.28 0.387894 17.4693 0.57405C17.6586 0.760206 17.809 0.982185 17.9116 1.22705C18.0142 1.47191 18.0671 1.73475 18.0671 2.00025C18.0671 2.26575 18.0142 2.52859 17.9116 2.77345C17.809 3.01831 17.6586 3.24029 17.4693 3.42645C17.28 3.61261 17.0555 3.75921 16.809 3.85772C16.5624 3.95623 16.2988 4.00467 16.0333 4.00022H2.03379C1.76833 4.00467 1.50464 3.95623 1.25809 3.85772C1.01154 3.75921 0.787073 3.61261 0.597769 3.42645C0.408465 3.24029 0.258115 3.01831 0.155485 2.77345C0.0528557 2.52859 0 2.26575 0 2.00025C0 1.73475 0.0528557 1.47191 0.155485 1.22705C0.258115 0.982185 0.408465 0.760206 0.597769 0.57405C0.787073 0.387894 1.01154 0.241288 1.25809 0.142779C1.50464 0.0442698 1.76833 -0.00417085 2.03379 0.000281271V0.000281271ZM4.28379 6.50053H13.7833C13.9474 6.50053 14.11 6.53286 14.2616 6.59567C14.4132 6.65848 14.551 6.75055 14.6671 6.86661C14.7831 6.98267 14.8752 7.12046 14.938 7.2721C15.0008 7.42374 15.0332 7.58627 15.0332 7.75041C15.0332 7.91454 15.0008 8.07707 14.938 8.22871C14.8752 8.38035 14.7831 8.51814 14.6671 8.6342C14.551 8.75026 14.4132 8.84233 14.2616 8.90514C14.11 8.96795 13.9474 9.00028 13.7833 9.00028H4.28379C3.9523 9.00028 3.63439 8.8686 3.4 8.6342C3.1656 8.3998 3.03392 8.08189 3.03392 7.75041C3.03392 7.41892 3.1656 7.10101 3.4 6.86661C3.63439 6.63221 3.9523 6.50053 4.28379 6.50053V6.50053ZM6.78354 11.5H11.2835C11.6151 11.5 11.9331 11.6317 12.1675 11.8662C12.402 12.1006 12.5337 12.4186 12.5337 12.7502C12.5337 13.0817 12.402 13.3997 12.1675 13.6342C11.9331 13.8686 11.6151 14.0003 11.2835 14.0003H6.78354C6.45198 14.0003 6.134 13.8686 5.89955 13.6342C5.6651 13.3997 5.53339 13.0817 5.53339 12.7502C5.53339 12.4186 5.6651 12.1006 5.89955 11.8662C6.134 11.6317 6.45198 11.5 6.78354 11.5V11.5Z"
                                    fill="#4C5773" />
                            </svg>


                            <h5 class='mb-0 mx-2'>Filtrar por</h5>
                            </div>
                            <div class="d-flex">
                                <input type="checkbox" class="form-check-input me-2">
                                <p class="mb-0">Selecciona Todas</p>
                            </div>
                        </div>
                        <div class="filter-list">
                            <?php 
							if (isset($_SESSION['filtros'])) $filtros = $_SESSION['filtros']; else $filtros = null;
							if (isset($_SESSION['filtro_busqueda']))	{
								$filtro_busqueda = $_SESSION['filtro_busqueda'];
							} else $filtro_busqueda = null;	   	
						
							
							// foreach ($filtros as $filtro){
							// 	echo "{$filtro['id']}  ";
							// 	foreach ($filtro_busqueda as $filtro_b){
							// 		if ($filtro['id'] === $filtro_b[0])
							// 			echo " Iguales ";
							// 		echo "{$filtro_b[0]} <br>";
							// 	}
								
							// }
							
					foreach ($filtros as $filtro) {
						if (!is_null($filtro_busqueda)){ 
							foreach ($filtro_busqueda as $filtro_b)
								if ($filtro['id'] === $filtro_b[0]) {
									$cheked = "checked='true'";
									break;}
						} else
								$cheked = "";

								
                    echo 
                    "
                    <div >
                        <div class='mx-2 filter-row p-1'>

                            <input name='filtro[]' class='form-check-input filtroNombre m-0' type='checkbox' {$cheked} value='{$filtro['id']}' id='{$filtro['nombre']}'>
                            <label class='filter-label mb-0 ms-2' for='{$filtro['nombre']}'>{$filtro['nombre']}</label>
                        
                        </div>
                    </div>
                    "
					;
                }
				?>
               

        




      </div>
      <div class="modal-footer">
       
		</div>
						
						<div class="m-2">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        	<button type="submit" class="filter-btn"> Aplicar Filtros </button>
                        </div>
                    </form>
      </div>
    </div>
  </div>
</div>


<script src="<?=base_url?>js/filtros.js"></script>