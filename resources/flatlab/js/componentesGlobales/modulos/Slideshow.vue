<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span v-if="user.can['paginas-dragmodulos']"><i class="fas fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Modulo Slideshow]
            <span class="tools pull-right">
               <a  class="fa fa-chevron-up accordion-toggle"
                    data-toggle="collapse"
                    @click="toggle($event.target)"
                    :href="id_modulo_shooter">
                </a>
                <a  class="fa fa-times"
                    title="Quitar este modulo"
                    href="javascript:;"
                    @click="borrar">
                </a>
            </span>
        </header>
        <div class="card-body modulos-body collapse show" :id="id_modulo">
            <div class="form-group row">
                <label for="nombre" class="control-label col-lg-2 my-auto" >Nombre del modulo</label>
                <div class="col-lg-10">
                    <input name="nombre" class="form-control" :value="nombre" @blur="cambiaNombre($event.target.value)" placeholder="Nombre">
                </div>
            </div>
            <div class="form-group row">
                <label for="estilo" class="control-label col-lg-2 my-auto" >Estilo del Módulo</label>
                <div class="col-lg-10">
                    <select class="form-control custom-select" :value="estilo" @blur="cambiaEstilo($event.target.value)">
                        <option value="" selected>Por Defecto</option>
                        <option value="vue">Vue</option>
                        <option value="swiper">Swiper</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nombre" class="control-label col-lg-2 " >Imágenes</label>
                <div class="col-lg-10">
                    <draggable v-model="campos.imagenes" @start="drag=true" @end="drag=false" :options="{handle: '.reordenar-imagen',animation: 150}">
                        <div class="border border-primary row align-items-center"  style="border-radius:3px;padding:1rem; margin:.7rem 0;" v-for="(item,index) in campos.imagenes" :key="index">
                            <div class="col-1 text-center">
                                <i class="fas fa-arrows-alt reordenar-imagen"></i>
                            </div>
                            <div class="col-10 col-sm-4">
                                <subir-imagen
                                    :urlSubir="urlSubir"
                                    :urlBorrar="urlBorrar"
                                    :imagen.sync="item.archivo"
                                    :puedoBorrar="puedoBorrarImagen"
                                    @borrar="borrarImagen(index)"
                                    @update="actualizarCampos()" />
                            </div>
                            <div class="col-12 col-sm-7 col-lg-6">
                                <div class="form-group col-lg-10 col-xl-12 mx-auto">
                                    <input name="titulo" class="form-control" v-model="item.titulo" placeholder="Titulo del slide"
                                    @blur="actualizarCampos()">
                                </div>
                                <div class="form-group col-lg-10 col-xl-12 mx-auto">
                                    <textarea cols="30" rows="3" name="texto" class="form-control" v-model="item.texto" @blur="actualizarCampos()" placeholder="Texto del slide">
                                    </textarea>
                                </div>
                                <div class="form-group col-lg-10 col-xl-12 mx-auto">
                                    <input name="link" class="form-control" v-model="item.link" @blur="actualizarCampos()" placeholder="Link del slide">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </draggable>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary " @click.prevent="agregarImagen()">Agregar imagen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import draggable from 'vuedraggable'
export default {
    components: {
        draggable
    },
    props: ['id', 'nombre', 'estilo', 'campos'],
    data() {
        return {
            user: null,
            urlSubir: route('uploadArchivoPagina'),
			urlBorrar: route('borrarArchivoPagina')
        }
    },
    methods : {
        cambiaCampo(campo,value){
            let campos = this.campos
            campos[campo] = value
            this.$emit('update:campos', campos )
        },
        actualizarCampos(){
            let campos = this.campos
            this.$emit('update:campos', campos )
        },
        cambiaNombre(value){
            this.$emit('update:nombre', value )
        },
        cambiaEstilo(value){
            this.$emit('update:estilo', value )
        },
        borrar(){
            this.$emit('borrar')
        },
        agregarImagen(){
            let campos = this.campos
            campos.imagenes.push({archivo:''})
            this.$emit('update:campos', campos )
        },
        borrarImagen(index){
            let imagenes = this.campos.imagenes
            imagenes.splice(index, 1)
            this.cambiaCampo('imagenes',imagenes)
        },
        toggle(event){
            event.classList.toggle('fa-chevron-up')
            event.classList.toggle('fa-chevron-down')
        }
    },
    created() {
        let campos = this.campos
        if(!campos.imagenes){
            campos.imagenes = [{archivo:''}]
        }
        this.$emit('update:campos', campos )
        this.user = Laravel.user
    },
    computed: {
        puedoBorrarImagen() {
			return this.campos.imagenes.length > 1
		},
        id_modulo: function(){
            return "modulo" + this.id
        },
        id_modulo_shooter: function(){
            return '#modulo' + this.id
        }
    }
}
</script>
