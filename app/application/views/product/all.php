<?php $this->load->view('includes/header'); ?>

    <section id="projects" class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-5 gap-x-14">

        <?php foreach ($products as $product) { ?>
            <div class="w-72 bg-white rounded-xl duration-500 hover:scale-105">
                <a href="<?= base_url(); ?>espectaculo/<?= $product->id; ?>">
                    <div class="relative">
                        <img src="<?= base_url(); ?>uploads/products/<?= $product->image; ?>" alt="product" class="h-80 w-72 object-cover rounded-t-xl" />
                        <?php if(($product->units - $product->units_sold) == 0) { ?>
                            <div class="absolute bottom-2 right-2">
                                <p class="text-2xl font-bold bg-red-500 text-white p-2 rounded-xl opacity-90">AGOTADO</p>
                            </div>
                        <?php } ?>
                    </div>
                    
                    <div class="px-4 py-3 w-72">
                        <p class="text-center text-lg font-bold text-black truncate block capitalize"><?= $product->name; ?></p>
                        <div class="flex items-center">
                            <p class="text-lg font-semibold text-black cursor-auto my-3">AR$ <?= number_format($product->price, 2); ?></p>
                            <?php $date = new DateTimeImmutable("$product->date"); ?>
                            <p class="text-lg font-semibold text-black cursor-auto my-3 ml-auto"><?= $date->format("j/m H:i A"); ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </section>

    <script>
        $(document).ready(function() {
            let offset = 9;
            let loading = false;

            function loadMoreContent() {
                if (!loading) {
                    loading = true;
                    $.ajax({
                        url: "Espectaculos/cargar_mas",
                        type: "POST",
                        data: { offset: offset },
                        dataType: "json",
                        success: function(data) {
                            $.each(data, function(index, item) {
                                const isSoldOut = (item.units - item.units_sold) === 0;
                                $('#projects').append(`<div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                <a href="${item.page_url}">
                    <div class="relative">
                        <img src="${item.image_url}" alt="product" class="h-80 w-72 object-cover rounded-t-xl" />
                        ${ isSoldOut ?
                            `<div class="absolute bottom-2 right-2">
                                <p class="text-2xl font-bold bg-red-500 text-white p-2 rounded-xl opacity-90">AGOTADO</p>
                            </div>` : '' }
                    </div>
                    
                    <div class="px-4 py-3 w-72">
                        <p class="text-center text-lg font-bold text-black truncate block capitalize">${item.name}</p>
                        <div class="flex items-center">
                            <p class="text-lg font-semibold text-black cursor-auto my-3">AR$ ${item.price}</p>
                            <p class="text-lg font-semibold text-black cursor-auto my-3 ml-auto">${item.formatted_date}</p>
                        </div>
                    </div>
                </a>
            </div>`);
                            });
                            offset += 9;
                            loading = false;
                        },
                        error: function() {
                            loading = false;
                        }
                    });
                }
            }

            // Escucha el evento de scroll y verifica si necesitas cargar más contenido
            $(window).scroll(function() {
                const scrollPosition = $(window).scrollTop() + $(window).height();
                const containerHeight = $(document).height() - 100;

                // Cargar más contenido si la posición de scroll está cerca del final
                if (scrollPosition >= containerHeight) {
                    loadMoreContent();
                }
            });

            // Llamada inicial para cargar contenido si la pantalla es lo suficientemente grande para no mostrar scroll
            loadMoreContent();
        });
    </script>

<?php $this->load->view('includes/footer'); ?>