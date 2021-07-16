<template>
	<div class="col-md-4">
		<div class="flex column">
			<div class="thumbnail" v-if="image">
                <img :src="image" :alt="imagen" width="250" height="250">
            </div>
            <div class="thumbnail" v-else>
                <img src="http://via.placeholder.com/250x250?text=Imagen" alt="">
            </div>
			<div class="flex between">
    			<span  class="btn btn-warning btn-xs" v-if="cargando"><i class="fa fa-refresh fa-spin"></i> Cargando</span>
    			<span class="btn btn-success btn-xs btn-file fileinput-button" v-else>
    				<span v-if="imagen"><i class="fa fa-undo"></i> Cambiar</span>
                    <span v-else ><i class="fa fa-upload"></i> Cargar</span>
    				<input class="form-control" type="file" @change="onFileChange">
    			</span>
                <button class="btn btn-danger btn-xs" @click.prevent="borrar"><i class="fa fa-times"></i> Borrar</button>
			</div>
		</div>
	</div>
</template>
<script>
    export default{
        data(){
            return {
                image: '',
                cargando: false
            }
        },
        props:['imagen'],
        methods: {
            onFileChange(e) {            	
            	this.cargando = true
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0])
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                	this.upload()
                };
                reader.readAsDataURL(file);
            },
            upload(){
                axios.post(route('paginas.upload.imagen'), {image: this.image})
                    .then(response => {
                        this.$emit('update:imagen', response.data.image)
                        toastr.success('Se subio la imagen correctamente')
                        this.cargando = false
                    });
            },
            borrar(){
                //hacer el delete de la imagen
                this.$emit('borrar')
            },
        },
        mounted(){
            if(this.imagen){
                this.image = '/images/thumbslide/' + this.imagen
            }
        },
        watch: {
            imagen: function(data){
                this.image = '/images/thumbslide/' + data
            }
        }
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
