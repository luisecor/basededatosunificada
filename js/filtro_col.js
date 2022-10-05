"uses strict"

// let selected_values = new Map();
// let columnas = ['ministerio','secr','ss','dg'];
// let columnas_val = new Map();

// const formElement = document.getElementById("formFiltros");
// formElement.hidden = true;

// document.addEventListener("DOMContentLoaded", function(event) {

//   cargarDatos().then(respuesta => {
//     columnas.forEach( (K) => {
//       let input_ = document.getElementById(`input_${K}`);
//        autocomplete(input_,columnas_val.get(input_.name));
//        console.log("YA PODES");
//        formElement.hidden = false;
       
//     })
//   })
   
// })



// async function cargarDatos(){ 
//   const promesa = new Promise (async (resolve,reject)=>{
//     for (let key in columnas){
  
//       let url = "traer/"+columnas[key];
//       let dato = [];
//       let response = await fetch(url);
//       let data = await response.json();
//       data.forEach((j) =>{
//         if (j[0] !== null)
//         dato.push(j[0]);
//       })
//       columnas_val.set(columnas[key],dato);
//       selected_values.set(columnas[key],[]);
//      }
//      resolve(columnas_val);
//   });
 
//   return promesa;

// }
 






// function autocomplete(inp, arr) {
  
//   /*the autocomplete function takes two arguments,
//   the text field element and an array of possible autocompleted values:*/
//   var currentFocus;
//   /*execute a function when someone writes in the text field:*/
//   inp.addEventListener("input", function(e) {
//       var a, b, i, c,  val = this.value;
//       /*close any already open lists of autocompleted values*/
//       closeAllLists();
//       if (!val) { return false;}
//       currentFocus = -1;
//       /*create a DIV element that will contain the items (values):*/
//       a = document.createElement("DIV");
//       a.setAttribute("id", this.id + "autocomplete-list");
//       a.setAttribute("class", "autocomplete-items nuevo");
//       /*append the DIV element as a child of the autocomplete container:*/
//       this.parentNode.appendChild(a);
//       /*for each item in the array...*/
//       for (i = 0; i < arr.length; i++) {
   
//         if( ((arr[i]).toUpperCase()).includes(val.toUpperCase()) ){
//             /*create a DIV element for each matching element:*/
//           b = document.createElement("DIV");
//           /*make the matching letters bold:*/
//             let comienza;
//             comienza = ((arr[i]).toUpperCase()).indexOf(val.toUpperCase());
//           let fin = val.length;
//           let [princi, medio, fins] = [arr[i].slice(0,comienza), arr[i].slice(comienza,comienza+fin), arr[i].slice(comienza+fin)];
//           let bold= princi +"<b>" + medio + "</b>" + fins;
//            b.innerHTML = bold;

//           /*insert a input field that will hold the current array item's value:*/
//           b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          
//           /*execute a function when someone clicks on the item value (DIV element):*/
//               b.addEventListener("click", function(e) {
//               /*Insert the value selected into the array */
//               let value = this.getElementsByTagName("input")[0].value;
//               if (selected_values.has(inp.name)){
//                 if (!(selected_values.get(inp.name)).includes(value)){
//                   selected_values.get(inp.name).push(value);
//                 }
//               }
              
//               /*insert the value for the autocomplete text field:*/
//               // inp.value = "";
//               // let elemento = document.getElementById()
//               /*close the list of autocompleted values,
//               (or any other open lists of autocompleted values:*/
//               closeAllLists();
//               /*Put all the selected items into the div*/
//               addSelectedItems(inp);
//           });
//           a.appendChild(b);
            
            
//         }
//       }
//   });

//   function addSelectedItems(inp){
//     let nombre = inp.name;
//     let div_selected = document.getElementById(`filtros_col_${nombre}`);
//     let arr = selected_values.get(nombre);

//     if (div_selected.hasChildNodes()){
//       let cantElem = div_selected.childElementCount;
//       for (var ck = 0 ; ck<cantElem ; ck++){
//         div_selected.removeChild(div_selected.firstChild)
//      }
//      if (div_selected.hasChildNodes()){
//       div_selected.removeChild(div_selected.firstChild)
//      }

//     }
    
//    for (let key in arr){
//     let div_selectd_item = document.createElement("DIV");
//     div_selectd_item.className="pill";
//     div_selectd_item.addEventListener("click",(event) => {deleteSelectedItem(event,nombre)});
//     let span = document.createElement("SPAN");
//     span.innerHTML = arr[key];
//     div_selectd_item.appendChild(span);
//     div_selected.appendChild(div_selectd_item);    
//    }    
//   }

//   function deleteSelectedItem(e,parentName){
//     let selectd_to_remove = e.path[0].textContent;
//     let index = selected_values.get(parentName).indexOf(selectd_to_remove);
//     selected_values.get(parentName).splice(index,1);
//     e.path[2].removeChild(e.path[1]);
//   }

  
//   /*execute a function presses a key on the keyboard:*/
//   inp.addEventListener("keydown", function(e) {
//       var x = document.getElementById(this.id + "autocomplete-list");
//       if (x) x = x.getElementsByTagName("div");
//       if (e.keyCode == 40) {
//         /*If the arrow DOWN key is pressed,
//         increase the currentFocus variable:*/
//         currentFocus++;
//         /*and and make the current item more visible:*/
//         addActive(x);
//       } else if (e.keyCode == 38) { //up
//         /*If the arrow UP key is pressed,
//         decrease the currentFocus variable:*/
//         currentFocus--;
//         /*and and make the current item more visible:*/
//         addActive(x);
//       } else if (e.keyCode == 13) {
//         /*If the ENTER key is pressed, prevent the form from being submitted,*/
//         e.preventDefault();
//         if (currentFocus > -1) {
//           /*and simulate a click on the "active" item:*/
//           if (x) x[currentFocus].click();
//         }
//       }
//   });
//   function addActive(x) {
//     /*a function to classify an item as "active":*/
//     if (!x) return false;
//     /*start by removing the "active" class on all items:*/
//     removeActive(x);
//     if (currentFocus >= x.length) currentFocus = 0;
//     if (currentFocus < 0) currentFocus = (x.length - 1);
//     /*add class "autocomplete-active":*/
//     x[currentFocus].classList.add("autocomplete-active");
//   }
//   function removeActive(x) {
//     /*a function to remove the "active" class from all autocomplete items:*/
//     for (var i = 0; i < x.length; i++) {
//       x[i].classList.remove("autocomplete-active");
//     }
//   }
//   function closeAllLists(elmnt) {
//     /*close all autocomplete lists in the document,
//     except the one passed as an argument:*/
//     var x = document.getElementsByClassName("autocomplete-items");
//     for (var i = 0; i < x.length; i++) {
//       // x[i].remove();
//       if (elmnt != x[i] && elmnt != inp) {
//       x[i].parentNode.removeChild(x[i]);
//     }
//   }
// }
// /*execute a function when someone clicks in the document:*/
// document.addEventListener("click", function (e) {
//     closeAllLists(e.target);
// });
// }