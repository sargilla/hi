<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span><i class="fas fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Call To Action]
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
                    <label for="titulo" class="control-label col-lg-2 my-auto" >Título</label>
                    <div class="col-lg-10">

                        <input id="titulo" name="titulo" class="form-control" type="text" :value="campos.titulo" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Ingrese un título">
                    </div>
                </div>
                <div class="form-group row" >
                    <label for="texto" class="control-label col-lg-2 my-auto" >Texto</label>
                    <div class="col-lg-10">
                        <!-- <wysiwyg :id="id" v-model="campos.texto" :contenido="campos.texto" nombre="texto"></wysiwyg> -->
                        <editor  name='texto' :contenido.sync="campos.texto"></editor>
                    </div>
                </div>
                <div class="form-group row" >
                    <label for="texto_boton" class="control-label col-lg-2 my-auto" >Texto del Botón</label>
                    <div class="col-lg-5">
                        <input name="texto_boton" class="form-control col-lg-5 " type="text" :value="campos.texto_boton" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Texto del Boton">
                    </div>
                </div>
                <div class="form-group row" >
                    <label for="link_boton" class="control-label col-lg-2 my-auto" >Link del Botón</label>
                    <div class="col-lg-5">
                        <input name="link_boton" class="form-control col-lg-5 " type="text" :value="campos.link_boton" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Link del Boton">
                    </div>
                </div>
                <!-- <div class="form-group" >
                    <label for="texto" class="control-label col-lg-2 my-auto" >Imagen</label>
                    <div class="col-lg-10">
                        <file-upload :imagen.sync="imagen"></file-upload>
                    </div>
                </div> -->
        </div>
    </section>
</template>
<script>
export default {
    data() {
        return {
            imagen: ''
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
    watch: {
        imagen: function(valor) {
           this.cambiaCampo('imagen', valor)
        }
    },
    mounted() {
        if(this.campos.imagen){
            this.imagen = this.campos.imagen
        }
    }
}
</script>
