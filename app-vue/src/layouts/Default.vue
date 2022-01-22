<template>
    <div class="bg-gray-50 dark:bg-gray-800 text-gray-600">
        <NavBar />
        <RouterView />
    </div>
</template>

<script>
import NavBar from "../components/Navbar";
export default {
    name: "Default",
    components: {
        NavBar
    }
}
</script>

<style scoped>
</style>
