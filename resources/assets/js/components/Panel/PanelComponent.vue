<template>
    <div v-bind:class="defineColor">
        <div class="panel-heading">{{ title }}</div>

        <div class="panel-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['title', 'color'],
        computed: {
            defineColor: function () {
                return "panel panel-" + (this.color || "default");
            }
        }
    }
</script>
