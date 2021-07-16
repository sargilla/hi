<template>
    <div>
        <input :id="nombre" :name="nombre" type="checkbox" :value="value" @change="$emit('input', $event.target.checked)" :checked="value">
        <div class="btn-group checkboxes">
            <label :for="nombre" class="btn btn-primary">
                <span class="fas fa-check" v-if="value"></span>
                <span class="fas fa-times" v-if="!value"></span>
            </label>
            <label :for="nombre" class="btn btn-primary" v-text="label"/>
        </div>
    </div>
</template>
<script>
export default {
    props: ['value','label','nombre']
};
</script>
