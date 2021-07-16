<template>
      <section class="card border border-primary">
        <header class="card-header bg-primary">
        	<span><i class="fas fa-arrows-alt my-handle"></i> </span>
            {{ nombre }} [Modulo de Listas]
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
                    <label for="nombre" class="control-label col-md-3 my-auto" >Estilos</label>
                    <div class="col-md-4 mb-3 mb-lg-0">
                        <input name="clases" class="form-control" v-model="clases" @blur="cambiaCampo($event.target.name, $event.target.value)" placeholder="Clases del modulo">
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <input name="id" class="form-control" v-model="id" @blur="cambiaCampo($event.target.name, $event.target.value)" placeholder="Id del modulo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="link" class="control-label col-lg-3 my-auto" >Link del Menu</label>
                    <div class="col-lg-9">
                        <input name="link" class="form-control"  :value="campos.link"  @blur="cambiaCampo($event.target.name, $event.target.value)">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="estilo" class="control-label col-lg-3 my-auto" >Estilo</label>
                    <div class="col-lg-9">
                        <select name="estilo" class="form-control " :value="campos.estilo" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Estilo del Modulo" >
                            <option value="estilo-1">Estilo 1</option>
                            <option value="estilo-2">Estilo 2</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="columnas" class="control-label col-lg-3 my-auto" >Columnas</label>
                    <div class="col-lg-9">
                        <select name="columnas" class="form-control " :value="campos.columnas" @change="cambiaCampo($event.target.name, $event.target.value)" placeholder="Cantidad de Columnas" >
                            <option value="col-md-6">2</option>
                            <option value="col-md-4">3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nombre" class="control-label col-lg-3" >Listas</label>
                    <div class="col-lg-9">
                        <div class="card border border-primary tasks-widget"  v-for="(lista,index) in listas" :key="index">
                            <div class="card-header bg-primary">
                                {{ lista.titulo}}
                                <span class="tools pull-right"><button class="btn btn-danger btn-xs" @click.prevent="listas.splice(index, 1)"><i class="fa fa-times"></i></button></span>
                            </div>
                            <div class="card-body">
                            	<div class="task-content" >
                                    <div class="form-group">
                                        <div class="col-lg-12 row">
                                            <label class="col-lg-2 my-auto pb-2 pb-lg-0">Titulo de la lista</label>
                                            <input  class="form-control col-lg-10 ml-3 ml-lg-0" v-model="lista.titulo" placeholder="Titulo de la lista">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-lg-12 row align-items-center">
                                            <label class="col-lg-2 my-auto pb-2 pb-lg-0">Icono de los Titulos</label>
                                            <div class="col-10 col-lg-9 p-0">
                                                <multiselect
                                                    v-model="lista.icono_titulo"
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
                                                <i class=" fa-2x text-primary"  :class="lista.icono_titulo"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 row align-items-center">
                                            <label class="col-lg-2 my-auto pb-2 pb-lg-0">Icono de los Items</label>
                                            <div class="col-10 col-lg-9 p-0">
                                                <multiselect
                                                    v-model="lista.icono_items"
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
                                            <div class="col-1 col-lg-1 text-center p-3 mt-3">
                                                <i class=" fa-2x text-primary"  :class="lista.icono_items"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="task-list">
                                        <li v-for="(item,index) in lista.items" :key="index" class="list-primary mb-3">
                                            <div class="task-title">
                                                <div class="input-group d-flex col-lg-12">
                                                    <input  type="text" class="form-control col-10 col-lg-11" v-model="item.texto" placeholder="Texto del Item">
                                                    <div class="input-group-btn col-2 col-lg-1 pr-0">
                                                        <button class="btn btn-danger" @click.prevent="lista.items.splice(index, 1)">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <button class="btn btn-primary m-3" @click.prevent="agregarItem(lista)">Agregar Item</button>
                                        </div>
                                    </div>
                            	</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 ">
                        <div class="pull-right">
                            <button class="btn btn-primary mb-3" @click.prevent="agregarLista">Agregar Lista</button>
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
                listas: [],
                iconos: [],
	        }
	    },
	    props: ['id','nombre','campos','clases'],
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
	        agregarLista() {
	        	this.listas.push({titulo:'Nombre de la lista',icono_titulo: '', icono_items:'', items:[{texto:''}]})
	        },
            agregarItem(lista){
                console.log(lista)
                lista.items.push({texto:''})
            },
            toggle(event){
                event.classList.toggle('fa-chevron-up')
                event.classList.toggle('fa-chevron-down')
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
	        listas: {
                handler: function (values) {
                    this.cambiaCampo('listas',values)
	            },
                deep: true
            }
	    },
	    mounted() {
            if(this.campos.listas){
                this.listas = this.campos.listas
            } else {
               this.listas = []
            }
           this.iconos = require('../../iconos').iconos;
	    }
	}
</script>

