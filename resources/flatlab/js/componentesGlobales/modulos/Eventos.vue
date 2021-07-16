<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span v-if="user.can['paginas-dragmodulos']"><i class="fas fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Modulo de Eventos]
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
                <label for="nombre" class="control-label col-lg-3 my-auto" >Nombre del modulo</label>
                <div class="col-lg-9">
                    <input name="nombre" class="form-control" :value="nombre" @blur="cambiaNombre($event.target.value)" placeholder="Nombre">
                </div>
            </div>
            <div class="form-group row" >
                <label for="columnas" class="control-label col-lg-3 my-auto" >Columnas</label>
                <div class="col-lg-9">
                    <select name="columnas" class="form-control " :value="campos.columnas" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Eventos x linea" >
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
            <div class="form-group row" >
                <label for="cantidad" class="control-label col-lg-3 my-auto" >Total de Eventos</label>
                <div class="col-lg-9">
                    <select name="cantidad" class="form-control " :value="campos.cantidad" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Eventos x linea" >
                        <option :value="campos.columnas" v-text="`Columnas x 1`"></option>
                        <option :value="campos.columnas*2" v-text="`Columnas x 2`"></option>
                        <option :value="campos.columnas*3" v-text="`Columnas x 3`"></option>
                        <option :value="campos.columnas*4" v-text="`Columnas x 4`"></option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tipo" class="control-label col-lg-3 my-auto" >Mostrar</label>
                <div class="col-lg-9">
                    <select name="tipo" class="form-control " :value="campos.tipo" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Eventos a mostrar" >
                        <option value="ultimos">Ultimos</option>
                        <option value="marcados">Marcados</option>
                        <option value="tipo">Tipo de Evento</option>
                    </select>
                </div>
            </div>
            <div class="form-group row" v-if="campos.tipo == 'tipo'">
                <label for="tipo" class="control-label col-lg-3 my-auto" >Eventos a mostrar</label>
                <div class="col-lg-9">
                    <select name="tipo_id" class="form-control" :value="campos.tipo_id" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Tipos de eventos a mostrar" >
                        <option v-for="(tipo,index) in tipos_evento" :value="tipo.id" :key="index" v-text="tipo.nombre" :selected="tipo.id == campos.tipo_id" ></option>
                    </select>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props: ['id','nombre','campos'],
    data() {
        return {
            tipos_evento: [],
            user: null
        }
    },
    methods : {
        cambiaCampo(campo,value){
            let campos = this.campos
            campos[campo] = value
            this.$emit('update:campos', campos )
        },
        cambiaNombre(value){
            this.$emit('update:nombre', value )
        },
        borrar(){
            this.$emit('borrar')
        },
        getTipos(){
            axios.get(route('getTipos'))
                .then(response => this.tipos_evento = response.data)
                .catch(errors => console.log(errors.data))
        },
        toggle(event){
            event.classList.toggle('fa-chevron-up')
            event.classList.toggle('fa-chevron-down')
        } 
    },
    created(){
        this.user = Laravel.user
        if(! this.campos.columnas) {
            this.cambiaCampo('columnas', 2)
        }

    },
    mounted(){
        this.getTipos()
    },
    computed: {
        id_modulo: function(){
            return "modulo" + this.id
        },
        id_modulo_shooter: function(){
            return '#modulo' + this.id
        }
    }
}
</script>
