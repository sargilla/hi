<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span v-if="user.can['paginas-dragmodulos']"><i class="fas fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Suscribir Newsletter]
            <span class="tools pull-right">
                <a class="fa fa-chevron-down accordion-toggle"  data-toggle="collapse" :href="id_modulo_shooter"></a>
                <a @click="borrar" class="fa fa-times" title="Quitar este modulo" href="javascript:;"></a>
            </span>
        </header>
        <div class="panel-collapse collapse in" :id="id_modulo">
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre" class="control-label col-lg-3" >Nombre del modulo</label>
                    <div class="col-lg-9">
                        <input name="nombre" class="form-control" :value="nombre" @blur="cambiaNombre($event.target.value)" placeholder="Nombre">
                    </div>
                </div>
                <div class="form-group" >
                    <label for="texto" class="control-label col-lg-3" >Título</label>
                    <div class="col-lg-9">
                        <input name="titulo" type="text"  class="form-control" :value="campos.titulo" @change="cambiaCampo($event.target.name,$event.target.value)" placeholder="Titulo del módulo">
                    </div>
                </div>
                <div class="form-group" >
                    <label for="texto" class="control-label col-lg-3" >Texto</label>
                    <div class="col-lg-9">
                        <input name="texto" type="text"  class="form-control" :value="campos.texto" @change="cambiaCampo($event.target.name,$event.target.value)" placeholder="Texto">
                    </div>
                </div>
                <div class="form-group" >
                    <label for="texto_boton" class="control-label col-lg-3" >Texto del Botón</label>
                    <div class="col-lg-9">
                        <input name="texto_boton" class="form-control" type="text" :value="campos.texto_boton" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Texto del Boton">
                    </div>
                </div>
                <div class="form-group" >
                    <label for="placeholder" class="control-label col-lg-3" >Placeholder</label>
                    <div class="col-lg-9">
                        <input name="placeholder" class="form-control" type="text" :value="campos.placeholder" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Texto dentro del campo email">
                    </div>
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
