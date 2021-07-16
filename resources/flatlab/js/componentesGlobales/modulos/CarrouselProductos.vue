<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
        	<span v-if="user.can['paginas-dragmodulos']"><i class="fas fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Lista de Productos]
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
                <div class="form-group">
                    <label class="control-label col-lg-3" >Productos a mostrar</label>
                    <div class="col-lg-9">
                         <label>
                            <input type="checkbox" :id="idCheck('sin_etiqueta')" value="sin_etiqueta" v-model="seleccion">
                            <div class="btn-group">
                                <label :for="idCheck('sin_etiqueta')" class="btn btn-primary active">
                                    <span class="fa fa-check"></span><span class="fa fa-times"></span>
                                </label>
                                <label :for="idCheck('sin_etiqueta')" class="btn btn-primary active">Sin Etiqueta</label>
                            </div>
                        </label>
                        <label>
                            <input type="checkbox" :id="idCheck('nuevo')" value="nuevo" v-model="seleccion">
                            <div class="btn-group">
                                <label :for="idCheck('nuevo')" class="btn btn-primary active">
                                    <span class="fa fa-check"></span><span class="fa fa-times"></span>
                                </label>
                                <label :for="idCheck('nuevo')" class="btn btn-primary active">Nuevos</label>
                            </div>
                        </label>
                        <label>
                            <input type="checkbox" :id="idCheck('oferta')" value="oferta" v-model="seleccion" >
                                <div class="btn-group">
                                    <label :for="idCheck('oferta')" class="btn btn-primary active">
                                        <span class="fa fa-check"></span><span class="fa fa-times"></span>
                                    </label>
                                    <label :for="idCheck('oferta')" class="btn btn-primary active">Ofertas</label>
                                </div>
                        </label>
                        <label>
                            <input type="checkbox" :id="idCheck('ultimos')" value="ultimos" v-model="seleccion">
                                <div class="btn-group">
                                    <label :for="idCheck('ultimos')" class="btn btn-primary active">
                                        <span class="fa fa-check"></span><span class="fa fa-times"></span>
                                    </label>
                                    <label :for="idCheck('ultimos')" class="btn btn-primary active">Ultimos en Stock</label>
                                </div>
                        </label>
                        <label>
                            <input type="checkbox" :id="idCheck('agotado')" value="agotado" v-model="seleccion">
                            <div class="btn-group">
                                <label :for="idCheck('agotado')" class="btn btn-primary active">
                                    <span class="fa fa-check"></span><span class="fa fa-times"></span>
                                </label>
                                <label :for="idCheck('agotado')" class="btn btn-primary active">Agotados</label>
                            </div>
                        </label>       
                        <label>
                            <input type="checkbox" :id="idCheck('marcado')" value="marcado" v-model="seleccion">
                            <div class="btn-group">
                                <label :for="idCheck('marcado')" class="btn btn-primary active">
                                    <span class="fa fa-check"></span><span class="fa fa-times"></span>
                                </label>
                                <label :for="idCheck('marcado')" class="btn btn-primary active">Marcados</label>
                            </div>
                        </label>                 
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
            seleccion: []
        }
    },
    props: ['id','nombre','campos'],
    data() {
        return {
            user: null
        }
    },
    created(){
        this.user = Laravel.user
    },
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
        seleccion: function(values) {
           this.cambiaCampo('productos', values)
        }
    },
    mounted() {
        if(this.campos.productos){
    	   this.seleccion = this.campos.productos
        }
    }
}    
</script>
