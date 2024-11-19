




document.addEventListener("DOMContentLoaded", ()=>{
      
      const contenedor_productos = document.querySelector(".contenedor-productos");
      const cuadros2 = document.querySelector(".cuadro2");
      const cuadros3 = document.querySelector(".cuadro3");
      const cuadros4 = document.querySelector(".cuadro4");

      cuadros2.addEventListener('click',()=>{
            contenedor_productos.style.gridTemplateColumns = 'repeat(2,1fr)';
            contenedor_productos.style.gridTemplateRows = 'repeat(8,1fr)';
          });
          
          cuadros3.addEventListener('click',()=>{
          contenedor_productos.style.gridTemplateColumns = 'repeat(3,1fr)';
          contenedor_productos.style.gridTemplateRows = 'repeat(6,1fr)';
          });  
          
          cuadros4.addEventListener('click',()=>{
          contenedor_productos.style.gridTemplateColumns = 'repeat(4,1fr)';
          contenedor_productos.style.gridTemplateRows = 'repeat(4,1fr)';
          });
          
});

const menu = document.querySelector("#iframeHeader");
window.addEventListener("scroll",()=>{
if(window.scrollY > 300 ){
menu.style.position ="fixed"; 
menu.style.top = 0;
menu.style.boxShadow="0px 2px 7px #000";
}else{
    menu.style.position ="relative";
    menu.style.boxShadow="none";
}
});

// parte de ver y ocultar carrito

