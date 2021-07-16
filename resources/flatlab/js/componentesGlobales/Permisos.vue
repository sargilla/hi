<template>
	<form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<template v-if="evento === 'borrar'">
				<div class="form-group row">
					<label for="name" class="col-form-label col-lg-12" >Seguro que desea borrar este permiso?</label>
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
					<label for="padre" class="col-form-label col-lg-3">Roles</label>
                    <div class="col-lg-9" >
                        <multiselect
						v-model="form.roles"
						label="name"
						track-by="id"
						placeholder="Escriba para buscar"
						:options="roles"
						:multiple="true"
						:searchable="true"
						:clear-on-select="true"
						:close-on-select="false"
						:options-limit="300"
						:show-no-results="true"
						:hide-selected="true">
						<span slot="noResult">Lo siento! No se encontró el Rol.</span>
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
					roles: []
	        	}),
	        	evento: '',
                roles: [],
	        	textoBoton: ''
			}
		},
		methods: {
			onSubmit() {
                if(this.evento == 'crear'){
					this.form.post(route('permisos.store'))
					.then( response => 	this.resetModal(response,'success'))
					.catch(errors => console.log(errors));
				}
				if(this.evento == 'editar'){
					this.form.patch(route('permisos.update' , this.form.id))
					.then( response => this.resetModal(response,'success'))
					.catch(errors => console.log(errors));
				}
				if(this.evento == 'borrar'){
					axios.delete(route('permisos.destroy',this.form.id))
		           	.then( response => this.resetModal(response.data, 'error'))
				}
			},
			resetModal(mensaje,tipo){
                $('#permisos').DataTable().draw(false)
           		toastr[tipo](mensaje)
           		$('#permiso-modal').modal('hide');
			},
            getRoles() {
                axios.get(route('getRoles'))
                    .then(response => {
                        this.roles = response.data.data
                    });
            },
            borrarForm(){
                this.form.id = ''
                this.form.name = ''
                this.form.roles = []
            }
		},
		mounted() {
			this.getRoles(),
			Event.$on('crearPermiso', () => {
				this.borrarForm()
		 		this.evento = 'crear'
		 		this.textoBoton = 'Crear Permiso'
			}),
			Event.$on('editarPermiso', permiso => {
				this.evento = 'editar'
				this.textoBoton = 'Guardar Permiso'
				this.form.id = permiso.id
				this.form.name = permiso.name
				this.form.roles = permiso.roles
			}),
			Event.$on('borrarPermiso', id => {
				this.borrarForm()
				this.evento = 'borrar'
				this.textoBoton = 'Borrar Permiso'
                this.form.id = id
			})
        }
	}
</script>
