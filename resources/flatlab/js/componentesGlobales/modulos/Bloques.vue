<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span v-if="user.can['paginas-dragmodulos']"
                ><i class="fas fa-arrows-alt my-handle"></i>
            </span>
            {{ nombre }} [Bloques]
            <span class="tools pull-right">
                <a
                    class="fa fa-chevron-up accordion-toggle"
                    data-toggle="collapse"
                    @click="toggle($event.target)"
                    :href="id_modulo_shooter"
                >
                </a>
                <a
                    class="fa fa-times"
                    title="Quitar este modulo"
                    href="javascript:;"
                    @click="borrar"
                >
                </a>
            </span>
        </header>
        <div
            ref="caja"
            class="card-body modulos-body collapse show"
            :id="id_modulo"
        >
            <div class="form-group row">
                <label for="nombre" class="control-label col-lg-3"
                    >Nombre del Modulo</label
                >
                <div class="col-lg-9">
                    <input
                        name="nombre"
                        class="form-control"
                        v-model="nombre"
                        @blur="cambiaNombre($event.target.value)"
                        placeholder="Nombre"
                    />
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
                <label for="columnas" class="control-label col-lg-3"
                    >Columnas</label
                >
                <div class="col-lg-9">
                    <select
                        name="columnas"
                        class="form-control "
                        :value="campos.columnas"
                        @change="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                        placeholder="Cantidad de Columnas"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
            <div v-if="campos.estilo != 3" class="form-group row">
                <label for="titulo" class="col-md-3 col-form-label"
                    >Titulo</label
                >
                <div class="col-md-9">
                    <input
                        name="titulo"
                        class="form-control"
                        :value="campos.titulo"
                        @blur="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                        placeholder="Titulo"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 my-auto">Color Texto</label>
                <div class="col-md-9">
                    <select class="form-control" v-model="campos.color">
                        <option disabled value="">Elija un Color</option>
                        <option value="negro">Negro</option>
                        <option value="celeste">Celeste</option>
                        <option value="blanco">Blanco</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 my-auto">Estilo</label>
                <div class="col-md-9">
                    <select class="form-control" v-model="campos.estilo">
                        <option disabled value="">Elija un estilo</option>
                        <option value="1">Estilo 1</option>
                        <option value="2">Estilo 2</option>
                        <option value="3">Estilo 3</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="modulos" class="control-label col-lg-3"
                    >Modulos</label
                >
                <div class="col-lg-9">
                    <div
                        class="card bg-primary tasks-widget border border-primary"
                        v-for="(modulo, index) in modulos"
                        :key="index"
                    >
                        <div class="card-header bg-primary">
                            {{ modulo.titulo }}
                            <span class="tools pull-right"
                                ><button
                                    class="btn btn-danger btn-xs"
                                    @click.prevent="modulos.splice(index, 1)"
                                >
                                    <i class="fa fa-times"></i></button
                            ></span>
                        </div>

                        <div
                            v-if="campos.estilo == 3"
                            class="card-body bg-white text-dark"
                        >
                            <div class="task-content">
                                <div class="form-group m-0">
                                    <div class="col-lg-12 row">
                                        <label class="col-lg-2 my-auto"
                                            >Titulo</label
                                        >
                                        <input
                                            class="form-control col-lg-10 "
                                            v-model="modulo.titulo"
                                            placeholder="Titulo del módulo"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-white text-dark">
                            <div class="task-content">
                                <div class="form-group m-0">
                                    <div class="col-lg-12 row">
                                        <label class="col-lg-2 my-auto"
                                            >Texto</label
                                        >
                                        <input
                                            class="form-control col-lg-10 "
                                            v-model="modulo.texto"
                                            placeholder="Texto del módulo"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-white text-dark">
                            <div class="task-content">
                                <div class="form-group m-0">
                                    <div class="col-lg-12 row">
                                        <label class="col-lg-2 my-auto"
                                            >Link</label
                                        >
                                        <input
                                            class="form-control col-lg-10 "
                                            v-model="modulo.link"
                                            placeholder="Link del módulo"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-white text-dark">
                            <div class="task-content">
                                <div class="form-group m-0">
                                    <div class="col-lg-12 row">
                                        <label class="col-lg-2 my-auto"
                                            >Descripcion del Link</label
                                        >
                                        <input
                                            class="form-control col-lg-10 "
                                            v-model="modulo.link_description"
                                            placeholder="Descripción del link"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-white text-dark">
                            <div class="task-content">
                                <div class="form-group m-0">
                                    <div class="col-lg-12 row">
                                        <label class="col-lg-2 my-auto"
                                            >Texto del botón</label
                                        >
                                        <input
                                            class="form-control col-lg-10 "
                                            v-model="modulo.link_texto"
                                            placeholder="Texto del botón"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-white text-dark">
                            <div class="task-content">
                                <div class="form-group m-0">
                                    <div class="col-lg-12 row">
                                        <label class="col-lg-2 my-auto"
                                            >País</label
                                        >
                                        <input
                                            class="form-control col-lg-10 "
                                            v-model="modulo.pais"
                                            placeholder="Pais (opcional)"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-white text-dark">
                            <div class="task-content">
                                <div class="form-group m-0">
                                    <div class="col-lg-12 row">
                                        <label
                                            for="imagen"
                                            class="control-label col-lg-2"
                                            >Imágen</label
                                        >
                                        <div class="col-md-3 p-0">
                                            <subir-imagen
                                                :urlSubir="urlSubir"
                                                :urlBorrar="urlBorrar"
                                                :imagen.sync="modulo.imagen"
                                                :puedoBorrar="false"
                                                @borrar="borrarImagen(index)"
                                                @update="guardarCampos()"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="form-group mt-3 row align-items-center"
                                >
                                    <label
                                        for="alt_imagen"
                                        class="control-label col-lg-2 mb-0"
                                        >Alt imagen</label
                                    >
                                    <div class="col-md-6">
                                        <input
                                            id="alt_imagen"
                                            name="alt_imagen"
                                            class="form-control"
                                            v-model="modulo.alt_imagen"
                                            placeholder="Alt de la imagen"
                                        />
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
                        <button
                            class="btn btn-primary mb-3"
                            @click.prevent="agregarModulo"
                        >
                            Agregar Modulo
                        </button>
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
            urlSubir: route("uploadArchivoPagina"),
            urlBorrar: route("borrarArchivoPagina")
        };
    },
    props: ["id", "nombre", "campos"],
    methods: {
        cambiaCampo(campo, value) {
            let campos = this.campos;
            campos[campo] = value;
            this.$emit("update:campos", campos);
        },
        cambiaNombre(value) {
            this.$emit("update:nombre", value);
        },
        borrar() {
            this.$emit("borrar");
        },
        agregarModulo() {
            this.modulos.push({
                texto: "",
                imagen: "",
                link: "",
                titulo: "",
                link_description: "",
                link_texto: "Descargar el documento",
                pais: ""
            });
        },
        toggle(event) {
            event.classList.toggle("fa-chevron-up");
            event.classList.toggle("fa-chevron-down");
        }
    },
    created() {
        this.user = Laravel.user;
    },
    computed: {
        id_modulo: function() {
            return "modulo" + this.id;
        },
        id_modulo_shooter: function() {
            return "#modulo" + this.id;
        }
    },
    watch: {
        modulos: {
            handler: function(values) {
                this.cambiaCampo("modulos", values);
            },
            deep: true
        }
    },
    mounted() {
        if (this.campos.modulos) {
            this.modulos = this.campos.modulos;
        } else {
            this.modulos = [];
        }
    }
};
</script>
