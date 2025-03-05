document.querySelector("#menu-toggle").addEventListener("click", ()=>{
    document.querySelector("#side-menu").classList.toggle("translate-x-full");
});
document.querySelector("#close-menu").addEventListener("click", function() {
    document.querySelector("#side-menu").classList.add("translate-x-full");
});

// Variables de control del carrusel
const carousel = document.querySelector("#carousel");
const dots = document.querySelectorAll(".carousel-nav-dot"); // Los puntos de navegación
let currentIndex = 0;
const totalItems = dots.length;

// Función para mover el carrusel
const moveCarousel = (index) => {
    const offset = -index * 100; // Desplazar a la izquierda según el índice
    carousel.style.transform = `translateX(${offset}%)`;

    // Actualizar los puntos
    dots.forEach((dot, idx) => {
        if (idx === index) {
            dot.classList.add("bg-white");
            dot.classList.add("rounded-xl");
        } else {
            dot.classList.remove("bg-white");
            dot.classList.remove("rounded-xl");
        }
    });
};

// Mover al siguiente item
const nextItem = () => {
    currentIndex = (currentIndex + 1) % totalItems;
    moveCarousel(currentIndex);
};

// Mover al item anterior
const prevItem = () => {
    currentIndex = (currentIndex - 1 + totalItems) % totalItems;
    moveCarousel(currentIndex);
};

// Funciones de control de flechas
document.querySelector("#prev-btn").addEventListener("click", prevItem);
document.querySelector("#next-btn").addEventListener("click", nextItem);

// Puntos de control
dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
        currentIndex = index;
        moveCarousel(currentIndex);
    });
});

// Mover automáticamente cada 10 segundos
setInterval(nextItem, 10000);

// Iniciar el carrusel en la primera imagen
moveCarousel(currentIndex);


document.querySelectorAll(".scroll-container").forEach(container => {
    let isDown = false;
    let startX;
    let scrollLeft;

    container.addEventListener("mousedown", (e) => {
        isDown = true;
        container.classList.add("active");
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
    });
    container.addEventListener("mouseleave", () => {
        isDown = false;
        container.classList.remove("active");
    });
    container.addEventListener("mouseup", () => {
        isDown = false;
        container.classList.remove("active");
    });
    container.addEventListener("mousemove", (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 2; // Velocidad del arrastre
        container.scrollLeft = scrollLeft - walk;
    });
});
