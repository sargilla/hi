<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span><i class="fas fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Agenda]
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
                <div class="form-group row" >
                    <label for="texto" class="control-label col-lg-2 my-auto" >Texto Superior</label>
                    <div class="col-lg-10">
                        <input name="texto" class="form-control" :value="campos.texto" @blur="cambiaCampo($event.target.name, $event.target.value)" placeholder="Texto">
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
                <div class="form-group row">
                    <label for="posicion" class="control-label col-lg-2 my-auto" >Posición</label>
                    <div class="col-lg-10">
                        <select name="posicion" class="form-control " :value="campos.posicion" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Donde ira?" >
                            <option value="lateral">Lateral</option>
                            <option value="cuerpo">Cuerpo</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="texto_link" class="control-label col-lg-2" >Texto Link Calendario</label>
                    <div class="col-lg-10">
                        <input id="texto_link" name="texto_link" class="form-control" type="text" :value="campos.texto_link" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Ingrese el texto del link">
                    </div>
                </div>
                <div class="form-group" >
                    <label for="link_calendario" class="control-label col-lg-2" >Link a Calendario</label>
                    <div class="col-lg-5">
                        <input name="link_calendario" class="form-control col-lg-5 " type="text" :value="campos.link_calendario" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Link al calendario">
                    </div>
                </div> -->
                <!-- <div class="form-group" >
                    <label for="texto" class="control-label col-lg-2" >Imagen</label>
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
