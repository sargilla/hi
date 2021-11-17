<template>
    <section class="card border border-primary">
        <header class="card-header bg-primary">
            <span v-if="user.can['paginas-dragmodulos']"
                ><i class="fa fa-arrows-alt my-handle"></i>
            </span>
            {{ nombre }} [Modulo con Titulo, Texto y Video]
            <span class="tools pull-right">
                <a
                    class="fa fa-chevron-up accordion-toggle"
                    @click="toggle($event.target)"
                    data-toggle="collapse"
                    :href="id_modulo_shooter"
                >
                </a>
                <a
                    @click="borrar"
                    class="fa fa-times"
                    title="Quitar este modulo"
                    href="javascript:;"
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
                <label for="video" class="col-md-2 col-form-label">Video</label>
                <div class="col-md-10">
                    <div v-if="campos.video" class="col-md-12 row">
                        <div
                            class="col-md-6 d-flex flex-column align-items-center"
                        >
                            <video
                                ref="video"
                                class="video-js vjs-fill vjs-fluid"
                                controls
                                preload="auto"
                                :poster="poster"
                            >
                                <source
                                    :src="
                                        `/storage/paginas/videos/${campos.video}`
                                    "
                                    type="video/mp4"
                                />
                            </video>

                            <button
                                class="btn btn-primary btn-xs my-3"
                                @click="borrarVideo"
                            >
                                Cambiar Video
                            </button>
                        </div>
                        <div class="col-md-6 mb-2 text-center">
                            <img
                                :src="poster"
                                alt="Imagen de portada"
                                class="img-fluid rounded-3"
                            />

                            <p class="mb-2">
                                Pause el video en el lugar deseado para capurar
                                la imagen de portada
                            </p>
                            <button
                                class="btn btn-primary"
                                @click.prevent="capturarImagen"
                            >
                                Capturar Imagen de portada
                            </button>
                            <!-- o
                    <button class="btn btn-primary">Cargar una imagen</button> -->
                        </div>
                    </div>
                    <div
                        v-else
                        @dragenter.prevent
                        @dragover.prevent
                        @drop.prevent="handleFile"
                        class="bg-light pointer col-md-6 p-3"
                    >
                        <div
                            class="row align-items-center justify-content-center flex-column"
                            v-show="!cargandoVideo"
                        >
                            <!-- <p class="text-dark bold mt-3">
                                Arrastrá y soltá el archivo que querés subir
                            </p> -->
                            <span class="btn btn-primary my-4"
                                >Elegí un archivo de video</span
                            >
                            <input
                                ref="dropzoneFile"
                                class="drop-input absolute-top"
                                type="file"
                                name="video"
                                id="video"
                                @change="handleFile"
                            />
                        </div>
                        <div v-show="cargandoVideo" class="text-center">
                            <h5>
                                Estamos subiendo el video
                            </h5>
                            <i class="fas fa-spinner fa-spin fa-lg"></i>
                            <div class="col-12 col-md-8 col-lg-6 my-2 mx-auto">
                                <p class="mb-0 text-center">
                                    {{ uploadProgress }}%
                                </p>
                                <div class="bg-white p-2">
                                    <div
                                        class="bg-success p-3 btn btn-block"
                                        :style="{ width: `${uploadProgress}%` }"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="video_alt" class="col-md-2 col-form-label"
                    >Descripción del video</label
                >
                <div class="col-md-10">
                    <input
                        name="video_alt"
                        class="form-control"
                        :value="campos.video_alt"
                        @blur="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                        placeholder="Alt del video"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label for="transcripcion_link" class="col-md-2 col-form-label"
                    >Link a transcripción</label
                >
                <div class="col-md-10">
                    <input
                        name="transcripcion_link"
                        class="form-control"
                        :value="campos.transcripcion_link"
                        @blur="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                        placeholder="Link a transcripción"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label for="texto_boton" class="control-label col-lg-2 my-auto"
                    >Texto del Botón</label
                >
                <div class="col-lg-5">
                    <input
                        name="texto_boton"
                        class="form-control"
                        type="text"
                        :value="campos.texto_boton"
                        @change="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                        placeholder="Texto del Boton"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label for="link_boton" class="control-label col-lg-2 my-auto"
                    >Link del Botón</label
                >
                <div class="col-lg-5">
                    <input
                        name="link_boton"
                        class="form-control"
                        type="text"
                        :value="campos.link_boton"
                        @change="
                            cambiaCampo($event.target.name, $event.target.value)
                        "
                        placeholder="Link del Boton"
                    />
                </div>
            </div>
        </div>
        <canvas ref="canvas" class="d-none"></canvas>
    </section>
