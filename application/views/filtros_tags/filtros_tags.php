<!--Make sure the form has the autocomplete function switched off:-->



<p> Proximo cambio :</p> <br> <p>Eston seran los filtros que apareceran en el encabezado de las columnas de cada tabla. Cada uno de los inputs 
  tendra los valores que puede tomar cada busqueda
</p>

<div class ="ro" >

  

</div>



<form  id="formFiltros"  autocomplete="off" action="filtro_col" method="post">
<div class="col-3">
    SELECCIONAR TABLA:
    <select name="" id="tabla_selection">
      <option  value="mujeres_lideres">Mujeres Lideres</option>
      <option selected="selected" value="jovenes">Jovenes</option>

    </select>
  </div>
<div class="row">
  <div id="FormOptions" class="d-flex flex-wrap justify-content-between">
    

  

  </div>
</div>

  <input type="submit">
</form>





<script src="<?=base_url?>js/filtro_col.js"></script>

<script>



<?php $selected =(isset($_SESSION['filtro_col_selected'])? $_SESSION['filtro_col_selected'] : "LOCA"); ?>;
const  selected = <?php echo json_encode($selected); ?>;

<?php $selected_table =(isset($_SESSION['table']) ? $_SESSION['table'] : null ); ?>;
const  selected_table = <?php echo json_encode($selected_table); ?>;


  $(document).ready(function() {

    $("#tabla_selection")
    .change(function() {
      tabla = this.value;

    })
   
    var columnas = ['cuit','documento','ministerio','secr','ss','dg'];

      $.each(columnas, function(i, idName) {

        //Creo los div con las columnas que deseo filtrar
        //Tal cual aparecen en la tabla cuit_reparticion
        var $DIV = $(
                      "<div class='col-3'>"+
                      `<select id="${idName}" name="${idName}[]" class="form-control"  multiple>` +   
                      "</select>"+
                      "</div>"
                    );
        //Le hago append del div que cree
        $("#FormOptions").append($DIV);
        //Cargo los datos del selectable
        cargar(selected_table,idName);
        //Inicio select2 para el div creado
        $(`#${idName}`).select2({
            placeholder: `${idName}`,
            minimumInputLength: 1
         });
      })


});


const arreglo=[];

function cargar(tabla,idName) {
  // console.log(selected[idName]);
  $.ajax({
  url:  `traer/mujeres_lideres/${idName}`,
  dataType: 'JSON',
  success: function (result){
    
    
    $.each(result, function(i, item) {
      arreglo.push(item[0]);
      let selected_ ;
      if (item[0] && selected[idName] && selected[idName].includes(item[0]) ) { 
            selected_ = 'selected="selected"';}
       
     
      
      var $container = $(`<option ${selected_} value="${item}"> ${item} <option>`);
      $(`#${idName}`).append($container);
    })
    
  }
  })
 }



</script>



<style>


* { box-sizing: border-box; }
body {
  font: 16px Arial;
}
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}
input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}
input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}

.pill {
    display: inline-block;
    margin: 20px 10px 0 0;
    padding: 6px 12px;
    background: #eee;
    border-radius: 20px;
    font-size: 12px;
    letter-spacing: 1px;
    font-weight: bold;
    color: #777;
    cursor: pointer;
  }

</style>