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
        <!-- <div
            class="form-group row"
            :class="{ 'is-invalid': form.errors.has('links') }"
        >
            <label for="links" class="col-form-label col-lg-2">Links</label>
            <div class="col-lg-10">
                <input class="form-control" v-model="form.links" />
                <p
                    class="invalid-feedback"
                    v-if="form.errors.has('links')"
                    v-text="form.errors.get('links')"
                ></p>
            </div>
        </div> -->
        <div class="form-group row">
            <label for="created_at" class="col-form-label col-lg-2"
                >Fecha</label
            >
            <div class="col-lg-10">
                <date-picker
                    v-model="fecha"
                    type="date"
                    format="DD-MM-YYYY"
                    lang="es"
                ></date-picker>
            </div>
        </div>
        <div class="form-group row">
            <label for="tema" class="col-form-label col-lg-2">Tema</label>
            <div class="col-lg-10">
                <multiselect
                    v-model="selectedTema"
                    :taggable="true"
                    @tag="addTema"
                    label="nombre"
                    :options="temas"
                    :searchable="true"
                    :close-on-select="true"
                    placeholder="Elija un tema para la noticia"
                    deselect-label="Enter para eliminar"
                    select-label="Enter para seleccionar"
                    @select="form.errors.clear()"
                    v-if="user && user.can['temas-agregar']"
                ></multiselect>
                <select
                    name="tema"
                    class="form-control"
                    v-model="selectedTema"
                    v-else
                >
                    <option
                        v-for="(tema, index) in temas"
                        :value="tema"
                        :key="index"
                        v-text="tema.nombre"
                    ></option>
                </select>
            </div>
        </div>
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
                    :alt.sync="item.alt"
                    :creditos.sync="item.creditos"
                    :puedoBorrar="puedoBorrarImagen"
                    :activar_alt="true"
                    :activar_creditos="true"
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
        <div class="form-group row">
            <div class="offset-md-2 col-lg-10">
                <input
                    id="marcada"
                    name="marcada"
                    type="checkbox"
                    v-model="form.marcada"
                />
                <div class="btn-group">
                    <label for="marcada" class="btn btn-primary">
                        <span class="fas fa-check"></span>
                        <span class="fas fa-times"></span>
                    </label>
                    <label for="marcada" class="btn btn-primary"
                        >Marcar Noticia</label
                    >
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-md-2 col-lg-10">
                <input
                    id="publicada"
                    name="publicada"
                    type="checkbox"
                    v-model="form.publicada"
                />
                <div class="btn-group">
                    <label for="publicada" class="btn btn-primary">
                        <span class="fas fa-check"></span>
                        <span class="fas fa-times"></span>
                    </label>
                    <label for="publicada" class="btn btn-primary"
                        >Publicar noticia</label
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
                v-text="textoBoton"
            ></button>
        </div>
    </form>
</template>
<script>
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
export default {
    components: { DatePicker },
    props: {
        evento: { default: "" },
        noticia: {
            type: Object,
            default: () => {}
        }
    },
    data() {
        return {
            form: new Form({
                id: "",
                titulo: "",
                tema_id: "",
                contenido: "",
                imagenes: [{ imagen: "", alt: "", creditos: "" }],
                publicada: false,
                marcada: false,
                created_at: "",
                links: "",
                pais: ""
            }),
            fecha: "",
            temas: [],
            selectedTema: "",
            urlSubir: route("uploadArchivoNoticia"),
            urlBorrar: route("borrarArchivoNoticia"),
            user: Laravel.user
        };
    },

    methods: {
        agregarImagen() {
            this.form.imagenes.push({ imagen: "", alt: "" });
        },
        borrarImagen(index) {
            this.form.imagenes.splice(index, 1);
        },
        onSubmit() {
            if (this.evento == "editar") {
                this.form
                    .patch(route("noticias.update", this.noticia.slug))
                    .then(response => {
                        if (response.success) {
                            window.location.href = route("noticias.index");
                        }
                    })
                    .catch(errors => console.log(errors));
            }
            if (this.evento == "crear") {
                this.form
                    .post(route("noticias.store"))
                    .then(response => {
                        if (response.success) {
                            window.location.href = route("noticias.index");
                        }
                    })
                    .catch(errors => console.log(errors));
            }
        },
        updateNoticia() {
            if (this.noticia) {
                this.form.id = this.noticia.id;
                this.form.titulo = this.noticia.titulo;
                this.form.tema_id = this.noticia.tema_id;
                this.form.pais = this.noticia.pais;
                this.form.links = this.noticia.links;
                this.form.contenido = this.noticia.contenido;
                if (this.noticia.imagenes) {
                    this.form.imagenes = this.noticia.imagenes;
                }
                this.form.publicada = this.noticia.publicada;
                this.form.marcada = this.noticia.marcada;
                this.fecha = new Date(this.noticia.created_at);
            } else {
                this.fecha = new Date();
            }
        },
        borrarForm() {
            this.form.id = "";
            this.form.titulo = "";
            this.form.contenido = "";
            this.form.imagenes = [{ imagen: "" }];
            this.form.publicada = false;
            this.form.marcada = false;
            this.form.pais = "";
            this.form.links = "";
        },
        cancelar() {
            window.location.href = route("noticias.index");
        },
        guardarCambios() {
            if (this.evento === "editar") {
                this.form.patch(route("noticias.update", this.noticia.slug));
            }
        },
        getTemas() {
            axios
                .get(route("getTemas"))
                .then(respuesta => {
                    this.temas = respuesta.data;
                })
                .catch(error => console.log(error.response.data));
        },
        addTema(tema) {
            axios
                .post(route("temas.store"), { nombre: tema })
                .then(response => {
                    this.temas.push(response.data);
                    this.selectedTema = response.data;
                })
                .catch(errors => console.log(errors));
        }
    },
    computed: {
        puedoBorrarImagen() {
            return this.form.imagenes.length > 1;
        },
        textoBoton() {
            return this.evento == "editar"
                ? "Guardar Noticia"
                : "Crear Noticia";
        }
    },
    created() {
        this.getTemas();
        this.updateNoticia();
    },
    watch: {
        fecha: function(val) {
            this.form.created_at = moment(val).format("YYYY-MM-DD");
        },
        selectedTema: function(value) {
            this.form.tema_id = value.id;
        },
        temas: function(val) {
            if (this.noticia) {
                this.selectedTema = val.find(
                    tema => tema.id == this.noticia.tema_id
                );
            }
        }
    }
};
</script>
