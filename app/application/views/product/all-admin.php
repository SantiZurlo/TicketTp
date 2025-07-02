<?php $this->load->view('includes/header'); ?>

    <div class="flex w-full items-center justify-center text-left flex-col space-y-5">
        <div class="flex bg-white w-full flex-row justify-between items-center">
            <h3 class="p-5 font-semibold text-slate-900 text-lg">Lista de Espectáculos</h3>
            <a href="<?= base_url("espectaculo/agregar"); ?>" class="p-5 w-48 font-medium">
                <div class="w-full text-base rounded-lg bg-sky-500 text-white text-center p-2">
                    Agregar
                </div>
            </a>
        </div>
        
        <table class="bg-neutral-50 table-fixed p-5 w-full text-surface ">
            <thead class="border-b border-neutral-200 font-medium">
                <tr>
                    <th class="p-5 w-32">Imagen</th>
                    <th class="p-5">Nombre</th>
                    <th class="p-5">Fecha</th>
                    <th class="p-5">Tickets Vendidos</th>
                    <th class="p-5">Precio/U</th>
                    <th class="p-5 w-48">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr class="border-b border-neutral-200 bg-white">
                        <td class="whitespace-nowrap p-5 font-medium w-32">
                            <a href="<?= base_url(); ?>espectaculo/<?= $product->id; ?>">
                                <img src="<?= base_url(); ?>uploads/products/<?= $product->image; ?>" alt="Product" class="w-full object-cover rounded-xl" />
                            </a>
                        </td>
                        <td class="whitespace-nowrap p-5 font-medium">
                            <a href="<?= base_url(); ?>espectaculo/<?= $product->id; ?>">
                                <?= $product->name; ?>
                            </a>
                        </td>
                        <td class="whitespace-nowrap p-5 font-medium">
                            <?php $date = new DateTimeImmutable("$product->date"); ?>
                            <?= $date->format("j/m/Y H:i A"); ?>
                        </td>
                        <td class="whitespace-nowrap p-5 font-medium">
                            <?= $product->units_sold; ?> / <?= $product->units; ?>
                        </td>
                        <td class="whitespace-nowrap p-5 font-medium">
                            AR$ <?= number_format($product->price, 2); ?>
                        </td>
                        <td class="p-5 font-medium w-48">
                            <a href="<?= base_url(); ?>espectaculo/editar/<?= $product->id; ?>">
                                <div class="w-full text-base rounded-lg p-2 bg-sky-500 text-white text-center mb-2">
                                    Editar
                                </div>
                            </a>
                            <a href="<?= base_url(); ?>espectaculo/borrar/<?= $product->id; ?>" onclick="return confirm('¿Seguro que deseas borrar este espectaculo?')">
                                <div class="w-full text-base rounded-lg p-2 bg-sky-500 text-white text-center">
                                    Borrar
                                </div>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                <?php for($i = count($products); $i < 10; $i++) { ?>
                    <tr class="border-b border-neutral-200 bg-white">
                        <td class="p-10 font-medium w-32"></td>
                        <td class="p-10 font-medium"></td>
                        <td class="p-10 font-medium"></td>
                        <td class="p-10 font-medium"></td>
                        <td class="p-10 font-medium"></td>
                        <td class="p-10 font-medium w-48"></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="flex flex-row space-x-5 bg-white px-5 py-2 rounded-lg">
            <?php echo $this->pagination->create_links() ?: 1; ?>
        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>