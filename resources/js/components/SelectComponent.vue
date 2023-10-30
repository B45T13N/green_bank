
<template>
    <v-col
        cols="12"
        class="pa-0"
        v-if="isShown"
    >
        <v-select
            :class="className"
            :label="label"
            :items="items"
            v-model="selectedValue"
            variant="solo"
            @update:modelValue="handleChange"
        ></v-select>
    </v-col>
</template>

<script>

    export default {
        props: ['items', 'label', 'isShown', 'selectType'],
        data(){
            return {
                selectedValue: null,
                className: 'invalid',
            }
        },
        beforeMount() {
            let currentValue = localStorage.getItem(this.selectType);
            if(currentValue !== '' && currentValue !== null) {
                this.handleChange(currentValue);
            }
        },
        methods: {
            handleChange(value){
                this.selectedValue = value;
                localStorage.setItem(this.selectType, this.selectedValue);
                this.className = 'valid';
                this.$emit('inputChange');
            }
        }

    }
</script>

<style scoped>

</style>