</template>
<script>
export default {
    data() {
        return {
            user: null,
            urlSubir: "/uploadVideo",
            urlSubirImagen: route("uploadArchivoPagina"),
            cargandoVideo: false,
            uploadProgress: 0,
            image: ""
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
        toggle(event) {
            event.classList.toggle("fa-chevron-up");
            event.classList.toggle("fa-chevron-down");
        },
        handleFile(e) {
            this.cargandoVideo = true;
            let inputFile =
                e.target.files ||
                e.dataTransfer.files ||
                this.$refs.dropzoneFile.files;
            console.log(this.$refs.dropzoneFile.files);
            if (inputFile.length == 1) {
                // console.log(inputFile[0]);
                this.uploadFile(inputFile[0]);
            } else {
                toastr.warning("Solo puede subir un video a la vez!");
            }
        },
        uploadFile(file) {
            let data = new FormData();
            data.append("archivo", file);
            axios
                .post(this.urlSubir, data, {
                    onUploadProgress: progressEvent => {
                        const total = progressEvent.total;
                        const totalLength = progressEvent.lengthComputable
                            ? total
                            : null;
                        if (totalLength !== null) {
                            this.uploadProgress = parseInt(
                                Math.round(progressEvent.loaded * 100) / total
                            );
                        }
                    }
                })
                .then(response => {
                    this.cargandoVideo = false;
                    this.cambiaCampo("video", response.data.archivo);
                    toastr.success(response.data.mensaje);
                })
                .catch(e => {
                    this.cargandoVideo = false;
                    toastr.error(e.response.data.errors.archivo[0]);
                });
        },
        capturarImagen() {
            let video = this.$refs.video;
            let canvas = this.$refs.canvas;
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas
                .getContext("2d")
                .drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
            this.image = canvas.toDataURL("image/jpeg");
            // console.log(canvas, this.image);
            this.uploadPoster();
        },
        uploadPoster() {
            let data = new FormData();
            console.log(this.image, this.dataURItoBlob(this.image));
            data.append("archivo", this.dataURItoBlob(this.image));
            axios
                .post(this.urlSubirImagen, data)
                .then(response => {
                    this.cambiaCampo("poster", response.data.archivo);
                    toastr.success(response.data.mensaje);
                })
                .catch(e => {
                    toastr.error(e.response.data.errors.archivo[0]);
                });
        },
        dataURItoBlob(dataURI) {
            // convert base64/URLEncoded data component to raw binary data held in a string
            var byteString;
            if (dataURI.split(",")[0].indexOf("base64") >= 0)
                byteString = atob(dataURI.split(",")[1]);
            else byteString = unescape(dataURI.split(",")[1]);
            var mimeString = dataURI
                .split(",")[0]
                .split(":")[1]
                .split(";")[0];
            var ia = new Uint8Array(byteString.length);
            for (var i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }
            return new Blob([ia], { type: mimeString });
        },
        borrarVideo() {
            this.cambiaCampo("video", "");
            this.cambiaCampo("poster", "");
        }
    },
    computed: {
        id_modulo: function() {
            return "modulo" + this.id;
        },
        id_modulo_shooter: function() {
            return "#modulo" + this.id;
        },
        poster: function() {
            return this.campos.poster
                ? `/images/mini-poster/${this.campos.poster}`
                : "http://via.placeholder.com/350x200?text=poster";
        }
    },
    created() {
        this.user = Laravel.user;
    },
    mounted() {
        let campos = this.campos;
        if (!campos.poster) {
            campos.poster = "";
        }
        if (!campos.video) {
            campos.video = "";
        }
        this.$emit("update:campos", campos);
    }
};
</script>
<style scoped>
.drop-input {
    opacity: 0;
    width: 100%;
    cursor: pointer;
    z-index: 9999;
}
</style>
