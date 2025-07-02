<?php $this->load->view('includes/header'); ?>

    <div class="flex w-full items-center justify-center flex-col space-y-5">
        <div class="p-5 bg-white rounded-xl w-3/5 lg:w-2/3">
            <h3 class="font-semibold text-slate-900 pb-6 text-lg">Editar Espectáculo</h3>
            <div class="panel-body">
                <form action="<?=base_url(); ?>espectaculo/editar/<?= $product->id; ?>" method="post" enctype="multipart/form-data" class="space-y-4">                              
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="name">Nombre</label>
                        <input type="text" name="name" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese el nombre" autofocus
                        value="<?= $product->name; ?>">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="date">Fecha</label>
                        <input type="datetime-local" name="date" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese la fecha" autofocus
                        value="<?= $product->date; ?>">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="description">Descripción</label>
                        <textarea name="description" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm resize-none" placeholder="Ingrese una descripción" autofocus><?= $product->description; ?></textarea>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="units">Cantidad de Tickets</label>
                        <input type="number" name="units" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese la cantidad de tickets" autofocus
                        value="<?= $product->units; ?>">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="price">Precio</label>
                        <input type="number" step="0.01" name="price" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese el precio" autofocus
                        value="<?= $product->price; ?>">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="longitude">Longitud</label>
                        <input type="number" step="0.000001" name="longitude" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese la longitud" autofocus
                        value="<?= $product->longitude; ?>">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="latitude">Latitud</label>
                        <input type="number" step="0.000001" name="latitude" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese la latitud" autofocus
                        value="<?= $product->latitude; ?>">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="imagefile">Foto</label>
                        <input type="file" name="imagefile" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" autofocus
                        value="<?= base_url(); ?>uploads/products/<?= $product->image; ?>">
                    </div>
                    
                    <button type="submit" class="w-full text-base font-medium rounded-lg py-2 px-3 bg-sky-500 text-white">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>