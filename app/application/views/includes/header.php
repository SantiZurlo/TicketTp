<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url(); ?>public/css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/x-icon" href="<?= base_url('public/images/favicon.ico'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>TicketTP</title>
</head>

<script>
    function closePopUp(name) {
      const modal = document.getElementById("popup-modal-"+name);
      if (modal) {
          modal.classList.add('hidden');
      }
      const background = document.getElementById("popup-background");
      if (background) {
          background.classList.add('hidden');
      }
      document.body.classList.remove('overflow-hidden');
    }
    function openPopUp(name) {
      const modal = document.getElementById("popup-modal-"+name);
      if (modal) {
          modal.classList.remove('hidden');
      }
      const background = document.getElementById("popup-background");
      if (background) {
          background.classList.remove('hidden');
      }
      document.body.classList.add('overflow-hidden');
    }
</script>

<body class="bg-gray-100 h-full space-y-5">
<!--Esto sería el encabezado de la página, en este caso está separado y debe cargarse para cada vista-->
<!-- component -->
<!-- follow me on twitter @asad_codes -->

  <div class="flex flex-wrap place-items-center">
    <section class="relative mx-auto w-screen">
        <!-- navbar -->
      <nav class="flex justify-between bg-gray-900 text-white w-full">
        <div class="px-5 xl:px-12 py-6 flex w-full items-center">
          <a href="<?= base_url(); ?>">
            <img src="<?= base_url(); ?>public/images/favicon.svg" class="h-12">
          </a>
          <!-- Nav Links -->
          <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
            <?php if ($this->session->userdata('LoginSession')) { ?>
              <?php if ($this->session->userdata('LoginSession')['type'] == "employee") { ?>
                <li><a class="hover:text-gray-200" href="<?= base_url(); ?>clientes/index">Clientes</a></li>
                <li><a class="hover:text-gray-200" href="<?= base_url(); ?>ventas/index">Ventas</a></li>
                <li><a class="hover:text-gray-200" href="<?= base_url(); ?>espectaculos/index">Espectaculos</a></li>
              <?php } else { ?>
                <li><a class="hover:text-gray-200" href="<?= base_url(); ?>ventas/index">Compras</a></li>
                <li><a class="hover:text-gray-200" href="<?= base_url(); ?>espectaculos">Espectaculos</a></li>
              <?php } ?>
            <?php } else { ?>
              <li><a class="hover:text-gray-200" href="<?= base_url(); ?>espectaculos">Espectaculos</a></li>
            <?php } ?>  
            <li><a class="hover:text-gray-200" href="<?= base_url(); ?>contacto">Contacto</a></li>
          </ul>
          <!-- Header Icons -->
          <div class="hidden xl:flex items-center space-x-5 items-center">
          
            <!-- Sign In / Register      -->
            <?php if (!$this->session->userdata('LoginSession')) { ?>
              <a class="flex items-center hover:text-gray-200" href="<?=base_url('ingresar');?>">
                <div type="submit" class="w-full text-base font-medium rounded-lg py-2 px-3 bg-orange-500 text-white">Ingresar</div>
              </a>
              <a class="flex items-center hover:text-gray-200" href="<?=base_url('registrar');?>">
                <div type="submit" class="w-full text-base font-medium rounded-lg py-2 px-3 bg-orange-500 text-white">Registrar</div>
              </a>
            <?php } else { ?>
              <a class="flex items-center hover:text-gray-200" href="<?=base_url('ingresar/logout');?>">
                <div type="submit" class="w-full text-base font-medium rounded-lg py-2 px-3 bg-orange-500 text-white">Salir</div>
              </a>
            <?php } ?>
          </div>
        </div>
        <!-- Responsive navbar -->
        <div class="flex xl:hidden items-center px-5 items-center">
          <?php if (!$this->session->userdata('LoginSession')) { ?>
            <a class="flex items-center hover:text-gray-200" href="<?=base_url('ingresar');?>">
              <div type="submit" class="w-full text-base font-medium rounded-lg py-2 px-3 bg-orange-500 text-white">Ingresar</div>
            </a>
          <?php } else { ?>
            <a class="flex items-center hover:text-gray-200" href="<?=base_url('ingresar/logout');?>">
              <div type="submit" class="w-full text-base font-medium rounded-lg py-2 px-3 bg-orange-500 text-white">Salir</div>
            </a>
          <?php } ?>
        </div>
      </nav>
      
    </section>
  </div>
  <div id="popup-background" class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40 hidden"></div>
  <div class="px-5 min-h-[calc(100vh-96px-8.25rem)]">

