/* 


 */
<template>
    <div class="fileupload">
        <span class="btn btn-white fileinput-button">
            <span  v-if="documento" ><i class="fa fa-undo"></i> Cambiar Documento</span>
            <span v-else><i class="fa fa-cloud-upload"></i> Elegir Documento</span>
            <input type="file" class="default" @change="onFileChange">
        </span>
        <span class="btn btn-danger" v-if="documento" @click="borrar"><i class="fa fa-times"></i> Borrar</span>
        <span style="margin-left:5px;" v-text="nombre"></span>
        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                icono: '',
                nombre:'',
                cargando: false
            }
        },
        props:['documento','urlSubir','urlBorrar','puedoBorrar'],
        methods: {
            onFileChange(e) {            	
                this.cargando = true
                if(this.documento){
                    this.borrar(this.documento)
                }
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createDocumento(files[0])
                this.nombre = files[0].name
            },
            createDocumento(file) {
                let reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = (e) => {
                   // this.documento = e.target.result;
                    this.upload(file)
                };
            },
            upload(file){
                let data = new FormData();
                data.append('nombre', this.nombre);
                data.append('archivo', file);
                axios.post(this.urlSubir , data)
                    .then(response => {
                        this.$emit('update:documento', response.data.archivo)
                        toastr.success('Se subio el documento correctamente')
                        this.cargando = false
                    })
                    .catch(e =>{
                        toastr.error(e.response.data.mensaje)
                    });
            },
            borrar(documentoViejo){
                if(this.puedoBorrar || documentoViejo ){
                    axios.post(this.urlBorrar, {nombre: this.documento})
                    .then(response => {
                        if (documentoViejo){
                            toastr.warning('Se borro el documento anterior correctamente')
                        } else {
                            toastr.warning('Se borro el documento correctamente')
                        }
                        this.$emit('update')
                    }).catch(response => {
                        toastr.warning('No se encontró el documento por lo tanto se borro de la base de datos') 
                        this.$emit('borrar')
                    })
                   
                } else {
                    toastr.error('Debe quedar al menos un documento')
                }
            },
        },
        mounted(){
            if(this.documento){
                this.nombre = this.documento
            }
        }
        // watch: {
        //     documento: function(data){
        //         this.image = '/images/thumbslide/' + data
        //     }
        // }
    }
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
