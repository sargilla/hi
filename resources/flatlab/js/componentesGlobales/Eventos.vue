<template>
    <form
        class="form-horizontal"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)"
    >
        <div
            class="form-group row"
            :class="{ 'is-invalid': form.errors.has('titulo') }"
        >
            <label for="titulo" class="col-form-label col-lg-2">Título</label>
            <div class="col-lg-10">
                <input class="form-control" v-model="form.titulo" />
                <p
                    class="invalid-feedback"
                    v-if="form.errors.has('titulo')"
                    v-text="form.errors.get('titulo')"
                ></p>
            </div>
        </div>
        <div
            class="form-group row"
            :class="{ 'is-invalid': form.errors.has('pais') }"
        >
            <label for="pais" class="col-form-label col-lg-2">Pais</label>
            <div class="col-lg-10">
                <input class="form-control" v-model="form.pais" />
                <p
                    class="invalid-feedback"
                    v-if="form.errors.has('pais')"
                    v-text="form.errors.get('pais')"
                ></p>
            </div>
        </div>
        <div
            class="form-group row"
            :class="{ 'is-invalid': form.errors.has('nivel') }"
        >
            <label for="nivel" class="col-form-label col-lg-2">Nivel</label>
            <div class="col-lg-10">
                <input class="form-control" v-model="form.nivel" />
                <p
                    class="invalid-feedback"
                    v-if="form.errors.has('nivel')"
                    v-text="form.errors.get('nivel')"
                ></p>
            </div>
        </div>
        <div
            class="form-group row"
            :class="{ 'is-invalid': form.errors.has('sector') }"
        >
            <label for="sector" class="col-form-label col-lg-2">Sector</label>
            <div class="col-lg-10">
                <input class="form-control" v-model="form.sector" />
                <p
                    class="invalid-feedback"
                    v-if="form.errors.has('sector')"
                    v-text="form.errors.get('sector')"
                ></p>
            </div>
        </div>
        <div class="form-group row">
            <label for="tipo" class="control-label col-lg-2">Tipo</label>
            <div class="col-lg-10">
                <multiselect
                    v-model="selectedTipo"
                    :taggable="true"
                    @tag="addTipo"
                    label="nombre"
                    :options="tipos"
                    :searchable="true"
                    :close-on-select="true"
                    placeholder="Elija un tipo de evento"
                    deselect-label="Enter para eliminar"
                    select-label="Enter para seleccionar"
                    @select="form.errors.clear()"
                ></multiselect>
            </div>
        </div>
        <div class="form-group row">
            <label for="fecha_desde" class="control-label col-lg-2"
                >Desde</label
            >
            <div class="col-lg-4">
                <date-picker
                    name="fecha_desde"
                    v-model="fecha_desde"
                    type="datetime"
                    format="DD-MM-YYYY HH:mm"
                    lang="es"
                    :minute-step="5"
                    confirm
                ></date-picker>
            </div>
            <label for="fecha_hasta" class="control-label col-lg-2"
                >Hasta</label
            >
            <div class="col-lg-4">
                <date-picker
                    name="fecha_hasta"
                    v-model="fecha_hasta"
                    type="datetime"
                    format="DD-MM-YYYY HH:mm"
                    lang="es"
                    :minute-step="5"
                    confirm
                ></date-picker>
                <p class="invalid-feedback">
                    No completar si el evento es todo el día
                </p>
            </div>
        </div>
        <!-- <div
            class="form-group row"
            :class="{ 'is-invalid': form.errors.has('intro') }"
        >
            <label for="intro" class="col-form-label col-lg-2"
                >Introduccion</label
            >
            <div class="col-lg-10">
                <editor
                    name="intro"
                    tipo="basico"
                    :contenido.sync="form.intro"
                ></editor>
                <p
                    class="invalid-feedback"
                    v-if="form.errors.has('intro')"
                    v-text="form.errors.get('intro')"
                ></p>
            </div>
        </div> -->
        <div
            class="form-group row"
            :class="{ 'is-invalid': form.errors.has('contenido') }"
        >
            <label for="contenido" class="col-form-label col-lg-2"
                >Contenido</label
            >
            <div class="col-lg-10">
                <editor
                    name="contenido"
                    tipo="basico"
                    :contenido.sync="form.contenido"
                ></editor>
                <p
                    class="invalid-feedback"
                    v-if="form.errors.has('contenido')"
                    v-text="form.errors.get('contenido')"
                ></p>
            </div>
        </div>
        <div
            class="form-group row"
            :class="{ 'is-invalid': form.errors.has('imagenes.imagen') }"
        >
            <label for="texto" class="col-form-label col-lg-2">Imagenes</label>
            <div class="col-lg-10 d-flex flex-wrap">
                <subir-imagen
                    class="col-md-3 mb-3"
                    v-for="(item, index) in form.imagenes"
                    :key="index"
                    :urlSubir="urlSubir"
                    :urlBorrar="urlBorrar"
                    :imagen.sync="item.imagen"
                    :puedoBorrar="puedoBorrarImagen"
                    @borrar="borrarImagen(index)"
                    @update="guardarCambios"
                />
                <div class="col-md-1 ">
                    <button
                        class="btn btn-default"
                        @click.prevent="agregarImagen"
                    >
                        Agregar otra imagen
                    </button>
                </div>
            </div>
        </div>
        <div class="form-group row mb-5">
            <label for="expositores" class="col-form-label col-lg-2"
                >Expositores</label
            >
            <div class="col-lg-10 row">
                <div
                    class="col-md-4 form-group d-flex flex-column align-items-lg-center"
                    v-for="(expositor, index) in form.expositores"
                    :key="index"
                >
                    <input
                        class="form-control mb-2"
                        v-model="expositor.nombre"
                        placeholder="Nombre del Expositor"
                    />
                    <input
                        class="form-control mb-2"
                        v-model="expositor.titulo"
                        placeholder="Titulo del Expositor"
                    />
                    <button
                        class="btn btn-xs btn-danger"
                        @click.prevent="borrarExpositor(index)"
                    >
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="offset-lg-2  col-lg-10">
                <button
                    class="btn btn-primary"
                    @click.prevent="agregarExpositor"
                >
                    Agregar otro expositor
                </button>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-lg-2 col-lg-10">
                <input
                    id="marcado"
                    name="marcado"
                    type="checkbox"
                    v-model="form.marcado"
                />
                <div class="btn-group">
                    <label for="marcado" class="btn btn-primary">
                        <span class="fas fa-check"></span>
                        <span class="fas fa-times"></span>
                    </label>
                    <label for="marcado" class="btn btn-primary"
                        >Marcar Evento</label
                    >
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-lg-2 col-lg-10">
                <input
                    id="publicado"
                    name="publicado"
                    type="checkbox"
                    v-model="form.publicado"
                />
                <div class="btn-group">
                    <label for="publicado" class="btn btn-primary">
                        <span class="fas fa-check"></span>
                        <span class="fas fa-times"></span>
                    </label>
                    <label for="publicado" class="btn btn-primary"
                        >Publicar evento</label
                    >
                </div>
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <button
                class="btn btn-warning btn-shadow "
                @click="cancelar"
                type="button"
            >
                Cancelar
            </button>
            <button
                class="btn btn-primary btn-shadow "
                :disabled="form.errors.any()"
            >
                Guardar evento
            </button>
        </div>
    </form>
