<template>
    <router-view/>
</template>

<script>
export default {
    name: 'app',
    watch: {
        $route: {
            immediate: true,
            handler(to, from) {
                document.title = to.meta.title || 'Some Default Title';
            }
        },
    }
}
</script>
