<template>
	<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<template v-if="evento === 'borrar'">
				<div class="form-group">
					<label class="control-label col-md-12" >Seguro que desea borrar este módulo?</label>
				</div>
			</template>
			<template v-else>
               <div class="form-group">
                    <label for="nombre" class="control-label col-md-2" >Tipo Módulo</label>
                    <div class="col-md-5">
                        <select v-model="form.tipo" class="form-control col-md-5">
                            <option disabled value="">Elija un Tipo de Modulo</option>
                            <option v-for="(modulo,index) in modulos" :key="index" :value="modulo.value" v-text="modulo.nombre"></option>
                        </select>
                    </div>
                </div>
                <component v-if="form.tipo" :is="form.tipo" v-model="form.contenido"  :campos.sync="form.contenido" :nombre.sync="form.nombre"  :user="user"></component>
			</template>
            <div class="row">
    			<div class="col-md-12">
                    <div class="text-center">
                        <button class="btn btn-warning btn-shadow" data-dismiss="modal" type="button">Cancelar</button>
        				<button class="btn btn-primary btn-shadow" :disabled="form.errors.any()" @click="onClick(true)">{{ submit }}</button>
                        <button class="btn btn-primary btn-shadow" :disabled="form.errors.any()" v-if="evento!='borrar'" @click="onClick(false)" >{{ submit_go }}</button>
                    </div>
                </div>
            </div>
		</form>
</template>
<script>
import agenda from './modulos/Agenda.vue'
import bloques from './modulos/Bloques.vue'
	export default {
        components: {
            agenda,
            bloques
        },
		props: ['evento','modulo'],
		data() {
	        return {
	        	form: new Form({
	        		id: '',
					nombre:	'',
					tipo:	'',
                    contenido:  {default: () => []},
                    posicion: 'default',
                    publicado: 1
	        	}),
                submit: 'Guardar Módulo',
	        	submit_go: 'Guardar y Salir',
                quedarse: false,
	        	modulos: [
                    {nombre:'Agenda', value: 'agenda'},
	        		{nombre:'Bloques', value:'bloques'}
                ],
                user: ''
			}
		},
		methods: {
            agregarModulo() {
            	if(!this.modulo_elegido){
            		toastr.error('Debe elegir un tipo de modulo')
            		return
            	}
            	this.form.contenido.push({nombre:'',tipo: this.modulo_elegido, campos:{}})
            },
            onClick(value) {
                this.quedarse = value
            },
			onSubmit() {
				if(this.evento == 'crear'){
					this.form.post('/gestion/modulos')
					.then(()=> window.location.href="/gestion/modulos")
					.catch(errors => console.log(errors));
				}
				if(this.evento == 'editar'){
					this.form.patch('/gestion/modulos/' + this.modulo.slug)
					.then(response => {
                        if(!this.quedarse){
                            window.location.href="/gestion/modulos"
                        } else {
                            toastr.success('Módulo Guardada!')
                        }
                    })
					.catch(errors => console.log(errors));
				}
				if(this.evento == 'borrar'){
					axios.delete('/gestion/modulos/' + this.form.id)
		           	.then( response => this.resetModal(response.data.mensaje))
				}
			},
			resetModal(mensaje){
				$('#modulos').DataTable().draw(false)
           		toastr.success(mensaje)
           		$('#modulo-modal').modal('hide');
			},
            borrarForm(){
                this.form.id = ''
                this.form.nombre = ''
            },

		},
		mounted() {
			Event.$on('borrarModulo', id => {
				this.borrarForm()
				this.evento = 'borrar'
				this.submit = 'Borrar Módulo'
				this.form.id = id
			})
			if(this.evento == 'editar'){
				this.form.id = this.modulo.id
				this.form.nombre = this.modulo.nombre
				this.form.tipo = this.modulo.tipo
				this.form.contenido = this.modulo.contenido
            }
            this.user = Laravel.user
		}
	}
</script>
