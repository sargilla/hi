<template>
	<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)" >
		<div class="form-group" :class="{ 'has-error': form.errors.has('titulo') }">
			<label for="titulo" class="control-label col-lg-2" >Título</label>
			<div class="col-lg-10">
				<input  class="form-control" v-model="form.titulo" >
				<p class="help-block"  v-if="form.errors.has('titulo')" v-text="form.errors.get('titulo')"></p>
			</div>
		</div>
        <div class="form-group">
			<label for="created_at" class="control-label col-lg-2">Fecha</label>
			<div class="col-lg-10" >
				<date-picker v-model="fecha" type="date" format="DD-MM-YYYY" value-type="timestamp" :shortcuts="false" lang="es"></date-picker>
			</div>
		</div>
		 <div class="form-group">
            <label for="tema" class="control-label col-lg-2" >Tema</label>
            <div class="col-lg-10">
                <select name="tema" class="form-control" v-model="form.tema_id">
                    <option v-for="(tema,index) in temas" :value="tema.id" :key="index" v-text="tema.nombre"></option>
                </select>
            </div>
        </div>
		<div class="form-group" :class="{ 'has-error': form.errors.has('intro') }">
			<label for="intro" class="control-label col-lg-2" >Introduccion</label>
			<div class="col-lg-10">
				<ckeditor name='intro' :contenido.sync="form.intro"></ckeditor>
				<p class="help-block"  v-if="form.errors.has('intro')" v-text="form.errors.get('intro')"></p>
			</div>
		</div>
		<div class="form-group" :class="{ 'has-error': form.errors.has('contenido') }">
			<label for="contenido" class="control-label col-lg-2" >Contenido</label>
			<div class="col-lg-10">
				<ckeditor name='contenido' :contenido.sync="form.contenido"></ckeditor>
				<p class="help-block"  v-if="form.errors.has('contenido')" v-text="form.errors.get('contenido')"></p>
			</div>
		</div>
		<div class="form-group" :class="{ 'has-error': form.errors.has('imagenes.imagen') }">
			<label for="texto" class="control-label col-lg-2" >Imagenes</label>
			<div class="col-lg-10">
				<subir-imagen v-for="(item,index) in form.imagenes"
					:key="index"
					:urlSubir="urlSubir"
					:urlBorrar="urlBorrar"
					:imagen.sync="item.imagen"
					:puedoBorrar="puedoBorrarImagen"
					@borrar="borrarImagen(index)"
					@update="guardarCambios" />
				<!-- <file-upload v-for="(item,index) in form.imagenes" :key="index" carpeta="noticias" :imagen.sync="item.imagen" @borrar="borrarImagen(index)"/> -->
				<div class="col-md-1 ">
					<button class="btn btn-default" @click.prevent="agregarImagen">Agregar otra imagen</button>
				</div>
			</div>
		</div>
		<div class='form-group'>
			<div class="col-lg-offset-2 col-lg-10">
				<input  id="marcada" name="marcada" type="checkbox" v-model="form.marcada">
				<div class="btn-group">
					<label for="marcada" class="btn btn-primary active">
						<span class="glyphicon glyphicon-ok"></span>
						<span class="glyphicon glyphicon-remove"></span>
					</label>
					<label for="marcada" class="btn btn-primary active">Marcar Noticia</label>
				</div>
			</div>
		</div>
		<div class='form-group'>
			<div class="col-lg-offset-2 col-lg-10">
				<input id="publicada" name="publicada" type="checkbox" v-model="form.publicada">
				<div class="btn-group">
					<label for="publicada" class="btn btn-primary active">
						<span class="glyphicon glyphicon-ok"></span>
						<span class="glyphicon glyphicon-remove"></span>
					</label>
					<label for="publicada" class="btn btn-primary active">Publicar noticia</label>
				</div>
			</div>
		</div>
		<div class="col-lg-12 text-center">
			<button class="btn btn-warning btn-shadow " @click="cancelar" type="button">Cancelar</button>
			<button class="btn btn-primary btn-shadow " :disabled="form.errors.any()" v-text="textoBoton"></button>
		</div>
	</form>
</template>
<script>
import DatePicker from 'vue2-datepicker'
export default {
	props: {
		evento: {default:''},
		noticia: {
			type: Object,
			default: () => {}
		}
	},
	data() {
		return {
			form: new Form({
				id:	'',
				titulo:'',
				tema_id:'',
				contenido: '',
				imagenes: [{imagen:''}],
				publicada: false,
                marcada:  false,
                created_at: ''
            }),
            fecha: '',
			temas:'',
			urlSubir: route('uploadArchivoNoticia'),
			urlBorrar: route('borrarArchivoNoticia'),
		}
	},

	methods: {
		agregarImagen (){
			this.form.imagenes.push({imagen:''})
		},
		borrarImagen(index){
			this.form.imagenes.splice(index, 1)
		},
		onSubmit() {
			if(this.evento == 'editar'){
				this.form.patch(route('noticias.update', this.noticia.slug))
				.then( response => {
					if(response.success){
						window.location.href=route('noticias.index')
					}
				})
				.catch(errors => console.log(errors));
			}
			if(this.evento == 'crear'){
				this.form.post(route('noticias.store'))
				.then(response => {
					if(response.success){
						window.location.href=route('noticias.index')
					}
				})
				.catch(errors => console.log(errors));
			}
		},
		updateNoticia() {
			if(this.noticia) {
				this.form.id = this.noticia.id
				this.form.titulo = this.noticia.titulo
				this.form.tema_id = this.noticia.tema_id
				this.form.contenido = this.noticia.contenido
				if(this.noticia.imagenes){
					this.form.imagenes = this.noticia.imagenes
				}
				this.form.publicada = this.noticia.publicada
				this.form.marcada = this.noticia.marcada
				this.fecha = new Date(this.noticia.created_at)
			} else {
				this.fecha = new Date()
			};
		},
		borrarForm(){
			this.form.id = ''
			this.form.titulo = ''
			this.form.contenido = ''
			this.form.imagenes = [{imagen:''}]
			this.form.publicada = false
			this.form.marcada = false
		},
		cancelar(){
			window.location.href=route('noticias.index')
		},
		guardarCambios() {
			if(this.evento === 'editar') {
				this.form.patch(route('noticias.update', this.noticia.slug))
			}
		},
		getTemas() {
			axios.get(route('getTemas')).then(respuesta => {
				this.temas = respuesta.data
			}).catch(error => console.log(error.response.data))
		}
	},
	computed: {
		puedoBorrarImagen() {
			return this.form.imagenes.length > 1
		},
		textoBoton() {
			return this.evento == 'editar' ? 'Guardar Noticia' : 'Crear Noticia'
		}
	},
	created() {
		this.getTemas()
		this.updateNoticia()
    },
    watch: {
		fecha: function (val) {
			this.form.created_at = moment(val).format('YYYY-MM-DD')
		}
	}
}
</script>
