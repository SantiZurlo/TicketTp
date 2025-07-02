<?php $this->load->view('includes/header'); ?>

    <div class="flex w-full items-center justify-center">
        <div class="p-5 bg-white rounded-xl w-3/5 lg:w-2/3">
            <h3 class="font-semibold text-slate-900 pb-6 text-lg">Registrar Nuevo Usuario</h3>
            <div class="panel-body">
                <form action="<?=base_url('registrar')?>" method="post" class="space-y-4">                              
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="username">Nombre de Usuario</label>
                        <input type="text" name="username" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese su nombre de usuario" autofocus>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="email">Correo</label>
                        <input type="email" name="email" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese su correo" autofocus>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="password">Contraseña</label>
                        <input type="password" name="password" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese su contraseña" autofocus>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="repassword">Verificar Contraseña</label>
                        <input type="password" name="repassword" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 px-4 ring-1 ring-slate-200 shadow-sm" placeholder="Ingrese su contraseña nuevamente" autofocus>
                    </div>
                    
                    <button type="submit" class="w-full text-base font-medium rounded-lg py-2 px-3 bg-sky-500 text-white">
                        Registrar
                    </button>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>