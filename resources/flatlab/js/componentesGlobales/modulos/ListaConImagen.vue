<template>
      <section class="card border border-primary">
        <header class="card-header bg-primary">
        	<span v-if="user.can['paginas-dragmodulos']"><i class="fas fa-arrows-alt my-handle"></i></span>
            {{ nombre }} [Modulo de Lista con Imagen]
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
                <label for="nombre" class="control-label col-lg-3 my-auto" >Nombre del Modulo</label>
                <div class="col-lg-9">
                    <input name="nombre" class="form-control" v-model="nombre" @blur="cambiaNombre($event.target.value)" placeholder="Nombre">
                </div>
            </div>
            <div class="form-group row">
                <label for="titulo" class="control-label col-lg-3 my-auto" >Titulo</label>
                <div class="col-lg-9">
                    <input name="titulo" class="form-control"  :value="campos.titulo"  @blur="cambiaCampo($event.target.name, $event.target.value)" placeholder="Texto sobre la imagen">
                </div>
            </div>
            <div class="form-group row">
                <label for="imagen" class="control-label col-lg-3" >Imágen</label>
                <div class="col-lg-9">
                        <div class="col-10 col-sm-6 col-md-4">
                            <subir-imagen
                                :urlSubir="urlSubir"
                                :urlBorrar="urlBorrar"
                                :imagen.sync="campos.imagen"
                                :puedoBorrar="false"
                                @borrar="borrarImagen(index)"
                                @update="guardarCampos()" />
                        </div>
                </div>
            </div>
            <!-- <div class="form-group">
                <label for="link" class="control-label col-lg-3" >Link del Menu</label>
                <div class="col-lg-9">
                    <input name="link" class="form-control"  :value="campos.link"  @blur="cambiaCampo($event.target.name, $event.target.value)">
                </div>
            </div> -->
            <!-- <div class="form-group">
                <label for="estilo" class="control-label col-lg-3" >Estilo</label>
                <div class="col-lg-9">
                    <select name="estilo" class="form-control " :value="campos.estilo" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Estilo del Modulo" >
                        <option value="estilo-1">Estilo 1</option>
                        <option value="estilo-2">Estilo 2</option>
                    </select>
                </div>
            </div> -->
            <!-- <div class="form-group">
                <label for="columnas" class="control-label col-lg-3" >Columnas</label>
                <div class="col-lg-9">
                    <select name="columnas" class="form-control " :value="campos.columnas" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Cantidad de Columnas" >
                        <option value="col-md-6">2</option>
                        <option value="col-md-4">3</option>
                    </select>
                </div>
            </div> -->
            <div class="form-group row">
                <label for="items" class="control-label col-lg-3" >Items de la Lista</label>
                <div class="col-lg-9">
                    <draggable v-model="items" @start="drag=true" @end="drag=false" :options="{handle: '.dragitems',animation: 210}">
                    <div class="card border border-primary tasks-widget" v-for="(item,index) in items" :key="index">
                        <div class="card-header bg-primary">
                            <span><i class="fa fa-arrows dragitems"></i> </span>
                            {{ item.titulo}}
                            <span class="tools pull-right"><button class="btn btn-danger btn-xs" @click.prevent="items.splice(index, 1)"><i class="fa fa-times"></i></button></span>
                        </div>
                        <div class="card-body">
                            <div class="task-content">
                                <!-- <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Icono del item (<a href="/iconos" target="_blank">Ver Iconos</a>)</label>
                                        <multiselect v-model="item.icono" placeholder="Elige un icono" label="nombre" track-by="nombre" :options="iconos" :option-height="104"  :show-labels="true">
                                        </multiselect>
                                    </div>
                                </div> -->
                                <div class="col-lg-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-lg-2 my-auto">Icono</label>
                                            <div class="col-10 col-lg-9 p-0">
                                                <multiselect
                                                    v-model="item.icono"
                                                    :options="iconos"
                                                    :searchable="true"
                                                    :close-on-select="true"
                                                    :show-labels="false"
                                                    placeholder="Elija un icono"
                                                    deselect-label="Enter para eliminar"
                                                    select-label="Enter para seleccionar">
                                                    <template slot="singleLabel" slot-scope="props">
                                                        <div class="option__desc">
                                                            <span :class="props.option"></span> - {{ props.option }}
                                                        </div>
                                                    </template>
                                                    <template slot="option" slot-scope="props">
                                                        <div class="option__desc">
                                                            <span :class="props.option"></span> - {{ props.option }}
                                                        </div>
                                                    </template>
                                                </multiselect>
                                            </div>
                                            <div class="col-1 col-lg-1 text-center p-3  ">
                                                <i class=" fa-2x text-primary"  :class="item.icono"></i>

                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class=" col-lg-2">Titulo del item</label>
                                        <input  class="form-control col-lg-10" v-model="item.titulo" placeholder="Titulo del item">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2">Texto del item</label>
                                        <div class="col-lg-10 p-0">
                                        <editor id="texto"
                                            @blur="cambiaCampo($event.target.name,$event.target.value)"
                                            :contenido.sync="item.texto"
                                            tipo="basico"
                                        />

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2">Link</label>
                                        <input  class="form-control col-lg-10" v-model="item.link" placeholder="Link del item">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </draggable>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12 ">
                    <div class="pull-right">
                        <button class="btn btn-primary" @click.prevent="agregarItem">Agregar Item</button>
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
			draggable,
        },
        props: ['id','nombre','campos'],
	    data() {
	        return {
                items: [],
                urlSubir: route('uploadArchivoPagina'),
                urlBorrar: route('borrarArchivoPagina'),
                iconos: [],
                
	        }
	    },
	    methods: {
	        cambiaCampo(campo,value){
                let campos = this.campos
                campos[campo] = value
	            this.$emit('update:campos', campos)
	        },
	        cambiaNombre(value){
	            this.$emit('update:nombre', value)
	        },
	        borrar(){
	            this.$emit('borrar')
	        },
	        agregarItem() {
	        	this.items.push({titulo:'',texto:'',icono:''})
	        },
            guardarCambios(index){

            },
            borrarImagen(index){

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
	            return 'modulo' + this.id
	        },
	        id_modulo_shooter: function(){
	            return '#modulo' + this.id
	        }
	    },
	    watch: {
	        items: {
                handler: function (values) {
                    this.cambiaCampo('items',values)
	            },
                deep: true
            }
	    },
	    mounted() {
            if(this.campos.items){
                this.items = this.campos.items
            } else {
               this.items = []
            }
            let campos = this.campos

           if(!campos.imagenes){
                campos.imagenes = [{imagen:''}]
            }
            this.$emit('update:campos', campos )
            this.iconos = require('../../iconos').iconos;
        }
	}
</script>

