<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span v-if="user.can['paginas-dragmodulos']"
                ><i class="fas fa-arrows-alt my-handle"></i>
            </span>
            {{ nombre }} [Modulo con Titulo, Texto y Link]
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
                <label for="nombre" class="col-md-2 col-form-label"
                    >Nombre del modulo</label
                >
                <div class="col-md-10">
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control"
                        :value="nombre"
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
                <label for="texto" class="col-md-2 col-form-label">Texto</label>
                <div class="col-md-10">
                    <editor
                        id="texto"
                        @blur="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                        :contenido.sync="campos.texto"
                        tipo="basico"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label for="texto_link" class="col-md-2 col-form-label"
                    >Texto Link</label
                >
                <div class="col-md-10">
                    <input
                        name="texto_link"
                        class="form-control"
                        :value="campos.texto_link"
                        @blur="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                        placeholder="Texto Link"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label for="link" class="col-md-2 col-form-label">Link</label>
                <div class="col-md-10">
                    <input
                        name="link"
                        class="form-control"
                        :value="campos.link"
                        @blur="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                        placeholder="Link"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 my-auto">Destino</label>
                <div class="col-md-10">
                    <select class="form-control" v-model="campos.target">
                        <option value="">Misma Ventana</option>
                        <option value="_blank">Ventana Nueva</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="link" class="col-md-2 col-form-label"
                    >Descripción del Link</label
                >
                <div class="col-md-10">
                    <input
                        name="link_description"
                        class="form-control"
                        :value="campos.link_description"
                        @blur="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                        placeholder="Descripción del Link"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props: ["id", "nombre", "campos"],
    data() {
        return {
            user: null
        };
    },
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
    mounted() {
        let campos = this.campos;
        if (!campos.target) {
            campos.target = "";
        }
        this.$emit("update:campos", campos);
    }
};
</script>
