<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
        	<span v-if="user.can['paginas-dragmodulos']"><i class="fa fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Modulo con Imagen, Texto e Imagen]
            <span class="tools pull-right">
                <a  class="fa fa-chevron-up accordion-toggle"
                    @click="toggle($event.target)"
                    data-toggle="collapse"
                    :href="id_modulo_shooter">
                </a>
                <a  @click="borrar"
                    class="fa fa-times"
                    title="Quitar este modulo"
                    href="javascript:;">
                </a>
            </span>
        </header>
        <div ref="caja" class="card-body modulos-body collapse show" :id="id_modulo">
            <div class="form-group row">
                <label for="nombre" class="col-md-2 col-form-label">Nombre del modulo</label>
                <div class="col-md-10">
                    <input  type="text"
                            id="nombre"
                            name="nombre"
                            class="form-control"
                            :value="nombre"
                            @blur="cambiaNombre($event.target.value)" placeholder="Nombre">
                </div>
            </div>
            <div class="form-group row">
                <label for="texto" class="col-md-2 col-form-label" >Texto</label>
                <div class="col-md-10">
                    <editor id="texto"
                        @blur="cambiaCampo($event.target.name,$event.target.value)"
                        :contenido.sync="campos.texto"
                        tipo="basico"
                    />
                </div>
            </div>
            <div class="form-group row" >
                <label for="link" class="col-md-2 col-form-label" >Link</label>
                <div class="col-md-10">
                    <input  name="link"
                            class="form-control"
                            :value="campos.link"
                            @blur="cambiaCampo($event.target.name,$event.target.value)"
                            placeholder="Link">
                </div>
            </div>
             <div class="form-group row" >
                <label for="texto_link" class="col-md-2 col-form-label" >Texto Link</label>
                <div class="col-md-10">
                    <input  name="texto_link"
                            class="form-control"
                            :value="campos.texto_link"
                            @blur="cambiaCampo($event.target.name,$event.target.value)"
                            placeholder="Texto Link">
                </div>
            </div>
                <!-- <div class="form-group" >
                    <label for="link" class="control-label col-lg-3" >Link</label>
                    <div class="col-lg-9">
                        <input name="link" class="form-control col-lg-5 " type="text" :value="campos.link" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Autor del Texto">
                    </div>
                </div> -->
            <div class="form-group row">
                <label for="imagen" class="control-label col-lg-2" >Imágen</label>
                <div class="col-md-3">
                    <subir-imagen
                        :urlSubir="urlSubir"
                        :urlBorrar="urlBorrar"
                        :imagen.sync="campos.imagen"
                        :puedoBorrar="false"
                        @borrar="borrarImagen(index)"
                        @update="guardarCampos()" />

                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
	data() {
        return {
            user:null,
            urlSubir: route('uploadArchivoPagina'),
			urlBorrar: route('borrarArchivoPagina')
        }
    },
    props: ['id','nombre','campos'],
    methods : {
        cambiaCampo(campo,value){
            let campos =this.campos
            campos[campo] = value
            this.$emit('update:campos', campos )
        },
        cambiaNombre(value){
            this.$emit('update:nombre', value )
        },
        borrar(){
            this.$emit('borrar')
        },
        toggle(event){
           event.classList.toggle('fa-chevron-up')
           event.classList.toggle('fa-chevron-down')
        }
    },
    computed: {
        id_modulo: function(){
            return "modulo" + this.id
        },
        id_modulo_shooter: function(){
            return '#modulo' + this.id
        }
    },
    created(){
        this.user = Laravel.user
    },
    mounted() {
        let campos = this.campos
        if(!campos.imagenes){
            campos.imagenes = [{imagen:''}]
        }
        this.$emit('update:campos', campos )
    }
}
</script>
