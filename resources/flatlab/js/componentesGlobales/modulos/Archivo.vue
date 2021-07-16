<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span><i class="fa fa-arrows my-handle"></i> </span>
            {{ nombre }} [Archivo]
            <span class="tools pull-right">
                <a class="fa fa-chevron-down accordion-toggle"  data-toggle="collapse" :href="id_modulo_shooter"></a>
                <a @click="borrar" class="fa fa-times" title="Quitar este modulo" href="javascript:;"></a>
            </span>
        </header>
        <div class="card-collapse collapse in" :id="id_modulo">
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre" class="control-label col-lg-3" >Nombre del modulo</label>
                    <div class="col-lg-9">
                        <input name="nombre" class="form-control" :value="nombre" @blur="cambiaNombre($event.target.value)" placeholder="Nombre">
                    </div>
                </div>
                <div class="form-group" >
                    <label for="lista" class="control-label col-lg-3" >Nombre de la lista</label>
                    <div class="col-lg-9">
                        <input name="lista" class="form-control col-lg-5 " type="text" :value="campos.lista" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Nombre de la lista">        
                    </div>
                </div>
                <div class="form-group">
                    <label for="archivo" class="control-label col-lg-3" >Lista de precios</label>
					<div class="col-lg-9">
                        <p><strong>Nombre del Archivo: </strong>{{ archivo || 'Todavía no hay archivo cargado o elegido'}}</p>
						<span class="btn btn-primary active fileinput-button">
							<i class="glyphicon glyphicon-plus"></i>
							<span>Elegir lista</span>   
                            <file-upload class="form-control" @loaded="onLoad" accept=".pdf" :disabled="cargando"></file-upload>
						</span>
						<span v-show="cargando"><i class="fa fa-spinner fa-spin"></i> Cargando Lista de precios</span>
						<div class="help-block">
							<p class="alert alert-warning fade in">Esta acción borrará la lista actual y la sustituirá por la lista cargada.</p>
						</div>
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
            archivo: '',
            cargando: false
        }
    },
    props: ['id','nombre','campos'],
    methods : {
        cambiaCampo(campo,value){
            let campos = this.campos
            campos[campo] = value
            console.log(campos)
            this.$emit('update:campos', campos )
        },
        cambiaNombre(value){
            this.$emit('update:nombre', value )
        },
        borrar(){
            this.$emit('borrar')
        },
        onLoad(archivo) {
            this.cargando = true
            this.persist(archivo.file);
        },
        persist(archivo) {
            let data = new FormData();
            data.append('archivo', archivo);
            axios.post('/gestion/paginas/cargar_documentos', data)
                .then(respuesta => {
                    this.archivo = respuesta.data.nombre
                    this.cargando = false
                    toastr.success('La lista se cargo ok.' )
                });
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
        archivo: function(valor) {
           this.cambiaCampo('archivo', valor)
        }
    },
    mounted() {
        if(this.campos.archivo){
            this.archivo = this.campos.archivo
        }
    }
}     
</script>
