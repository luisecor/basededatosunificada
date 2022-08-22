<div class="d-flex flex-column align-items-center justify-content-center ">
    <div class="mt-5 shadow-box filter-container p-1">

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
                <?php foreach ($filtros as $filtro) {
        echo 
        "
        <div >
            <div class='mx-2 filter-row p-1'>

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
       
        
    }?>
            </div>
            <div class="m-2">
            <button type="submit" class="filter-btn"> Aplicar Filtros </button>
            </div>
        </form>

    </div>
</div>


<script src="<?=base_url?>js/filtros.js"></script>