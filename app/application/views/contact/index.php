<?php $this->load->view('includes/header'); ?>

<div class="flex items-center font-semibold p-5 bg-white rounded-lg font-sans text-lg">
    <div class="w-1/3 pr-4"> <!-- Ajusta el ancho y el margen derecho -->
        <img src="<?= base_url();?>public/images/maps.jpg" alt="Descripción de la imagen" class="rounded-lg"> <!-- Añade la ruta a tu imagen -->
        <a href="https://www.google.com/maps?q=Av.+Santa+Fe+1290" target="_blank" class="text-blue-500 hover:underline">
            Av. Santa Fe 1290, entre Libertad y Cerrito, Buenos Aires, Argentina.
        </a>
    </div>
    <div class="w-2/3"> 
        <h2 class="text-2xl mb-4">¿Quiénes Somos?</h2>
        <p>
            Bienvenidos a TicketTP, tu portal de confianza para la compra de tickets para espectáculos inolvidables. Somos un equipo apasionado de entusiastas del entretenimiento, dedicados a ofrecerte una experiencia única y accesible para disfrutar de los mejores eventos en vivo.
        </p>
        <p>
            Desde conciertos y obras de teatro hasta festivales y eventos deportivos, nuestra misión es conectar a los amantes de la cultura y el entretenimiento con experiencias que enriquezcan su vida. Creemos que cada espectáculo es una oportunidad para crear recuerdos memorables, y estamos aquí para facilitarte el acceso a esos momentos mágicos.
        </p>
        <p>
            En TicketTP, valoramos la transparencia y la satisfacción del cliente. Por eso, trabajamos arduamente para ofrecerte una plataforma fácil de usar, precios competitivos y un servicio al cliente excepcional. Nuestro compromiso es que encuentres las mejores ofertas y disfrutes de un proceso de compra seguro y sencillo.
        </p>
        <p>
            Gracias por elegirnos para ser parte de tus aventuras culturales. Estamos emocionados de acompañarte en cada paso de tu viaje hacia los mejores espectáculos. ¡Prepárate para vivir momentos inolvidables!
        </p>

        <div class="mt-6">
            <div class="flex items-center mb-2">
                <i class="fas fa-envelope mr-2"></i>
                <a class="icon icon-Gmail" href="mailto:tickettp@gmail.com" class="pr-5 text-black-500 hover:underline"> tickettp@gmail.com</a>
            </div>
            <div class="flex items-center">
                <i class="fas fa-phone mr-2"></i>
                <span class="icon icon-phone" class="text-black-500"> +54 11 3458-0983</span>
            </div>
        </div>
    </div>

    <!-- Información de contacto -->

</div>
<?php $this->load->view('includes/footer'); ?>