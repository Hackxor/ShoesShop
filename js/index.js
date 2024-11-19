


document.addEventListener("DOMContentLoaded", ()=>{
      
      const abrir_crear_cuenta = document.querySelector("#crear_cuenta");
      const iniciar_cuenta = document.querySelector("#iniciar_sesion");
      const formulario_crear_cuenta = document.querySelector(".login_registrar");
      const formulario_iniciar_sesion = document.querySelector(".login_iniciar");
      

abrir_crear_cuenta.addEventListener('click',()=>{

       formulario_iniciar_sesion.style.display="none";
        formulario_iniciar_sesion.style.opacity = 0;
       formulario_crear_cuenta.style.display="flex";
        formulario_crear_cuenta.style.opacity = 1;
        formulario_crear_cuenta.style.top = "80px";
        formulario_crear_cuenta.style.right = "35%";
        formulario_iniciar_sesion.style.right = "0";

});

iniciar_cuenta.addEventListener('click',()=>{

      formulario_crear_cuenta.style.opacity = 0;
      formulario_iniciar_sesion.style.opacity = 1;
      formulario_crear_cuenta.style.right = "0";
      formulario_iniciar_sesion.style.right = "35%";
      formulario_iniciar_sesion.style.display="flex";
                        
});

});
