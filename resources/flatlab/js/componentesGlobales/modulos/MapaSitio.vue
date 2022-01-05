<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span v-if="user.can['paginas-dragmodulos']"
                ><i class="fas fa-arrows-alt my-handle"></i>
            </span>
            {{ nombre }} [Mapa del sitio]
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
            class="card-body links-body collapse show"
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
                <label for="links" class="control-label col-lg-2">Links</label>
                <div class="col-lg-10">
                    <draggable
                        v-model="links"
                        @start="drag = true"
                        @end="drag = false"
                        handle=".draglink"
                    >
                        <div
                            class="card border border-primary"
                            v-for="(link, index) in links"
                            :key="index"
                        >
                            <div class="card-header bg-primary">
                                <i class="fas fa-arrows-alt draglink"></i>
                                {{ link.titulo }}
                                <span class="tools pull-right"
                                    ><button
                                        class="btn btn-danger btn-xs"
                                        @click.prevent="links.splice(index, 1)"
                                    >
                                        <i class="fa fa-times"></i></button
                                ></span>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label"
                                        >Texto</label
                                    >
                                    <div class="col-lg-10">
                                        <input
                                            class="form-control"
                                            v-model="link.texto"
                                            placeholder="Texto del link"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"
                                        >Link</label
                                    >
                                    <div class="col-lg-10">
                                        <input
                                            class="form-control"
                                            v-model="link.link"
                                            placeholder="Link"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"
                                        >Descripción Link</label
                                    >
                                    <div class="col-lg-10">
                                        <input
                                            class="form-control"
                                            v-model="link.link_description"
                                            placeholder="Descripcion del Link"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"
                                        >Nivel</label
                                    >
                                    <div class="col-lg-10">
                                        <input
                                            class="form-control"
                                            v-model="link.nivel"
                                            type="number"
                                            min="1"
                                            max="3"
                                            placeholder="Nivel del link"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </draggable>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12">
                    <div class="pull-right">
                        <button
                            class="btn btn-primary mb-3"
                            @click.prevent="agregarModulo"
                        >
                            Agregar Link
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import draggable from "vuedraggable";
export default {
    components: {
        draggable
    },
    data() {
        return {
            links: [],
            user: null,
            iconos: [],
            urlSubir: route("uploadArchivoPagina"),
            urlBorrar: route("borrarArchivoPagina"),
            link_vacio: {
                texto: "",
                link: "",
                link_description: "",
                nivel: 1
            }
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
            this.links.push({ ...this.link_vacio });
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
        links: {
            handler: function(values) {
                this.cambiaCampo("links", values);
            },
            deep: true
        }
    },
    mounted() {
        if (this.campos.links) {
            this.links = this.campos.links;
        } else {
            this.links = [];
            this.agregarModulo();
        }
    }
};
</script>
