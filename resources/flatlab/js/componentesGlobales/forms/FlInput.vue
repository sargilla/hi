<template>
    <div class="form-group row" :class="{ 'has-error': isInvalid }" v-if="tipo == 'textarea'">
        <label :for="nombre" class="col-form-label" :class="[modal ? 'col-md-3':'col-md-2']" >{{ nombre | capitalize }}</label>
        <div :class="[modal ? 'col-md-9':'col-md-10']">
            <textarea :name="nombre" :type="tipo" class="form-control" :value="value" @input="$emit('input', $event.target.value)" :class="{ 'is-invalid': isInvalid }" rows="5" cols="50"/>
            <p class="invalid-feedback" v-if="isInvalid" v-text="error"></p>
        </div>
    </div>

    <div class="form-group row" :class="{ 'has-error': isInvalid }" v-else>
        <label :for="nombre" class="col-form-label" :class="[modal ? 'col-md-3':'col-md-2']" >{{ label || nombre | capitalize }}</label>
        <div :class="[modal ? 'col-md-9':'col-md-10']">
            <input :name="nombre" :type="tipo" class="form-control" :value="value" @change="$emit('input', $event.target.value)" :class="{ 'is-invalid': isInvalid }" :placeholder="placeholder">
            <p class="invalid-feedback" v-if="isInvalid" v-text="error"></p>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            value: {},
            modal: {type:Boolean,default: false},
            tipo: {type: String,default: 'text'},
            nombre: {type: String},
            label: {type: String,default: null},
            isInvalid: {type: Boolean,default: false},
            error: {type: String,default: ''},
            placeholder: {type: String,default: ''}
        },
        filters: {
            capitalize: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.toLowerCase().split(' ').map((s) => s.charAt(0).toUpperCase() + s.substring(1)).join(' ')
            }
        }
    }
</script>

<style scoped>

</style>
