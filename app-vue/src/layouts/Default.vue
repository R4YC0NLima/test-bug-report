<template>
    <div>
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
