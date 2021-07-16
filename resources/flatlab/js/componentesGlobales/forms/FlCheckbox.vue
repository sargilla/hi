<template>
    <div class="checkboxes">
        <label class="label_check" :class="value ? 'c_on' : 'c_off'" :id="nombre" :name="nombre">
            <input type="checkbox"  @change="$emit('input', $event.target.checked)"><slot></slot>
        </label>
    </div>
</template>
<script>
    export default {
        props: ['value','label','nombre']
    }
</script>
