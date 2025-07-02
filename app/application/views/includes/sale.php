<div id="popup-modal-<?= $id; ?>" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full hidden">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="p-4 md:p-5 text-center space-y-5">
                <h3 class="text-3xl font-semibold text-gray-900">
                    Detalle de <?= ($this->session->userdata('LoginSession')['type'] == "employee") ? "Venta" : "Compra"; ?>
                </h3>
                <div class="space-y-2">
                    <div class="flex items-center font-semibold font-sans text-lg border-t-2 border-gray-100 pt-2">
                        <p class="">
                            ID <?= ($this->session->userdata('LoginSession')['type'] == "employee") ? "Venta" : "Compra"; ?>
                        </p>
                        <p class="ml-auto text-gray-500">
                            <?= $id; ?>
                        </p>
                    </div>
                    <div class="flex items-center font-semibold font-sans text-lg">
                        <p class="">
                            Cliente
                        </p>
                        <p class="ml-auto text-gray-500">
                            <?= $user_name; ?>
                        </p>
                    </div>
                    <div class="flex items-center font-semibold font-sans text-lg border-b-2 border-gray-100 pb-2">
                        <p class="">
                            Fecha
                        </p>
                        <p class="ml-auto text-gray-500">
                            <?php $sale_date = new DateTimeImmutable("$date"); ?>
                            <?= $sale_date->format("j/m/y H:i A"); ?>
                        </p>
                    </div>
                    <div class="flex items-center font-semibold font-sans text-lg">
                        <p class="">
                            Tickets
                        </p>
                        <p class="ml-auto text-gray-500">
                            <?= $units; ?>
                        </p>
                    </div>
                    <div class="flex items-center font-semibold font-sans text-lg">
                        <p class="">
                            Precio/U
                        </p>
                        <p class="ml-auto text-gray-500">
                            AR$ <?= number_format($price, 2); ?>
                        </p>
                    </div>
                    <div class="flex items-center font-semibold font-sans text-lg border-b-2 border-gray-100 pb-2">
                        <p class="">
                            <?= ($this->session->userdata('LoginSession')['type'] == "employee") ? "Ganancia" : "Gasto"; ?>
                        </p>
                        <p class="ml-auto text-gray-500">
                            AR$ <?= number_format($price * $units, 2); ?>
                        </p>
                    </div>
                    <div class="flex items-center font-semibold font-sans text-lg">
                        <p class="">
                            Espectaculo
                        </p>
                        <p class="ml-auto text-gray-500">
                            <?= $name; ?>
                        </p>
                    </div>
                    <div class="flex items-center font-semibold font-sans text-lg border-b-2 border-gray-100 pb-2">
                        <p class="">
                            Fecha
                        </p>
                        <p class="ml-auto text-gray-500">
                            <?php $product_date = new DateTimeImmutable("$product_date"); ?>
                            <?= $product_date->format("j/m/y H:i A"); ?>
                        </p>
                    </div>
                </div>
                <button type="button" onclick="closePopUp('<?= $id; ?>')" class="w-full text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>










