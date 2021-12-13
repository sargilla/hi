<template>
    <form
        class="form-horizontal"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)"
    >
        <template v-if="evento === 'borrar'">
            <div class="form-group row">
                <label class="control-label col-lg-12"
                    >Seguro que desea borrar esta página?</label
                >
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <button
                        class="btn btn-warning btn-shadow btn-lg btn-block"
                        data-dismiss="modal"
                        type="button"
                    >
                        Cancelar
                    </button>
                </div>
                <div class="col-lg-6">
                    <button
                        class="btn btn-primary btn-shadow btn-lg btn-block"
                        :class="{ 'has-spinner': enviando == true }"
                        :disabled="form.errors.any() || enviando == true"
                    >
                        Borrar Página
                        <i
                            class="fas fa-circle-o-notch fa-spin"
                            v-show="enviando == true"
                        ></i>
                    </button>
                </div>
            </div>
        </template>
        <template v-else>
            <div class="overlay-buttons">
                <button
                    class="btn btn-warning btn-shadow"
                    data-dismiss="modal"
                    type="button"
                    v-if="evento === 'borrar'"
                    alt="Volver"
                >
                    Volver
                </button>
                <button
                    data-toggle="collapse"
                    data-target=".modulos-body"
                    class="tooltips btn btn-warning btn-shadow"
                    type="button"
                    title="Abrir/Cerrar Paneles"
                >
                    <i class="fas fa-server"></i>
                </button>
                <button
                    class="btn btn-primary btn-shadow"
                    :disabled="form.errors.any()"
                    @click="onClick(true)"
                    data-toggle="tooltip"
                    title="Guardar página"
                >
                    <i class="fas fa-save"></i>
                </button>
                <button
                    v-if="evento === 'editar'"
                    class="btn btn-info btn-shadow"
                    :disabled="form.errors.any()"
                    @click="onClick(false)"
                    data-toggle="tooltip"
                    title="Guardar página y volver"
                >
                    <i class="fas fa-save"></i> <i class="fas fa-undo"></i>
                </button>
                <button
                    type="button"
                    class="btn btn-primary btn-shadow sb-toggle-right"
                    v-if="user.can['paginas-crearmodulos']"
                >
                    <i class="fa fa-align-right"></i>
                </button>
            </div>
            <div class="sb-slidebar sb-right sb-style-overlay">
                <h5 class="side-title">Posiciones habilitadas</h5>
                <div
                    class="container checkboxes"
                    v-if="user.can['paginas-crearmodulos']"
                >
                    <label
                        class="label_check"
                        :class="isChecked(posicion.value) ? 'c_on' : 'c_off'"
                        v-for="(posicion, index) in posiciones"
                        :key="index"
                    >
                        <input
                            v-model="form.posiciones"
                            :value="posicion.value"
                            type="checkbox"
                        />{{ posicion.nombre }}
                    </label>
                </div>
                <h5 class="side-title">Modulos</h5>
                <div class="container" v-if="user.can['paginas-crearmodulos']">
                    <div class="form-group">
                        <select v-model="modulo_elegido" class="custom-select">
                            <option disabled value=""
                                >Elija un Tipo de Modulo</option
                            >
                            <option
                                v-for="(modulo, index) in modulos"
                                :key="index"
                                :value="modulo.value"
                                v-text="modulo.nombre"
                            ></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select
                            v-model="posicion_elegida"
                            class="custom-select"
                        >
                            <option disabled value=""
                                >Elija una posicion</option
                            >
                            <option value="contenido">Contenido</option>
                            <option
                                v-for="(posicion, index) in posiciones"
                                :key="index"
                                :value="posicion.value"
                                v-text="posicion.nombre"
                            ></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <span class="input-group-btn">
                            <button
                                class="btn btn-primary btn-block"
                                @click.prevent="agregarModulo"
                            >
                                Agregar Modulo
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div
                class="form-group row"
                :class="{ 'has-error': form.errors.has('titulo') }"
                v-if="user.can['paginas-editartitulo']"
            >
                <label for="titulo" class="col-md-2 col-form-label"
                    >Titulo de la Página</label
                >
                <div class="col-md-10">
                    <input
                        class="form-control"
                        v-model="form.titulo"
                        required
                    />
                    <p
                        class="help-block"
                        v-if="form.errors.has('titulo')"
                        v-text="form.errors.get('titulo')"
                    ></p>
                </div>
            </div>
            <div class="" v-if="isChecked('encabezado')">
                <h4 class="text-center p-2 border-bottom">Encabezado</h4>
                <draggable
                    v-model="form.contenido"
                    @start="drag = true"
                    @end="drag = false"
                    handle=".my-handle"
                >
                    <component
                        :is="modulo.tipo"
                        v-for="(modulo, index) in form.encabezado"
                        :id="`m-${index}`"
                        :key="index"
                        :campos.sync="modulo.campos"
                        :nombre.sync="modulo.nombre"
                        :estilo.sync="modulo.estilo"
                        @borrar="form.encabezado.splice(index, 1)"
                    ></component>
                </draggable>
            </div>
            <div class="">
                <h4 class="text-center p-2 border-bottom">Contenido</h4>
                <div class="">
                    <draggable
                        v-model="form.contenido"
                        @start="drag = true"
                        @end="drag = false"
                        handle=".my-handle"
                    >
                        <component
                            :is="modulo.tipo"
                            v-for="(modulo, index) in form.contenido"
                            :id="`m-${index}`"
                            :key="index"
                            :campos.sync="modulo.campos"
                            :nombre.sync="modulo.nombre"
                            :estilo.sync="modulo.estilo"
                            @borrar="form.contenido.splice(index, 1)"
                        ></component>
                    </draggable>
                </div>
            </div>
            <div class="" v-if="isChecked('derecha')">
                <h4 class="text-center p-2 border-bottom">Derecha</h4>
                <draggable
                    v-model="form.contenido"
                    @start="drag = true"
                    @end="drag = false"
                    handle=".my-handle"
                >
                    <component
                        :is="modulo.tipo"
                        v-for="(modulo, index) in form.derecha"
                        :id="`m-${index}`"
                        :key="index"
                        :campos.sync="modulo.campos"
                        :nombre.sync="modulo.nombre"
                        :estilo.sync="modulo.estilo"
                        @borrar="form.derecha.splice(index, 1)"
                    ></component>
                </draggable>
            </div>
            <div class="" v-if="isChecked('izquierda')">
                <h4 class="text-center p-2 border-bottom">Izquierda</h4>
                <draggable
                    v-model="form.contenido"
                    @start="drag = true"
                    @end="drag = false"
                    handle=".my-handle"
                >
                    <component
                        :is="modulo.tipo"
                        v-for="(modulo, index) in form.iquierda"
                        :id="`m-${index}`"
                        :key="index"
                        :campos.sync="modulo.campos"
                        :nombre.sync="modulo.nombre"
                        :estilo.sync="modulo.estilo"
                        @borrar="form.iquierda.splice(index, 1)"
                    ></component>
                </draggable>
            </div>
            <div class="" v-if="isChecked('pie')">
                <h4 class="text-center p-2 border-bottom">Pie</h4>
                <draggable
                    v-model="form.contenido"
                    @start="drag = true"
                    @end="drag = false"
                    handle=".my-handle"
                >
                    <component
                        :is="modulo.tipo"
                        v-for="(modulo, index) in form.pie"
                        :id="`m-${index}`"
                        :key="index"
                        :campos.sync="modulo.campos"
                        :nombre.sync="modulo.nombre"
                        :estilo.sync="modulo.estilo"
                        @borrar="form.pie.splice(index, 1)"
                    ></component>
                </draggable>
            </div>
        </template>
    </form>
