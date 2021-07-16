<template>
      <section class="card border border-primary">
        <header class="card-header bg-primary">
        	<span v-if="user.can['paginas-dragmodulos']"><i class="fas fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Bloques]
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
                    <label for="nombre" class="control-label col-lg-3" >Nombre del Modulo</label>
                    <div class="col-lg-9">
                        <input name="nombre" class="form-control" v-model="nombre" @blur="cambiaNombre($event.target.value)" placeholder="Nombre">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="link" class="control-label col-lg-3" >Link del Menu</label>
                    <div class="col-lg-9">
                        <input name="link" class="form-control"  :value="campos.link"  @blur="cambiaCampo($event.target.name, $event.target.value)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="estilo" class="control-label col-lg-3" >Estilo</label>
                    <div class="col-lg-9">
                        <select name="estilo" class="form-control " :value="campos.estilo" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Estilo del Modulo" >
                            <option value="estilo-1">Estilo 1</option>
                            <option value="estilo-2">Estilo 2</option>
                        </select>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label for="columnas" class="control-label col-lg-3" >Columnas</label>
                    <div class="col-lg-9">
                        <select name="columnas" class="form-control " :value="campos.columnas" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Cantidad de Columnas" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="modulos" class="control-label col-lg-3" >Modulos</label>
                    <div class="col-lg-9">
                        <div class="card bg-primary tasks-widget border border-primary"  v-for="(modulo,index) in modulos" :key="index">
                            <div class="card-header bg-primary">
                                {{ modulo.titulo}}
                                <span class="tools pull-right"><button class="btn btn-danger btn-xs" @click.prevent="modulos.splice(index, 1)"><i class="fa fa-times"></i></button></span>
                            </div>
                            <div class="card-body bg-white text-dark">
                            	<div class="task-content" >
                                    <div class="form-group">
                                        <div class="col-lg-12 row">
                                            <label class="col-lg-2 my-auto">Titulo</label>
                                            <input class="form-control col-lg-10" v-model="modulo.titulo" placeholder="Titulo del módulo">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 row align-items-center">
                                            <label class="col-lg-2 my-auto">Icono</label>
                                            <div class="col-10 col-lg-9 p-0">
                                                <multiselect
                                                    v-model="modulo.icono"
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
                                                <i class=" fa-2x text-primary"  :class="modulo.icono"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-0">
                                        <div class="col-lg-12 row">
                                            <label class="col-lg-2 my-auto">Texto</label>
                                            <input class="form-control col-lg-10 "  v-model="modulo.texto" placeholder="Icono del módulo">
                                        </div>
                                    </div>
                            	</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <div class="pull-right">
                            <button class="btn btn-primary mb-3" @click.prevent="agregarModulo">Agregar Modulo</button>
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
                modulos: [],
                user: null,
                iconos: [],
            
	        }
	    },
	    props: ['id','nombre','campos'],
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
	        agregarModulo() {
	        	this.modulos.push({titulo:'',icono: '', texto:''})
            },
            toggle(event){
                event.classList.toggle('fa-chevron-up')
                event.classList.toggle('fa-chevron-down')
            }
        },
        created () {
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
	        modulos: {
                handler: function (values) {
                    this.cambiaCampo('modulos',values)
	            },
                deep: true
            }
	    },
	    mounted() {
            if(this.campos.modulos){
                this.modulos = this.campos.modulos
            } else {
               this.modulos = []
            }
            this.iconos = require('../../iconos').iconos;
	    }
	}
</script>

