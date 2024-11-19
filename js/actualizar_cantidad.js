// Función para recalcular el total general
function recalcularTotal() {
    let totalGeneral = 0;
    document.querySelectorAll(".caja").forEach((caja) => {
        const precioUnitario = parseFloat(caja.dataset.precioUnitario);
        const stockActual = parseInt(caja.querySelector("#stock").textContent);
        totalGeneral += precioUnitario * stockActual;
    });

    // Actualiza el total general en el frontend
    const totalSpan = document.getElementById("total_general");
    totalSpan.textContent = `Total: $${totalGeneral.toFixed(2)}`;
}

// Lógica para aumentar/disminuir cantidad y recalcular precios
document.querySelectorAll(".boton1").forEach((button) => {
    button.addEventListener("click", (event) => {
        const button = event.currentTarget;
        const parent = button.closest(".caja");
        const precioUnitario = parseFloat(parent.dataset.precioUnitario); // Precio unitario del producto
        const precioSpan = parent.querySelector("#precio_tenis");
        const id = parent.dataset.id; // ID del producto
        const stockSpan = parent.querySelector("#stock");
        let stockActual = parseInt(stockSpan.textContent);

        // Determina si se está sumando o restando
        if (button.querySelector(".fa-plus")) {
            stockActual++;
        } else if (button.querySelector(".fa-minus") && stockActual > 1) {
            stockActual--;
        }

        // Actualiza la cantidad en el frontend
        stockSpan.textContent = stockActual;

        // Recalcula y actualiza el precio total del producto en el frontend
        const precioTotal = precioUnitario * stockActual;
        precioSpan.textContent = `$${precioTotal.toFixed(2)}`;

        // Recalcula el total general
        recalcularTotal();

        // Enviar actualización al backend
        fetch("../php/actualizar_cantidad.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `id=${id}&stock=${stockActual}`,
        })
            .then((response) => response.json())
            .then((data) => {
                if (!data.success) {
                    alert("Error al actualizar: " + data.message);
                }
            })
            .catch((error) => {
                console.error("Error al enviar la solicitud:", error);
            });
    });
});

// Lógica para eliminar un producto

document.querySelector('.contenedor_carrito').addEventListener('click', (event) => {
    // Verifica si el botón presionado es el de eliminar
    if (event.target && event.target.id === 'eliminar_tenis') {
        const button = event.target;
        const parent = button.closest(".caja");
        const id = parent.dataset.id; // ID del producto

        // Elimina el elemento visualmente del DOM
        parent.remove();

        // Recalcula el total general
        recalcularTotal();

        // Enviar solicitud al backend para eliminar el producto
        fetch("../php/eliminar_carrito_tenis.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `eliminar_carrito=true&id=${id}`, // Se envía el id y la clave eliminar_carrito
        })
            .then((response) => response.json()) // Se espera una respuesta JSON
            .then((data) => {
                if (!data.success) {
                    alert("Error al eliminar: " + data.message);
                }
            })
            .catch((error) => {
                console.error("Error al enviar la solicitud:", error);
            });
    }
});

// Inicializa el total general al cargar la página
recalcularTotal();

