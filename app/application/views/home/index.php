<?php $this->load->view('includes/header'); ?>

    <div class="row row-col space-y-5">

        <div id="controls-carousel" class="relative w-full" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96 bg-gray-200">
                <?php for($i = 0; $i < count($products); $i++) { ?>
                <!-- Item -->
                    <?php if($i === 0) {?>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                            <a href="<?= base_url(); ?>espectaculo/<?= $products[$i]->id; ?>">
                                <img src="<?= base_url(); ?>uploads/products/<?= $products[$i]->image; ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                <?php if(($products[$i]->units - $products[$i]->units_sold) == 0) { ?>
                                    <div class="absolute bottom-2 right-2">
                                        <p class="text-4xl font-bold bg-red-500 text-white p-2 rounded-xl opacity-90">AGOTADO</p>
                                    </div>
                                <?php } ?>
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <a href="<?= base_url(); ?>espectaculo/<?= $products[$i]->id; ?>">
                                <img src="<?= base_url(); ?>uploads/products/<?= $products[$i]->image; ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                <?php if(($products[$i]->units - $products[$i]->units_sold) == 0) { ?>
                                    <div class="absolute bottom-2 right-2">
                                        <p class="text-4xl font-bold bg-red-500 text-white p-2 rounded-xl opacity-90">AGOTADO</p>
                                    </div>
                                <?php } ?>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <h2 class="bg-gray-800 border-b-8 border-gray-900 text-white text-center text-2xl font-bold p-5">Top 6 Shows Más Vendidos</h2>

        <div id="TopShows" class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-5 gap-x-14">
            <?php foreach ($top_products as $product) { ?>
                <div class="w-72 bg-white rounded-xl">
                    <a href="<?= base_url(); ?>espectaculo/<?= $product->id; ?>">
                        <div class="relative">
                        <img src="<?= base_url(); ?>uploads/products/<?= $product->image; ?>" alt="Espectaculo" class="h-80 w-72 object-cover rounded-t-xl" />
                            <?php if(($product->units - $product->units_sold) == 0) { ?>
                                <div class="absolute bottom-2 right-2">
                                    <p class="text-2xl font-bold bg-red-500 text-white p-2 rounded-xl opacity-90">AGOTADO</p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="px-4 py-3 w-72">
                            <p class="text-center text-lg font-bold text-black truncate block capitalize"><?= $product->name; ?></p>
                            <p class="text-center text-sm text-gray-600 my-2">Entradas Vendidas: <?= $product->units_sold; ?></p>
                            <div class="flex items-center">
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    
    </div>

<?php $this->load->view('includes/footer'); ?>