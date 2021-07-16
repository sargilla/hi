<template>
    <div class="form-group row">
        <label :for="nombre"  :class="[modal ? 'col-md-3':'col-md-2']">{{  nombre | capitalize }}</label>
        <div :class="[ modal ? 'col-md-9':'col-md-10']">
            <multiselect :value="value" @input="cambio"
                :label="label"
                :class="{ 'is-invalid': isInvalid }"
                :options="options"
                :show-labels="true"
                :placeholder="placeholder"
                :deselect-label="deselectLabel"
                :select-label="selectLabel"
                :searchable="searchable"
                :taggable="taggable"
                :multiple="multiple"
                :close-on-select="closeOnSelect">
                <span slot="noResult">No encontramos lo que buscás</span>
            </multiselect>
            <label class="invalid-feedback" :style="{'display' : isInvalid ? 'inline-block':'none'}" v-text="error"></label>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            value: {},
            modal: {type:Boolean,default: false},
            options: {type: Array, default: () => []},
            error: {type: String, default: ''},
            isInvalid: {type: Boolean, default: false},
            nombre: String,
            label: {type:String, default: 'label'},
            searchable: {type:Boolean, default: false },
            taggable: {type:Boolean, default: false },
            multiple: {type:Boolean, default: false },
            closeOnSelect: {type:Boolean, default: true },
            tagPlaceholder: {type:String,default:"Agregue este tag"},
            placeholder: {type:String,default:'Elija un elemento'}
        },
        data() {
            return {

                deselectLabel: 'Enter para eliminar',
                selectLabel: 'Enter para seleccionar',
            }
        },
        filters: {
            capitalize: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.toLowerCase().split(' ').map((s) => s.charAt(0).toUpperCase() + s.substring(1)).join(' ')
                // return value.charAt(0).toUpperCase() + value.slice(1)
            }
        },
        methods: {
            cambio(value) {
                this.$emit('input',value)
            }
        },
    }
</script>

<style scoped>

</style>
