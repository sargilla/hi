<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span v-if="user.can['paginas-dragmodulos']"><i class="fas fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Modulo de Texto]
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
                <label for="texto" class="control-label col-lg-3 my-auto" >Texto</label>
                <div class="col-lg-9">
                    <editor :contenido.sync="campos.texto" @blur="cambiaCampo($event.target.name,$event.target.value)"/>
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
