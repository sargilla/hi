<template>
    <div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                Configuraciones
                <span class="tools pull-right">
                    <button
                        class="btn btn-xs btn-primary"
                        @click.prevent="$modal.show('crearModulo')"
                    >
                        <i class="fas fa-plus"></i> Módulo
                    </button>
                </span>
            </div>
        </div>
        <div class="row">
            <div
                v-for="(configuracion, index) in config"
                :key="index"
                class="col-lg-6"
            >
                <section class="card">
                    <header
                        class="card-header alt green-bg d-flex justify-content-between"
                        style="color:#fff"
                    >
                        {{ index }}
                    </header>
                    <configuraciones-item
                        class="list-group"
                        v-for="propiedad in configuracion"
                        :propiedad="propiedad"
                        :key="propiedad.id"
                    />
                </section>
            </div>
        </div>

        <!--  <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModal">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div> -->
        <modal name="crearModulo" height="auto" class="modal-content">
            <form
                class="form-horizontal"
                @submit.prevent="onSubmit"
                @keydown="form.errors.clear($event.target.name)"
            >
                <div class="modal-header">
                    <h5 class="modal-title">Crear configuración</h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Cerrar"
                        @click="$modal.hide('crearModulo')"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- <button type="button" class="close" @click="$modal.hide('crearModulo')">×</button> -->
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="tipo" class="col-sm-3 col-form-label"
                            >Modulo</label
                        >
                        <div class="col-sm-9">
                            <input
                                v-model="form.tipo"
                                type="text"
                                class="form-control"
                                placeholder="Modulo (config(MODULO.PROPIEDAD.))"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-3 col-form-label"
                            >Propiedad</label
                        >
                        <div class="col-sm-9">
                            <input
                                v-model="form.nombre"
                                type="text"
                                class="form-control"
                                placeholder="Propiedad"
                            />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        class="btn btn-default"
                        type="button"
                        @click="$modal.hide('crearModulo')"
                    >
                        Cerrar
                    </button>
                    <button class="btn btn-success" type="submit">Crear</button>
                </div>
            </form>
        </modal>
    </div>
</template>

<script>
import ConfiguracionesItem from "./ConfiguracionesItem.vue";

export default {
    components: { ConfiguracionesItem },
    data() {
        return {
            config: [],
            form: new Form({
                nombre: "",
                tipo: ""
            })
        };
    },
    methods: {
        onSubmit() {
            this.form
                .post(route("configuraciones.store"))
                .then(response => this.reset(response))
                .catch(errors => console.log(errors));
        },
        reset(mensaje) {
            this.form.nombre = "";
            this.form.tipo = "";
            this.form.contenido = "";
            this.getConfig();
            this.$modal.hide("crearModulo");
            toastr.success(mensaje);
        },
        getConfig() {
            axios
                .get(route("getConfiguraciones"))
                .then(response => (this.config = response.data))
                .catch(errors => console.log(errors));
        }
    },
    computed: {
        name() {
            return this.data;
        }
    },
    mounted() {
        this.getConfig();
    },
    watch: {
        data(newValue, oldValue) {}
    }
};
</script>
