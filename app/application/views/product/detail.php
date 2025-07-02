<?php $this->load->view('includes/header'); ?>

<?php if($product) { ?>

    <div class ="flex w-full space-x-5">

        <div class="w-1/4 rounded-xl duration-500 space-y-5">
        <div class="relative">
            <img src="<?= base_url(); ?>uploads/products/<?= $product->image; ?>" alt="Product" class="w-full h-full object-cover rounded-xl" />
            <?php if(($product->units - $product->units_sold) == 0) { ?>
                <div class="absolute bottom-2 right-2">
                    <p class="text-2xl font-bold bg-red-500 text-white p-2 rounded-xl opacity-90">AGOTADO</p>
                </div>
            <?php } ?>
        </div>
            <?php $this->load->view('includes/reserve'); ?>
        </div>

        <div class="w-3/4 space-y-5">
            <div class="selection:bg-fuchsia-300 selection:text-fuchsia-900">
                <p class="font-semibold p-5 bg-white rounded-lg font-sans text-2xl">
                    <?= $product->name; ?>
                </p>
            </div>

            <div class="selection:bg-fuchsia-300 selection:text-fuchsia-900">
                <p class="p-5 bg-white rounded-lg font-sans text-lg">
                    <?= $product->description; ?>
                </p>
            </div>

            <div class="flex items-center font-semibold p-5 bg-white rounded-lg font-sans text-lg">
                <p class="">
                    Tickets Disponibles
                </p>
                <p class="ml-auto">
                    <?= $product->units - $product->units_sold; ?> de <?= $product->units; ?>
                </p>
            </div>

            <div class="flex items-center font-semibold p-5 bg-white rounded-lg font-sans text-lg">
                <p class="">
                    Precio por Ticket
                </p>
                <p class="ml-auto">
                    AR$ <?= number_format($product->price, 2); ?>
                </p>
            </div>

            <div class="flex items-center font-semibold p-5 bg-white rounded-lg font-sans text-lg">
                <p class="">
                    Fecha y Hora
                </p>
                <p class="ml-auto">
                    <?php $date = new DateTimeImmutable("$product->date"); ?>
                    <?= $date->format("j/m/Y H:i A");?> 
                </p>
            </div>

            <div class="p-5 bg-white rounded-lg text-center">
                <iframe
                    class="w-full h-auto aspect-video"
                    width="600" 
                    height="450" 
                    frameborder="0" 
                    scrolling="no" 
                    marginheight="0" 
                    marginwidth="0" 
                    src="https://maps.google.com/maps?q=<?= $product->longitude; ?>,<?= $product->latitude; ?>&hl=es&z=14&amp;output=embed">
                </iframe>
            </div>

        </div>
    </div>

<?php } else { ?>

    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        La página para este producto no existe.
    </div>

<?php } ?>




<?php $this->load->view('includes/footer'); ?>