<template>
    <div>
        <button v-if="type == 'button'" type="button" v-bind:class="defineClass" data-toggle="modal" v-bind:data-target="'#' + name">{{ title }}</button>
        <a v-else href="#" data-toggle="modal" v-bind:data-target="'#' + name">{{ title }}</a>
    </div>
</template>

<script>
    export default {
        props: ['name', 'type', 'title', 'color'],
        computed: {
            defineClass: function () {
                return "btn btn-" + (this.color || "default");
            }
        },
        mounted() {
            console.log(this.color)
        }
    }
</script>
