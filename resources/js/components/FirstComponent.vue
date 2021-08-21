<template>
    <div>first component, {{ greeting }}</div>
    <div>Foo: {{ foo }}</div>
</template>

<script>
import { ref } from 'vue'
export default {
    props: ['foo'],
    setup() {
        const greeting = ref('hello here')

        return {
            greeting
        }
    }
}
</script>

<style>

</style>