</template>
<script>
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
export default {
    components: { DatePicker },
    props: {
        accion: { type: String, default: "" },
        evento: {
            type: Object,
            default: () => {}
        }
    },
    data() {
        return {
            form: new Form({
                id: "",
                titulo: "",
                tipo_id: "",
                contenido: "",
                imagenes: [{ imagen: "" }],
                publicado: false,
                marcado: false,
                pais: "",
                nivel: "",
                sector: "",
                expositores: [{ nombre: "", titulo: "" }],
                fecha_desde: "",
                fecha_hasta: ""
            }),
            fecha_desde: "",
            fecha_hasta: "",
            tipos: [],
            selectedTipo: "",
            textoBoton: "",
            urlSubir: route("uploadArchivoEvento"),
            urlBorrar: route("borrarArchivoEvento")
        };
    },

    methods: {
        addTipo(tipo) {
            axios
                .post(route("tipos.store"), { nombre: tipo })
                .then(response => {
                    this.tipos.push(response.data);
                    this.selectedTipo = response.data;
                })
                .catch(errors => console.log(errors));
        },
        agregarImagen() {
            this.form.imagenes.push({ imagen: "" });
        },
        borrarImagen(index) {
            this.form.imagenes.splice(index, 1);
        },
        agregarExpositor() {
            this.form.expositores.push({ nombre: "", titulo: "" });
        },
        borrarExpositor(index) {
            this.form.expositores.splice(index, 1);
        },
        onSubmit() {
            this.form.expositores = this.form.expositores.filter(
                expositor => expositor.nombre != ""
            );
            if (this.accion == "editar") {
                this.form
                    .patch(route("eventos.update", this.evento.slug))
                    .then(response => {
                        if (response.success) {
                            window.location.href = route("eventos.index");
                        }
                    })
                    .catch(errors => console.log(errors));
            }
            if (this.accion == "crear") {
                this.form
                    .post(route("eventos.store"))
                    .then(response => {
                        if (response.success) {
                            window.location.href = route("eventos.index");
                        }
                    })
                    .catch(errors => console.log(errors));
            }
        },
        updateEvento() {
            this.form.id = this.evento.id;
            this.form.titulo = this.evento.titulo;
            this.form.tipo_id = this.evento.tipo_id;
            this.form.contenido = this.evento.contenido;
            if (this.evento.imagenes) {
                this.form.imagenes = this.evento.imagenes;
            }
            this.form.publicado = this.evento.publicado;
            this.form.marcado = this.evento.marcado;
            this.form.pais = this.evento.pais;
            this.form.nivel = this.evento.nivel;
            this.form.sector = this.evento.sector;
            this.form.expositores = this.evento.expositores ?? [
                { nombre: "", titulo: "" }
            ];
            this.fecha_desde = this.evento.fecha_desde
                ? new Date(this.evento.fecha_desde)
                : "";
            this.fecha_hasta = this.evento.fecha_hasta
                ? new Date(this.evento.fecha_hasta)
                : "";
        },
        borrarForm() {
            this.form.id = "";
            this.form.titulo = "";
            this.form.tipo_id = "";
            this.form.contenido = "";
            this.form.imagenes = [{ imagen: "" }];
            this.form.publicado = false;
            this.form.marcado = false;
            this.form.pais = "";
            this.form.nivel = "";
            this.form.sector = "";
            this.form.expositores = [];
        },
        cancelar() {
            window.location.href = route("eventos.index");
        },
        guardarCambios() {
            if (this.accion === "editar") {
                this.form.patch(route("eventos.update", this.evento.slug));
            }
        },
        getTipos() {
            axios
                .get(route("getTipos"))
                .then(respuesta => {
                    this.tipos = respuesta.data;
                    if (this.form.tipo_id) {
                        this.selectedTipo = this.tipos.find(
                            tipo => (tipo.id = this.form.tipo_id)
                        );
                    }
                })
                .catch(error => console.log(error.response.data));
        }
    },
    computed: {
        puedoBorrarImagen() {
            return this.form.imagenes.length > 1;
        }
    },
    created() {
        if (this.evento) {
            this.updateEvento();
        }
        this.getTipos();
    },
    watch: {
        selectedTipo: function(value) {
            this.form.tipo_id = value.id;
        },
        fecha_desde: function(val) {
            this.form.fecha_desde = val
                ? moment(val).format("YYYY-MM-DD HH:mm")
                : "";
        },
        fecha_hasta: function(val) {
            this.form.fecha_hasta = val
                ? moment(val).format("YYYY-MM-DD HH:mm")
                : "";
        }
    }
};
</script>
