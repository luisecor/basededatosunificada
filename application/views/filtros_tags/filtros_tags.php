
<form action="<?=site_url()?>filtro_tags" method="post">
    <?php foreach ($filtros as $filtro) {
        echo 
        "
        <div class='row'>
            <div class='col'>

                <input name='filtro[]' class='form-check-input filtroNombre' type='checkbox' value='{$filtro['id']}' id='{$filtro['nombre']}'>
                <label class='form-check-label' for='{$filtro['nombre']}'>{$filtro['nombre']}</label>
                
            
            </div>" . 
            // <div class='col'>
            //     <div class='form-check form-switch'>
            //         <input name='incluye[]' class='form-check-input' disabled type='checkbox' role='switch' id='incluye{$filtro['id']}'  value='{$filtro['id']}'>
            //         <label class='form-check-label' for='incluye{$filtro['id']}' id='labelincluye{$filtro['id']}'>Contiene palabra</label>
            //     </div>
            
            
            // </div> 
              "
        </div>
        ";
        if (in_array($filtro['id'], array_column($this->session->filtro_busqueda,'filtro')) )
        echo "ESTE SE FILTRA";
        
    }?>
    <button type="submit" class="btn btn-primary"> Filtrar </button>
</form>

<script src="<?=base_url?>js/filtros.js"></script>

