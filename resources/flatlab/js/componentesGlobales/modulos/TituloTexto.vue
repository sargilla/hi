<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span v-if="user.can['paginas-dragmodulos']"><i class="fas fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Modulo con Titulo y Texto]
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
            <div class="form-group row" >
                <label for="titulo" class="col-md-2 col-form-label" >Titulo</label>
                <div class="col-md-10">
                    <input  name="titulo"
                            class="form-control"
                            :value="campos.titulo"
                            @blur="cambiaCampo($event.target.name,$event.target.value)"
                            placeholder="Titulo">
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
             <div class="form-group row">
                        <label class="col-lg-2 my-auto">Estilo</label>
                        <div class="col-md-10">
                             <select class="form-control" v-model="campos.estilo">
                                 <option disabled value="">Elija un estilo</option>
                                 <option value="1">Estilo 1</option>
                                 <option value="2">Estilo 2</option>
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
        toggle(event){
           event.classList.toggle('fa-chevron-up')
           event.classList.toggle('fa-chevron-down')
        }
    },
    created(){
        this.user = Laravel.user
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
