function crearDin(){
   //aquí instanciamos al componente padre
   var padre = document.getElementById("padre");
   //aquí agregamos el componente de tipo input
   var input = document.createElement("INPUT");
   //aquí indicamos que es un input de tipo text
   input.type = 'text';
   
   //y por ultimo agreamos el componente creado al padre
   padre.appendChild(input);
 }

 window.onload = function(){
   //Aquí referenciamos el botón que realizara la acción
   var btnAdd = document.getEmentById("btn_agregar");
   
   //Aquí solo mandamos llamar la función 
   btnAdd.onclick = crearDin;
}