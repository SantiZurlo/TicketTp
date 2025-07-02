
<!-- Modal toggle -->
<?php if($this->session->userdata('LoginSession')) { ?>
    <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="w-full block text-white bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-3 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800" type="button">
        Reservar
    </button>

    <!-- Main modal -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="flex w-full items-center justify-center pb-5">
        <div class="p-5 bg-white rounded-xl w-3/5 lg:w-2/3 shadow-xl">
            <h3 class="font-semibold text-slate-900 pb-6 text-lg">Reserva de Tickets</h3>
            <div class="panel-body">
                <form action="<?=base_url('venta')?>" method="post" enctype="multipart/form-data" class="space-y-4">                              
                    <?php
                        if($this->session->userdata('LoginSession')) {
                            $hiddenData = array(
                                'product_id' => $product->id,
                                'user_id' => $this->session->userdata('LoginSession')['id'],
                            );
                            echo form_hidden($hiddenData);
                        }
                    ?>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="name">Nombre del Espectáculo</label>
                        <input type="text" name="name" class="focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese el nombre" value="<?= $product->name; ?>" readonly>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="date">Fecha del Espectáculo</label>
                        <input type="datetime-local" name="date" class="focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese la fecha" value="<?= $product->date; ?>" readonly>
                    </div>
                    <div class="flex flex-row w-full space-x-5">
                        <div class="flex flex-col w-full space-y-2">
                            <label class="w-full text-sm font-medium text-gray-900" for="price">Precio por Ticket</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                    <div class="text-sm text-gray-500 dark:text-gray-400">AR$</div>
                                </div>
                                <input type="number" name="price" class="ps-12 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese el precio" value="<?= $product->price; ?>" readonly>
                            </div>
                        </div>
                        <div class="flex flex-col w-full space-y-2">
                            <label class="w-full text-sm font-medium text-gray-900" for="price">Cantidad de Tickets</label>
                            <div class="relative flex items-center w-full">
                                <button type="button" id="decrement-button" data-input-counter-decrement="units" class="bg-white border border-gray-300 rounded-s-lg p-3 h-11">
                                    <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                    </svg>
                                </button>
                                <input type="text" name="units" id="units" data-input-counter data-input-counter-min="1" data-input-counter-max="<?= $product->units - $product->units_sold; ?>" aria-describedby="helper-text-explanation" class="bg-white focus:outline-none appearance-none border border-x-0 border-gray-300 h-11 text-center text-slate-900 text-sm block w-full py-2.5" placeholder="1" value="1" required readonly/>
                                <button type="button" id="increment-button" data-input-counter-increment="units" class="bg-white border border-gray-300 rounded-e-lg p-3 h-11">
                                    <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-row w-full space-x-5">
                        <button type="submit" class="w-full text-base font-medium rounded-lg py-2 px-3 bg-sky-500 text-white">Reservar</button>
                        <button data-modal-hide="static-modal" type="button" class="w-full text-base font-medium rounded-lg py-2 px-3 bg-sky-500 text-white">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
    <a href="<?= base_url("ingresar"); ?>" class="w-full block text-white bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-3 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
        Reservar
    </a>
<?php } ?>










