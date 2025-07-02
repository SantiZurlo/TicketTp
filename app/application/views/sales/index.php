<?php $this->load->view('includes/header'); ?>

    <div class="flex w-full items-center justify-center text-left flex-col space-y-5">
        <div class="flex bg-white w-full flex-row justify-between items-center">
            <h3 class="p-5 font-semibold text-slate-900 text-lg">Lista de <?= ($this->session->userdata('LoginSession')['type'] == "employee") ? "Ventas" : "Compras"; ?></h3>
        </div>
        
        <table class="bg-neutral-50 table-auto p-5 w-full text-surface">
            <thead class="border-b border-neutral-200 font-medium">
                <tr>
                    <th class="p-5">Id <?= ($this->session->userdata('LoginSession')['type'] == "employee") ? "Venta" : "Compra"; ?></th>
                    <th class="p-5">Cliente</th>
                    <th class="p-5">Tickets</th>
                    <th class="p-5">Fecha</th>
                    <th class="p-5 w-48">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $sale) { ?>
                    <tr class="border-b border-neutral-200 bg-white">
                        <td class="whitespace-nowrap p-5 font-medium"><?= $sale->id; ?></td>
                        <td class="whitespace-nowrap p-5 font-medium"><?= $sale->user_name; ?></td>
                        <td class="whitespace-nowrap p-5 font-medium"><?= $sale->units; ?></td>
                        <td class="whitespace-nowrap p-5 font-medium">
                            <?php $date = new DateTimeImmutable("$sale->date"); ?>
                            <?= $date->format("j/m/y H:i A"); ?>
                        </td>
                        <td class="p-5 font-medium w-48">
                            <?php $this->load->view('includes/sale', $sale); ?>
                            <button type="button" onclick="openPopUp('<?= $sale->id; ?>')" class="w-full text-base rounded-lg p-2 bg-sky-500 text-white text-center mb-2">
                                Ver Más
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                <?php for($i = count($sales); $i < 10; $i++) { ?>
                    <tr class="border-b border-neutral-200 bg-white">
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