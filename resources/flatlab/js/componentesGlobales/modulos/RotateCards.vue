<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span v-if="user.can['paginas-dragmodulos']"><i class="fas fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Modulo Tarjetas Rotativas]
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
                    <label for="nombre" class="control-label col-lg-3" >Imágenes</label>
                    <div class="col-lg-9">
                        <draggable v-model="campos.imagenes" @start="drag=true" @end="drag=false" :options="{handle: '.reordenar-imagen',animation: 150}">
                            <div class="modulo-imagen" v-for="(item,index) in campos.imagenes" :key="index">
                                <div class="col-md-1 text-center">
                                   <i class="fa fa-arrows reordenar-imagen"></i>
                                </div>
                                <div class="col-md-4">
                                    <subir-imagen
                                        :urlSubir="urlSubir"
                                        :urlBorrar="urlBorrar"
                                        :imagen.sync="item.imagen"
                                        :puedoBorrar="puedoBorrarImagen"
                                        @borrar="borrarImagen(index)"
                                        @update="actualizarCampos()" />
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                         <label for="titulo">Título</label>
                                        <input name="titulo" class="form-control" v-model="item.titulo" placeholder="Titulo de la tarjeta"
                                        @blur="actualizarCampos()">
                                    </div>
                                    <div class="form-group">
                                        <textarea cols="30" rows="6" name="texto" class="form-control" v-model="item.texto_frontal" @blur="actualizarCampos()" placeholder="Texto Frente">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                         <label for="titulo_atras">Título</label>
                                        <input name="titulo_atras" class="form-control" v-model="item.titulo_atras" placeholder="Titulo Reverso"
                                        @blur="actualizarCampos()">
                                    </div>
                                    <div class="form-group">
                                        <textarea cols="30" rows="6" name="texto" class="form-control" v-model="item.texto_reverso" @blur="actualizarCampos()" placeholder="Texto Atrás">
                                        </textarea>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input name="link" class="form-control" v-model="item.link" @blur="actualizarCampos()" placeholder="Link del slide">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </draggable>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary " @click.prevent="agregarImagen()">Agregar Tarjeta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import draggable from 'vuedraggable'
export default {
    components: {
        draggable
    },
    props: ['id', 'nombre', 'estilo', 'campos'],
    data() {
        return {
            urlSubir: route('uploadArchivoPagina'),
            urlBorrar: route('borrarArchivoPagina'),
            user:null
        }
    },
    methods : {
        cambiaCampo(campo,value){
            let campos = this.campos
            campos[campo] = value
            this.$emit('update:campos', campos )
        },
        actualizarCampos(){
            let campos = this.campos
            this.$emit('update:campos', campos )
        },
        cambiaNombre(value){
            this.$emit('update:nombre', value )
        },
        cambiaEstilo(value){
            this.$emit('update:estilo', value )
        },
        borrar(){
            this.$emit('borrar')
        },
        agregarImagen(){
            let campos = this.campos
            campos.imagenes.push({imagen:''})
            this.$emit('update:campos', campos )
        },
        borrarImagen(index){
            let imagenes = this.campos.imagenes
            imagenes.splice(index, 1)
            this.cambiaCampo('imagenes',imagenes)
        }
    },
    created() {
        let campos = this.campos
        if(!campos.imagenes){
            campos.imagenes = [{imagen:''}]
        }
        this.$emit('update:campos', campos ),
        this.user = Laravel.user
    },
    computed: {
        puedoBorrarImagen() {
			return this.campos.imagenes.length > 1
		},
        id_modulo: function(){
            return "modulo" + this.id
        },
        id_modulo_shooter: function(){
            return '#modulo' + this.id
        }
    }
}
</script>
<style>
    .modulo-imagen {
        display:flex;align-items:center;border-radius:3px; border: 1px solid #e2e2e4; padding:1rem; margin:.7rem 0;
    }
</style>
