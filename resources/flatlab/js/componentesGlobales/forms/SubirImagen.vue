/* TEMPLATE
<div
    class="form-group"
    :class="{ 'has-error': form.errors.has('imagenes.archivo') }"
>
        <label for="texto" class="control-label col-lg-2" >Imagenes</label>
        <div class="col-lg-10">
            <subir-imagen v-for="(item,index) in form.imagenes"
                :key="index"
                :urlSubir="urlSubir"
                :urlBorrar="urlBorrar"
                :imagen.sync="item.archivo"
                :puedoBorrar="puedoBorrarImagen"
                @borrar="borrarImagen(index)"
                @update="guardarCambios" />
            <div class="col-md-1 ">
                <button class="btn btn-default" @click.prevent="agregarImagen">Agregar otra imagen</button>
            </div>
        </div>
    </div>
DATA data() { return { urlSubir: route('uploadImagenProducto'), urlBorrar:
route('borrarImagenProducto'), } } METHODS agregarImagen (){
this.form.imagenes.push({archivo:''}) }, borrarImagen(index){
this.form.imagenes.splice(index, 1) }, COMPUTED computed: { puedoBorrarImagen()
{ return this.form.imagenes.length > 1 } }, */
<template>
    <div class="d-flex flex-column">
        <div class="thumbnail" v-if="image">
            <img :src="image" :alt="imagen" width="100%" />
        </div>
        <div class="thumbnail" v-else>
            <img
                src="http://via.placeholder.com/250x250?text=Imagen"
                width="100%"
                alt=""
            />
        </div>
        <div class="form-group" v-if="activar_creditos">
            <input
                type="text"
                class="form-control"
                v-model="creditos_data"
                placeholder="Creditos"
            />
        </div>
        <div class="form-group" v-if="activar_alt">
            <input
                type="text"
                class="form-control"
                v-model="alt_data"
                placeholder="Texto Alt"
            />
        </div>
        <div class="d-flex justify-content-between mt-1">
            <span class="btn btn-warning btn-xs" v-if="cargando"
                ><i class="fa fa-refresh fa-spin"></i> Cargando</span
            >
            <span
                class="btn btn-success btn-xs btn-file fileinput-button"
                v-else
            >
                <span v-if="imagen"><i class="fas fa-undo"></i> Cambiar</span>
                <span v-else><i class="fas fa-upload"></i> Cargar</span>
                <input
                    class="form-control"
                    type="file"
                    @change="onFileChange"
                />
            </span>
            <button class="btn btn-danger btn-xs" @click.prevent="borrar()">
                <i class="fa fa-times"></i> Borrar
            </button>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        imagen: {},
        urlSubir: {},
        urlBorrar: {},
        puedoBorrar: {},
        creditos: { default: "" },
        alt: { default: "" },
        activar_alt: { default: false },
        activar_creditos: { default: false }
    },
    data() {
        return {
            image: "",
            nombre: "",
            creditos_data: "",
            alt_data: "",
            cargando: false
        };
    },
    methods: {
        onFileChange(e) {
            this.cargando = true;
            if (this.imagen) {
                this.borrar(this.imagen);
            }
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.createImage(files[0]);
            this.nombre = files[0].name;
        },
        createImage(file) {
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = e => {
                this.image = e.target.result;
                this.upload(file);
            };
        },
        upload(file) {
            let data = new FormData();
            data.append("nombre", this.nombre);
            data.append("archivo", file);
            axios
                .post(this.urlSubir, data)
                .then(response => {
                    this.$emit("update:imagen", response.data.archivo);
                    toastr.success(response.data.mensaje);
                    this.cargando = false;
                })
                .catch(e => {
                    toastr.error(e.response.data.mensaje);
                });
        },
        borrar(imagenVieja) {
            if (this.puedoBorrar || imagenVieja) {
                axios
                    .post(this.urlBorrar, { nombre: this.imagen })
                    .then(response => {
                        if (imagenVieja) {
                            toastr.warning(
                                "Se borró la imagen anterior correctamente"
                            );
                        } else {
                            toastr.warning("Se borró la imagen correctamente");
                        }
                        this.$emit("update");
                    })
                    .catch(response => {
                        toastr.warning(
                            "No se encontró la imagen por lo tanto se borro de la base de datos"
                        );
                    });
                if (!imagenVieja) {
                    this.$emit("borrar");
                }
            } else {
                toastr.error(
                    "Debe quedar al menos una imagen para el producto"
                );
            }
        }
    },
    mounted() {
        if (this.imagen) {
            this.image = "/images/subir-imagen/" + this.imagen;
        }
        if (this.alt) {
            this.alt_data = this.alt;
        }
        if (this.creditos) {
            this.creditos_data = this.creditos;
        }
    },
    watch: {
        imagen: function(data) {
            this.image = "/images/subir-imagen/" + data;
        },
        creditos_data: function(data) {
            this.$emit("update:creditos", data);
        },
        alt_data: function(data) {
            this.$emit("update:alt", data);
        }
    }
};
</script>
<style>
.flex {
    display: flex;
}
.column {
    flex-direction: column;
    max-width: 200px;
    margin-bottom: 20px;
}
.between {
    justify-content: space-between;
}
</style>
