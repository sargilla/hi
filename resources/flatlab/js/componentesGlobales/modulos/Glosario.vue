<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span v-if="user.can['paginas-dragmodulos']"
                ><i class="fas fa-arrows-alt my-handle"></i>
            </span>
            {{ nombre }} [Glosario]
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
                <label for="nombre" class="control-label col-lg-2"
                    >Nombre del Modulo</label
                >
                <div class="col-lg-10">
                    <input
                        name="nombre"
                        class="form-control"
                        v-model="nombre"
                        @blur="cambiaNombre($event.target.value)"
                        placeholder="Nombre"
                    />
                </div>
            </div>
            <!-- <div class="form-group row">
                <label for="link" class="control-label col-lg-3"
                    >Link del Menu</label
                >
                <div class="col-lg-9">
                    <input
                        name="link"
                        class="form-control"
                        :value="campos.link"
                        @blur="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                    />
                </div>
            </div> -->
            <!-- <div class="form-group row">
                <label for="estilo" class="control-label col-lg-3"
                    >Estilo</label
                >
                <div class="col-lg-9">
                    <select
                        name="estilo"
                        class="form-control "
                        :value="campos.estilo"
                        @change="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                        placeholder="Estilo del Modulo"
                    >
                        <option value="">Fondo Naranja</option>
                        <option value="blanco">Fondo Blanco</option>
                    </select>
                </div>
            </div> -->

            <div class="form-group row">
                <label for="titulo" class="col-md-2 col-form-label"
                    >Titulo</label
                >
                <div class="col-md-10">
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
                <label for="titulo" class="col-md-2 col-form-label"
                    >Texto</label
                >
                <div class="col-md-10">
                    <input
                        name="texto"
                        class="form-control"
                        :value="campos.texto"
                        @blur="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                        placeholder="Texto"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label for="modulos" class="control-label col-lg-2"
                    >Definiciones</label
                >
                <div class="col-lg-10">
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
                        <div class="card-body bg-white text-dark">
                            <div class="task-content">
                                <div class="form-group row">
                                    <label
                                        class="control-label col-lg-2 my-auto"
                                        >Definición</label
                                    >
                                    <div class="col-lg-10">
                                        <input
                                            class="form-control  "
                                            v-model="modulo.titulo"
                                            placeholder="Titulo de la definición"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="texto"
                                        class="control-label col-lg-2 my-auto"
                                        >Texto</label
                                    >
                                    <div class="col-lg-10">
                                        <!-- <wysiwyg :id="id" v-model="campos.texto" :contenido="campos.texto" nombre="texto"></wysiwyg> -->
                                        <editor
                                            name="texto"
                                            :contenido.sync="modulo.texto"
                                        ></editor>
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
                            Agregar Definición
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
            this.modulos.push({ texto: "", imagen: "", link: "" });
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
