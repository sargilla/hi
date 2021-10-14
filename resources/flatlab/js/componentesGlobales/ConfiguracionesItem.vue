<template>
    <ul>
        <header class="card-header d-flex justify-content-between">
            {{ form.nombre }}
            <span class="btn btn-success btn-xs"  @click.prevent="$modal.show(`crearItem${propiedad.id}`)"><i class="fas fa-plus"></i> Item</span>
        </header>
        <li class="list-group-item d-flex justify-content-between align-items-center" v-for="(item,index) in form.contenido" :key="index">
            <span class="mr-3">{{ item.nombre}}</span>
            <toggle-button v-if="item.tipo == 'checkbox'" v-model="item.valor" />
            <editor tipo="basico" v-else-if="item.tipo == 'textarea'" :contenido.sync="item.valor" />
            <input v-else  v-model="item.valor" :type="item.tipo" class="form-control" >
        </li>
        <modal :name="`crearItem${propiedad.id}`" height="auto" :classes="['modal-content']">
            <div class="modal-header mb-4">
                <h5 class="modal-title">Crear Item</h5>
                <button type="button" class="close" @click="$modal.hide(`crearItem${propiedad.id}`)">×</button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group row">
                    <label for="item_tipo" class="col-sm-3 col-form-label">Tipo Item</label>
                    <div class="col-sm-9">
                        <select v-model="itemNuevo.tipo" class="form-control">
                            <option value="checkbox">Checkbox</option>
                            <option value="text">Texto</option>
                            <option value="textarea">TextArea</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="item" class="col-sm-3 col-form-label">Nombre Item</label>
                    <div class="col-sm-9">
                        <input v-model="itemNuevo.nombre" type="text" class="form-control" placeholder="Nombre del Item">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="item_valor" class="col-sm-3 col-form-label">Valor Item</label>
                    <div class="col-sm-9">
                        <toggle-button v-if="itemNuevo.tipo == 'checkbox'" v-model="itemNuevo.valor" />
                        <editor tipo="basico" v-else-if="itemNuevo.tipo == 'textarea'" :contenido.sync="itemNuevo.valor"/>
                        <input v-else v-model="itemNuevo.valor" class="form-control" placeholder="Valor del Item">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" @click="$modal.hide(`crearItem${propiedad.id}`)">Cerrar</button>
                <button class="btn btn-success" type="submit" @click="agregarItem">Crear Item</button>
            </div>
        </modal>
    </ul>
</template>
<script>
    export default {
        props:['propiedad'],
        data() {
            return {
                form: new Form({
                    contenido: this.propiedad.contenido,
                    id: this.propiedad.id,
                    nombre: this.propiedad.nombre,
                    tipo: this.propiedad.tipo
                }),
               itemNuevo: {}
            }
        },
        methods: {
            agregarItem() {
                if(this.itemNuevo.tipo == 'checkbox'){
                    this.itemNuevo.valor = Boolean(this.itemNuevo.valor)
                }
                if(this.form.contenido){
                    this.form.contenido.push(this.itemNuevo)
                } else {
                    this.form.contenido = [this.itemNuevo]
                }
                this.$modal.hide(`crearItem${this.propiedad.id}`)
                this.itemNuevo = {}
            },
            actualizarPropiedad(){
                this.form.patch(route('configuraciones.update', this.form.id))
					.then(response => toastr.success(response))
					.catch(errors => console.log(errors));
            }
        },
        watch: {
            form: {
                handler: function () {
                   this.debounceActualizar()
	            },
                deep: true
            }
        },
        created: function () {
            this.debounceActualizar = _.debounce(this.actualizarPropiedad, 500)
        },
    }
</script>
