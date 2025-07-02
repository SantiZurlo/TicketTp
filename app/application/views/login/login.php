<?php $this->load->view('includes/header'); ?>

    <div class="flex h-full w-full items-center justify-center">
        <div class="p-5 bg-white rounded-xl w-1/3">
            <h3 class="font-semibold text-slate-900 pb-6 text-lg">Iniciar Sesión</h3>
            <div class="panel-body">
                <form action="<?=base_url('ingresar')?>" method="post" class="divide-y divide-slate-100 space-y-6">                              
                    <input type="email" name="email" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese su correo" autofocus>
                    <input type="password" name="password" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese su contraseña" autofocus>
                    
                    <button type="submit" class="w-full text-base font-medium rounded-lg py-2 px-3 bg-sky-500 text-white">
                        Ingresar
                    </button>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>