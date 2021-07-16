<template>
	<form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <template v-if="evento === 'borrar'">
            <div class="form-group row">
                <label for="nombre" class="col-form-label col-lg-12" >Seguro que desea borrar este menu?</label>
            </div>
        </template>
        <template v-else>
            <div class="form-group row" :class="{ 'has-error': form.errors.has('nombre') }">
                <label for="nombre" class="col-form-label col-lg-3" >Nombre</label>
                <div class="col-lg-9">
                    <input name="nombre" class="form-control" id="nombre" v-model="form.nombre" :class="{ 'is-invalid': form.errors.has('nombre') }">
                    <p class="invalid-feedback"  v-if="form.errors.has('nombre')" v-text="form.errors.get('nombre')"></p>
                </div>
            </div>
            <div class="form-group row" :class="{ 'has-error': form.errors.has('menu') }">
                <label for="menu" class="col-form-label col-lg-3">Menu</label>
                <div class="col-lg-9">
                    <input name="menu" class="form-control" v-model="form.menu" :class="{ 'is-invalid': form.errors.has('menu') }">
                    <p class="invalid-feedback" v-if="form.errors.has('menu')" v-text="form.errors.get('menu')"></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="padre" class="col-form-label col-lg-3">Padre</label>
                <div class="col-lg-9" >
                    <select name="padre" class="form-control" v-model="form.padre_id" :options="menus">
                        <option value="0" >Menu padre</option>
                        <option v-for="(menu,index) in menus" :key="index" v-bind:value="menu.id">
                                {{ menu.nombre }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tipo" class="col-form-label col-lg-3">Tipo</label>
                <div class="col-lg-9" >
                    <select class="form-control" v-model="form.tipo">
                        <option v-for="(tipo,index) in tipos"  :key="index" v-bind:value="tipo.value">
                                {{ tipo.text }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group row" :class="{ 'has-error': form.errors.has('destino') }">
                <label for="destino" class="col-form-label col-lg-3">Destino</label>
                <div class="col-lg-9">
                    <input name="destino" class="form-control" v-model="form.destino" :class="{ 'is-invalid': form.errors.has('destino') }">
                    <p class="invalid-feedback" v-if="form.errors.has('destino')" v-text="form.errors.get('destino')"></p>
                </div>
            </div>
            <div class="form-group row">
               <label class="col-lg-3 my-auto">Icono</label>
                    <div class="col-lg-9">
                         <multiselect
                            v-model="form.icono"
                            :options="iconos"
                            :searchable="true"
                            :close-on-select="true"
                            :show-labels="false"
                            placeholder="Elija un icono"
                            deselect-label="Enter para eliminar"
                            select-label="Enter para seleccionar">
                            <template slot="singleLabel" slot-scope="props">
                                 <div class="option__desc">
                                    <span :class="props.option"></span> - {{ props.option }}
                                  </div>
                            </template>
                            <template slot="option" slot-scope="props">
                                <div class="option__desc">
                                    <span :class="props.option"></span> - {{ props.option }}
                                </div>
                            </template>
                        </multiselect>
                     </div>
            </div>
            <div class="form-group row" :class="{ 'has-error': form.errors.has('orden') }">
                <label for="orden" class="col-form-label col-lg-3">orden</label>
                <div class="col-lg-9">
                    <input name="orden" class="form-control" v-model="form.orden" :class="{ 'is-invalid': form.errors.has('orden') }">
                    <p class="invalid-feedback" v-if="form.errors.has('orden')" v-text="form.errors.get('orden')"></p>
                </div>
            </div>
            <div class="form-group row" :class="{ 'has-error': form.errors.has('permiso') }">
                <label for="permiso" class="col-form-label col-lg-3">Permiso</label>
                <div class="col-lg-9">
                    <input name="permiso" class="form-control" v-model="form.permiso" :class="{ 'is-invalid': form.errors.has('permiso') }">
                    <p class="invalid-feedback" v-if="form.errors.has('permiso')" v-text="form.errors.get('permiso')"></p>
                </div>
            </div>
        </template>
        <div class="row">

            <div class="col-sm-6">
                <button class="btn btn-warning btn-shadow btn-lg btn-block" data-dismiss="modal" type="button">Cancelar</button>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-primary btn-shadow btn-lg btn-block" :disabled="form.errors.any()" >{{ textoBoton }}</button>
            </div>
        </div>
    </form>
</template>
<script>
	export default {
		data() {
	        return {
	        	form: new Form({
					id:	'',
					nombre: '',
					menu:'',
					padre_id: 0,
					tipo: 'url',
					destino:'#',
					icono: '',
					orden: '',
					permiso: ''
	        	}),
	        	evento: '',
	        	tipos: [
	        		{ text: 'Url', value: 'url'},
	        		{ text: 'Ruta', value: 'route'},
	        		{ text: 'Accion', value: 'action'},
                    { text: 'Categoria', value: 'categoria'},
                    { text: 'ItemsCategoria', value: 'items_categorias'}
	        	],
	        	menus: [],
	        	textoBoton: '',
                iconos: [],
			}
		},
		methods: {
			onSubmit() {
				if(this.evento == 'editar'){
					this.form.patch(route('menus.update' , this.form.id))
					.then( response => this.resetModal(response.mensaje))
					.catch(errors => console.log(errors));
				}
				if(this.evento == 'crear'){
					this.form.post(route('menus.store'))
					.then( response => 	this.resetModal(response.mensaje))
					.catch(errors => console.log(errors));
				}
				if(this.evento == 'borrar'){
					axios.delete(route('menus.destroy',this.form.id))
		           	.then( response => this.resetModal(response.data.mensaje))
				}
			},
			resetModal(mensaje){
				$('#menus').DataTable().draw(false)
           		toastr.success(mensaje)
           		$('#menu-modal').modal('hide');
			},
            getMenu(id) {
                axios.get(route('menus.show', id))
                    .then(response => {
                        this.form.id = id
                        this.form.nombre = response.data.nombre
                        this.form.menu = response.data.menu
                        this.form.padre_id = response.data.padre_id
                        this.form.tipo = response.data.tipo
                        this.form.destino = response.data.destino
                        this.form.icono = response.data.icono
                        this.form.orden = response.data.orden
                        this.form.permiso = response.data.permiso
                    });
            },
            getMenus() {
                axios.get(route('getMenus'))
                    .then(response => {
                        this.menus = response.data.data
                    });
            },
            borrarForm(){
                this.form.id = ''
                this.form.nombre = ''
                this.form.menu = ''
                this.form.padre_id = 0
                this.form.tipo = ''
                this.form.destino = '#'
                this.form.icono = ''
                this.form.orden = 0
                this.form.permiso = ''
            }
		},
		mounted() {
			this.getMenus(),
			Event.$on('crearMenu', () => {
				this.borrarForm()
		 		this.evento = 'crear'
		 		this.textoBoton = 'Crear Menu'
			}),
			Event.$on('editarMenu', id => {
				this.evento = 'editar'
				this.textoBoton = 'Guardar Menu'
				this.getMenu(id)
			}),
			Event.$on('borrarMenu', id => {
				this.borrarForm()
				this.evento = 'borrar'
				this.textoBoton = 'Borrar Menu'
				this.form.id = id
            }),
            this.iconos = require('../iconos').iconos;
             
		}
	}
</script>
