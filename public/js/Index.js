// TODO: SUBIR REPO, AGREGAR MODAL DE INSTRUCCIONES DE COMO FUNCION Y RESTRICCIÓN
const product_input = document.getElementById("product_input");
const order_product = document.getElementById("order_product");
const button_search = document.getElementById("button_search");

button_search.addEventListener("click" , (event) => {
    if(!validateInputs(product_input.value, order_product.value)){
        event.preventDefault();
        alert("No puede estar vacío o mayor a 50 caracteres ni menor o igual a 1");
    }
});

function validateInputs(input1, input2){
    
    if(input1 && input2){
        if(input1.length <= 1 || input1.length <= 1){
            return false;
        }else if(input1.length >= 50 || input1.length >= 50){
            return false;
        }
        else{
            return true;
        }
    }else{
        return false;
    }
}