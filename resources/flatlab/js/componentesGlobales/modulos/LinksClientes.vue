<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span v-if="user.can['paginas-dragmodulos']"><i class="fas fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Modulo Clientes]
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
                <!-- <div class="form-group">
                    <label for="estilo" class="control-label col-lg-3" >Estilo del Módulo</label>
                    <div class="col-lg-9">
                        <select class="form-control custom-select" :value="estilo" @change="cambiaEstilo($event.target.value)">
                            <option value="" selected>Por Defecto</option>
                            <option value="flexslider">FlexSlider</option>
                            <option value="vue">Vue</option>
                            <option value="swiper">Swiper</option>
                            <option value="owl100">Owl 100%</option>
                        </select>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label for="nombre" class="control-label col-lg-2" >Clientes</label>
                    <div class="col-lg-10">
                        <draggable v-model="campos.imagenes" @start="drag=true" @end="drag=false" :options="{handle: '.reordenar-imagen',animation: 150}">
                            <div class="modulo-imagen border border-primary flex-wrap" v-for="(item,index) in campos.imagenes" :key="index">
                                <div class="col-1 text-center">
                                   <i class="fas fa-arrows-alt reordenar-imagen"></i>
                                </div>
                                <div class="col-11 col-lg-5">
                                    <subir-imagen
                                        :urlSubir="urlSubir"
                                        :urlBorrar="urlBorrar"
                                        :imagen.sync="item.imagen"
                                        :puedoBorrar="puedoBorrarImagen"
                                        @borrar="borrarImagen(index)"
                                        @update="actualizarCampos()" />
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group col-lg-10 col-xl-12 mx-auto">
                                         <label for="nombre">Cliente</label>
                                        <input name="nombre" class="form-control" v-model="item.nombre" placeholder="Nombre del cliente"
                                        @blur="actualizarCampos()">
                                    </div>
                                    <!-- <div class="form-group">
                                        <textarea cols="30" rows="6" name="texto" class="form-control" v-model="item.texto" @blur="actualizarCampos()" placeholder="Dirección">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                         <label for="telefono">Teléfono</label>
                                        <input name="telefono" class="form-control" v-model="item.telefono" placeholder="Teléfono"
                                        @blur="actualizarCampos()">
                                    </div>
                                    <div class="form-group">
                                         <label for="email">Email</label>
                                        <input name="email" class="form-control" v-model="item.email" placeholder="Email"
                                        @blur="actualizarCampos()">
                                    </div> -->
                                    <div class="form-group col-lg-10 col-xl-12 mx-auto">
                                        <label for="link" >Link</label>
                                        <input name="link" class="form-control" v-model="item.link" @blur="actualizarCampos()" placeholder="Link del slide">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </draggable>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary " @click.prevent="agregarImagen()">Agregar cliente</button>
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
    props: ['id', 'nombre', 'campos'],
    data() {
        return {
            urlSubir: route('uploadArchivoPagina'),
            urlBorrar: route('borrarArchivoPagina'),
            user: null
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
            campos.imagenes.push({imagen:''})
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
            campos.imagenes = [{imagen:''}]
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
<style>
    .modulo-imagen {
        display:flex;align-items:center;border-radius:3px; border: 1px solid #e2e2e4; padding:1rem; margin:.7rem 0;
    }
</style>
