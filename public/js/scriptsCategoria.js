function smoothScroll(event, targetId) {
    event.preventDefault(); // Evita el comportamiento por defecto del enlace
    const targetSection = document.getElementById(targetId);
    if (targetSection) {
        targetSection.scrollIntoView({
            behavior: 'smooth' // suavecito
        });
    }
}


document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.aña-button');
    const cart = document.getElementById('cart');
    const closeButton = document.getElementById('close-cart');
    const cartItems = document.getElementById('cart-items');
    const overlay = document.querySelector('.overlay');
    const totalDisplay = document.createElement('div'); // Para mostrar el total
    let totalPrice = 0; // Variable para el total

    // Añadir el display del total al carrito
    totalDisplay.innerHTML = `<strong>Total: $<span id="total-price">0.00</span></strong>`;
    cart.appendChild(totalDisplay);

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const title = this.getAttribute('data-title');
            const price = parseFloat(this.getAttribute('data-price').replace('$', '')); // Convertir el precio a número
            const image = this.getAttribute('data-image');

            // VERIFICAR SI EL ITULO Y LA IMG NO SEAN NULOS
            if (title && price && image) {
                // AÑADIR ITEM
                const listItem = document.createElement('li');

                // IMAGEN Y BOTON ELIMINAR YA PUESTOS O DEFINIDOS
                listItem.innerHTML = `
                <img src="${image}" alt="${title}" style="width: 100px; height: auto; margin-right: 20px;">
                <div style="flex-grow: 1; margin-right: 10px;">
                    <span>${title}</span>
                    <span style="display: block; margin-top: 10px; color: #fff;">$${price.toFixed(2)}</span>
                </div>
                <button class="remove-button" style="margin-left: 15px;">x</button>
            `;
                cartItems.appendChild(listItem);



                // SUMAR EL PRECIO AL TOTAL
                totalPrice += price;
                document.getElementById('total-price').textContent = totalPrice.toFixed(2);

                

                // BOTON ELIMINAR
                const removeButton = listItem.querySelector('.remove-button');
                removeButton.addEventListener('click', function() {
                    cartItems.removeChild(listItem);
                    totalPrice -= price; // PRECIO-TOTAL
                    document.getElementById('total-price').textContent = totalPrice.toFixed(2); // Actualizar el total
                });
            } else {
                console.error('Título, precio o imagen no encontrados:', title, price, image);
            }

            // Mostrar carrito
            cart.classList.add('cart-visible');
            cart.classList.remove('cart-hidden');
            overlay.style.display = 'block'; // Mostrar superposición
        });
    });

    closeButton.addEventListener('click', function() {
        cart.classList.remove('cart-visible');
        cart.classList.add('cart-hidden');
        overlay.style.display = 'none'; // Ocultar superposición
    });

    overlay.addEventListener('click', function() {
        cart.classList.remove('cart-visible');
        cart.classList.add('cart-hidden');
        overlay.style.display = 'none'; // Ocultar superposición
    });
});