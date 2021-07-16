<template>
    <div>
        <span class="btn btn-primary fileinput-button">
            <i class="fa" :class="iconoBoton"></i>
            <span v-text="texto_boton"></span>
            <input name="documento" type="file" @change="onFileChange"  class="form-control" :disabled="cargando">
        </span>
    </div>
</template>
<script>
    export default {
        props: ['url','documento'],
        data() {
            return {
                nombre_original:'',
                archivo:'',
                formData: {},
                cargando: false,
                texto_boton: ''
            }
        },
        methods: {
            onFileChange(e) {
                this.texto_boton = "Cargando... "
                this.cargando = true

                if(this.documento){
                    this.borrar(this.documento)
                }
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createDocumento(files[0])
                this.nombre_original = files[0].name
            },
            createDocumento(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    //vm.documento = e.target.result
                    vm.archivo = file
                    this.upload()
                };
                reader.readAsText(file);
            },
            upload(){

                this.formData = new FormData();
                this.formData.append('nombre', this.nombre_original);
                this.formData.append('archivo', this.archivo);
                axios.post(this.url,this.formData)
                    .then(response => {
                   //     toastr.success(response.data.mensaje)
                        this.cargando = false
                        this.texto_boton = "Cargado"
                        this.$emit('update:documento', response.data.archivo)
                        this.$emit('update', this.nombre_original.split('.').slice(0, -1).join('.'))
                	})
              		.catch(error => {
                        //  console.log(error.response.data.errors.archivo[0])
                        toastr.error(error.response.data.errors.archivo[0])
                          this.cargando = false
                            this.texto_boton = "Error - Vuelva a cargar"
              		});
            },
            borrar(file){
                axios.post(this.url + '/delete', {nombre: file})
                    .then(response => {
                        console.log(response.data)
                	})
              		.catch(error => {
                         console.log(error.response.data.errors.archivo[0])
                      //  toastr.error(error.response.data.errors.archivo[0])
              			this.cargando = false
              		});
            },

        },
        computed: {
            iconoBoton()  {
                return {
                    'fa-spinner fa-spin': this.cargando,
                    'fa-plus': this.archivo === '' && this.documento === '',
                    'fa-file' : this.documento !== '' && ! this.cargando,
                }
            }
        },
        mounted () {

            this.texto_boton = this.documento ? 'Cambiar Archivo' : 'Elegir Archivo';
        },

    }
</script>
