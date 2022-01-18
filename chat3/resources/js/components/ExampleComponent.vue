<template>
    <div >
        <h1>1</h1>
        <p>{{ userId }}</p>
    </div>
</template>

<script>
    export default {
        props: ["userId", "username1", "email", "password"],
    
        mounted() {
            window.Echo.channel('test')
                .listen('PublicChat', (e) => {
                    console.log(e);
                });
        }
    }
</script>