</template>
<script>
import draggable from "vuedraggable";
import agenda from "./modulos/Agenda.vue";
import archivo from "./modulos/Archivo.vue";
import call_to_action from "./modulos/CallToAction.vue";
import carrousel_productos from "./modulos/CarrouselProductos.vue";
import contacto from "./modulos/Contacto.vue";
import documentos from "./modulos/Documentos.vue";
import glosario from "./modulos/Glosario.vue";
import listas from "./modulos/Listas.vue";
import lista_con_imagen from "./modulos/ListaConImagen.vue";
import slideshow from "./modulos/Slideshow.vue";
import bloques from "./modulos/Bloques.vue";
import bloques_banderas from "./modulos/BloquesBanderas.vue";
import bloques_experiencias from "./modulos/BloquesExperiencias.vue";
import texto from "./modulos/Texto.vue";
import titulo_texto from "./modulos/TituloTexto.vue";
import titulo_texto_imagen from "./modulos/TituloTextoImagen.vue";
import titulo_texto_video from "./modulos/TituloTextoVideo.vue";
import modulo_eventos from "./modulos/ModuloEventos.vue";
import cursos from "./modulos/Cursos.vue";
import links_clientes from "./modulos/LinksClientes.vue";
import carga_modulos from "./modulos/CargaModulos.vue";
import pasos from "./modulos/Pasos.vue";
import servicios from "./modulos/Servicios.vue";
import productos_inicio from "./modulos/ProductosInicio.vue";
import noticias_inicio from "./modulos/NoticiasInicio.vue";
import datos_impactos from "./modulos/DatosImpactos.vue";
import imagen_texto_link from "./modulos/ImagenTextoLink.vue";
import titulo_texto_link from "./modulos/TituloTextoLink.vue";
import titulo_texto_links from "./modulos/TituloTextoLinks.vue";
import lista_imagen_titulo_texto from "./modulos/ListaImagenTituloTexto.vue";
import filtro from "./modulos/Filtro.vue";
export default {
    components: {
        draggable,
        agenda,
        call_to_action,
        carga_modulos,
        links_clientes,
        contacto,
        cursos,
        listas,
        glosario,
        lista_con_imagen,
        documentos,
        slideshow,
        texto,
        titulo_texto,
        titulo_texto_imagen,
        bloques,
        bloques_banderas,
        bloques_experiencias,
        modulo_eventos,
        pasos,
        servicios,
        productos_inicio,
        noticias_inicio,
        titulo_texto_video,
        datos_impactos,
        imagen_texto_link,
        titulo_texto_link,
        titulo_texto_links,
        lista_imagen_titulo_texto,
        filtro
    },
    props: ["evento", "pagina"],
    data() {
        return {
            form: new Form({
                id: "",
                titulo: "",
                encabezado: [],
                derecha: [],
                izquierda: [],
                pie: [],
                contenido: [],
                posiciones: []
            }),
            modulo_elegido: "",
            posicion_elegida: "",
            quedarse: false,
            modulos: [
                { nombre: "Agenda", value: "agenda" },
                { nombre: "Bloques", value: "bloques" },
                { nombre: "Bloques Banderas", value: "bloques_banderas" },
                {
                    nombre: "Bloques Experiencias",
                    value: "bloques_experiencias"
                },
                { nombre: "Call To Action", value: "call_to_action" },
                { nombre: "Carga Módulos", value: "carga_modulos" },
                { nombre: "Clientes", value: "links_clientes" },
                { nombre: "Contacto", value: "contacto" },
                { nombre: "Cursos", value: "cursos" },
                { nombre: "Datos Impactos", value: "datos_impactos" },
                { nombre: "Documentos", value: "documentos" },
                { nombre: "Eventos", value: "modulo_eventos" },
                { nombre: "Filtro", value: "filtro" },
                { nombre: "Glosario", value: "glosario" },
                {
                    nombre: "Imagen con Texto y Link",
                    value: "imagen_texto_link"
                },
                { nombre: "Lista con Imagen", value: "lista_con_imagen" },
                {
                    nombre: "Lista con Imagen Titulo Texto",
                    value: "lista_imagen_titulo_texto"
                },
                { nombre: "Listas", value: "listas" },
                { nombre: "Noticias", value: "modulo-noticias" },
                { nombre: "Noticias en Inicio", value: "noticias_inicio" },
                { nombre: "Pasos", value: "pasos" },
                { nombre: "Productos en Inicio", value: "productos_inicio" },
                { nombre: "Servicios", value: "servicios" },
                { nombre: "Slideshow", value: "slideshow" },
                { nombre: "Tarjetas Rotativas", value: "rotate_cards" },
                { nombre: "Texto", value: "texto" },
                { nombre: "Titulo con Texto", value: "titulo_texto" },
                {
                    nombre: "Titulo con Texto y Links",
                    value: "titulo_texto_links"
                },
                {
                    nombre: "Titulo con Texto e Imágen",
                    value: "titulo_texto_imagen"
                },
                {
                    nombre: "Titulo con Texto y Link",
                    value: "titulo_texto_link"
                },
                {
                    nombre: "Titulo con Texto y Video",
                    value: "titulo_texto_video"
                },
                { nombre: "Titulo Header", value: "titulo-header" }
            ],
            posiciones: [
                { nombre: "Encabezado", value: "encabezado" },
                { nombre: "Pie", value: "pie" },
                { nombre: "Izquierda", value: "izquierda" },
                { nombre: "Derecha", value: "derecha" }
                // {nombre:'Top Contenido', value:'top_contenido'},
                // {nombre:'Pie Contenido', value:'pie_contenido'}
            ],
            user: ""
        };
    },
    methods: {
        isChecked(value) {
            return this.form.posiciones.find(item => item == value);
        },
        agregarModulo() {
            if (!this.modulo_elegido) {
                toastr.error("Debe elegir un tipo de modulo");
                return;
            }
            this.form[this.posicion_elegida].push({
                nombre: "",
                tipo: this.modulo_elegido,
                campos: {}
            });
        },
        onClick(value) {
            this.quedarse = value;
        },
        onSubmit() {
            if (this.evento == "crear") {
                this.form
                    .post(route("paginas.store"))
                    .then((window.location.href = route("paginas.index")))
                    .catch(errors => console.log(errors));
            }
            if (this.evento == "editar") {
                this.form
                    .patch(route("paginas.update", this.pagina.slug))
                    .then(response => {
                        if (!this.quedarse) {
                            window.location.href = route("paginas.index");
                        } else {
                            if (this.pagina.titulo != this.form.titulo) {
                                window.location.href = route(
                                    "paginas.edit",
                                    response.slug
                                );
                            }
                            toastr.success("Pagina Guardada!");
                        }
                    })
                    .catch(errors => console.log(errors));
            }
            if (this.evento == "borrar") {
                axios
                    .delete(route("paginas.destroy", this.form.id))
                    .then(response => this.resetModal(response.data.mensaje));
            }
        },
        resetModal(mensaje) {
            $("#paginas")
                .DataTable()
                .draw(false);
            toastr.success(mensaje);
            $("#pagina-modal").modal("hide");
        },
        borrarForm() {
            this.form.id = "";
            this.form.titulo = "";
            this.form.posiciones = [];
        }
    },
    created() {
        this.user = Laravel.user;
    },
    mounted() {
        Event.$on("borrarPagina", id => {
            this.borrarForm();
            this.evento = "borrar";
            this.submit = "Borrar Página";
            this.form.id = id;
        });
        if (this.evento == "editar") {
            this.form.id = this.pagina.id;
            this.form.titulo = this.pagina.titulo;
            this.form.contenido = this.pagina.contenido;
            this.form.encabezado = this.pagina.encabezado
                ? this.pagina.encabezado
                : [];
            this.form.derecha = this.pagina.derecha ? this.pagina.derecha : [];
            this.form.posiciones = this.pagina.posiciones
                ? this.pagina.posiciones
                : [];
        }
    },
    computed: {}
};
</script>
