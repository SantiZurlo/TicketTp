<?php $this->load->view('includes/header'); ?>

    <div class="flex w-full items-center justify-center text-left flex-col space-y-5">
        <div class="flex bg-white w-full flex-row justify-between items-center">
            <h3 class="p-5 font-semibold text-slate-900 text-lg">Lista de Clientes</h3>
        </div>
        
        <table class="bg-neutral-50 table-fixed p-5 w-full text-surface ">
            <thead class="border-b border-neutral-200 font-medium">
                <tr>
                    <th class="p-5 w-32">Id</th>
                    <th class="p-5">Usuario</th>
                    <th class="p-5">Correo</th>
                    <th class="p-5">Tipo</th>
                    <th class="p-5 w-48">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client) { ?>
                    <tr class="border-b border-neutral-200 bg-white">
                        <td class="whitespace-nowrap p-5 font-medium w-32">
                            <?= $client->id; ?>
                        </td>
                        <td class="whitespace-nowrap p-5 font-medium">
                            <?= $client->user_name; ?>
                        </td>
                        <td class="whitespace-nowrap p-5 font-medium">
                            <?= $client->email; ?>
                        </td>
                        <td class="whitespace-nowrap p-5 font-medium">
                            <?= ($client->type === "employee") ? "Empleado" : "Cliente"; ?>
                        </td>
                        <td class="p-5 font-medium w-48">
                            <a href="<?= base_url(); ?>cliente/borrar/<?= $client->id; ?>" onclick="return confirm('¿Seguro que deseas borrar este cliente?')">
                                <div class="w-full text-base rounded-lg p-2 bg-sky-500 text-white text-center">
                                    Baja
                                </div>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                <?php for($i = count($clients); $i < 10; $i++) { ?>
                    <tr class="border-b border-neutral-200 bg-white">
                        <td class="p-10 font-medium w-32"></td>
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