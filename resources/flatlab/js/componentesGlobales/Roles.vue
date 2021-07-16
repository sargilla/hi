<template>
	<form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<template v-if="evento === 'borrar'">
				<div class="form-group row">
					<label for="name" class="col-form-label col-lg-12" >Seguro que desea borrar este rol?</label>
				</div>
			</template>
			<template v-else>
				<div class="form-group row" :class="{ 'has-error': form.errors.has('name') }">
					<label for="name" class="col-form-label col-lg-3" >Nombre</label>
					<div class="col-lg-9">
						<input name="name" class="form-control" id="name" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
						<p class="invalid-feedback"  v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
					</div>
				</div>

				<div class="form-group row">
					<label for="padre" class="col-form-label col-lg-3">Permisos</label>
                    <div class="col-lg-9" >
                        <multiselect
						v-model="form.permisos"
						label="name"
						track-by="id"
						placeholder="Escriba para buscar"
						:options="permisos"
						:multiple="true"
						:searchable="true"
						:clear-on-select="true"
						:close-on-select="false"
						:options-limit="300"
						:show-no-results="true"
						:hide-selected="true">
						<span slot="noResult">No se encontró el permiso.</span>
					</multiselect>
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
					name: '',
					permisos: []
	        	}),
	        	evento: '',
                permisos: [],
	        	textoBoton: ''
			}
		},
		methods: {
			onSubmit() {
                if(this.evento == 'crear'){
					this.form.post(route('roles.store'))
					.then( response => 	this.resetModal(response,'success'))
					.catch(errors => console.log(errors));
				}
				if(this.evento == 'editar'){
					this.form.patch(route('roles.update' , this.form.id))
					.then( response => this.resetModal(response,'success'))
					.catch(errors => console.log(errors));
				}
				if(this.evento == 'borrar'){
					axios.delete(route('roles.destroy',this.form.id))
		           	.then( response => this.resetModal(response.data, 'error'))
				}
			},
			resetModal(mensaje,tipo){
                $('#roles').DataTable().draw(false)
           		toastr[tipo](mensaje)
           		$('#rol-modal').modal('hide');
			},
            getPermisos() {
                axios.get(route('getPermisos'))
                    .then(response => {
                        this.permisos = response.data.data
                    });
            },
            borrarForm(){
                this.form.id = ''
                this.form.name = ''
                this.form.permisos = []
            }
		},
		mounted() {
			this.getPermisos(),
			Event.$on('crearRol', () => {
				this.borrarForm()
		 		this.evento = 'crear'
		 		this.textoBoton = 'Crear Rol'
			}),
			Event.$on('editarRol', rol => {
				this.evento = 'editar'
				this.textoBoton = 'Guardar Rol'
				this.form.id = rol.id
				this.form.name = rol.name
				this.form.permisos = rol.permissions
			}),
			Event.$on('borrarRol', id => {
				this.borrarForm()
				this.evento = 'borrar'
				this.textoBoton = 'Borrar Rol'
                this.form.id = id
			})
        }
	}
</script>
