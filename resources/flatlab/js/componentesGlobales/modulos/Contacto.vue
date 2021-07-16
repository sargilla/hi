<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
        	<span v-if="user.can['paginas-dragmodulos']"><i class="fa fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Modulo de Contacto]
            <span class="tools pull-right">
                <a  class="fas fa-chevron-up accordion-toggle text-white"
                    data-toggle="collapse"
                    @click="toggle($event.target)"
                    :href="id_modulo_shooter">
                </a>
                <a  class="fas fa-times text-white"
                    title="Quitar este modulo"
                    href="javascript:;"
                    @click="borrar">
                </a>
            </span>
        </header>
        <div ref="caja" class="card-body modulos-body collapse show" :id="id_modulo">
            <div class="card-body">
            	<div class="form-group row ">
                    <label for="nombre" class="control-label col-lg-2 my-auto" >Nombre del modulo</label>
                    <div class="col-lg-10">
                        <input name="nombre" class="form-control" :value="nombre" @blur="cambiaNombre($event.target.value)" placeholder="Nombre">
                    </div>
                </div>
                <div class="form-group row checkboxes">
                    <label class="control-label col-md-2 my-auto" >Campos del Formulario</label>
                    <div class="col-md-10">
                        <input type="checkbox" :id="idCheck('asunto')" value="asunto" v-model="seleccion">
                        <div class="btn-group">
                            <label :for="idCheck('asunto')" class="btn btn-primary">
                                <span class="fas fa-check" v-if="seleccion.includes('asunto')"></span>
                                <span class="fas fa-times" v-else></span>
                            </label>
                            <label :for="idCheck('asunto')" class="btn btn-primary" v-text="`Asunto`"/>
                        </div>
                        <input type="checkbox" :id="idCheck('telefono')" value="telefono" v-model="seleccion">
                        <div class="btn-group">
                            <label :for="idCheck('telefono')" class="btn btn-primary">
                                <span class="fas fa-check" v-if="seleccion.includes('telefono')"></span>
                                <span class="fas fa-times" v-else></span>
                            </label>
                            <label :for="idCheck('telefono')" class="btn btn-primary" v-text="`Teléfono`"/>
                        </div>
                        <input type="checkbox" :id="idCheck('empresa')" value="empresa" v-model="seleccion">
                        <div class="btn-group">
                            <label :for="idCheck('empresa')" class="btn btn-primary">
                                <span class="fas fa-check" v-if="seleccion.includes('empresa')"></span>
                                <span class="fas fa-times" v-else></span>
                            </label>
                            <label :for="idCheck('empresa')" class="btn btn-primary" v-text="`Empresa`"/>
                        </div>
                        <input type="checkbox" :id="idCheck('puesto')" value="puesto" v-model="seleccion">
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    data() {
        return {
            seleccion: [],
            user: ''
        }
    },
    props: ['id','nombre','campos'],
    methods: {
        cambiaCampo(campo,value){
            let campos =this.campos
            campos[campo] = value
            this.$emit('update:campos', campos )
        },
        cambiaNombre(value){
            this.$emit('update:nombre', value )
        },
        idCheck(value){
            return value + this.id
        },
        borrar(){
            this.$emit('borrar')
        }
    },
    computed: {
        id_modulo: function(){
            return 'modulo' + this.id
        },
        id_modulo_shooter: function(){
            return '#modulo' + this.id
        }
    },
    watch: {
        seleccion: function(values,viejo) {
           this.cambiaCampo('opcionales', values)
        }
    },
    created(){
        this.user = Laravel.user
    },
    mounted() {
        if(this.campos.opcionales){
            this.seleccion = this.campos.opcionales
        }
    }
}
</script>
