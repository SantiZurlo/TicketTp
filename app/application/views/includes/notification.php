<?php if($this->session->flashdata('notification')) { ?>

    <?php $notification = $this->session->flashdata('notification'); ?>

    <script> openPopUp(); </script>

    <div id="popup-modal-notification" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-4 md:p-5 text-center space-y-6">
                    <h3 class="text-3xl font-semibold text-gray-900">
                        <?= $notification['title']; ?>
                    </h3>
                    <p class="text-lg font-normal text-gray-500">
                        <?= $notification['message']; ?>
                    </p>
                    <?php if($notification['type'] === "error") { ?>
                        <button type="button" onclick="closePopUp('notification')" class="w-full text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Cerrar
                        </button>
                    <?php } else { ?>
                        <button type="button" onclick="closePopUp('notification')" class="w-full text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Cerrar
                        </button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
<?php } ?>







