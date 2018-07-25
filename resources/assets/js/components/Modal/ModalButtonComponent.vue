<template>
    <span>
        <span v-if="item">
          <button v-on:click="fillForm()" v-if="!type || (type !== 'button' && type !== 'link')" type="button" v-bind:class="defineClass" data-toggle="modal" v-bind:data-target="'#' + name">{{ title }}</button>
          <button v-on:click="fillForm()" v-if="type === 'button'" type="button" v-bind:class="defineClass" data-toggle="modal" v-bind:data-target="'#' + name">{{ title }}</button>
          <a v-on:click="fillForm()" v-if="type === 'link'" href="#" v-bind:class="" data-toggle="modal" v-bind:data-target="'#' + name">{{ title }}</a>
        </span>

        <span v-else>
          <button v-if="!type || (type !== 'button' && type !== 'link')" type="button" v-bind:class="defineClass" data-toggle="modal" v-bind:data-target="'#' + name">{{ title }}</button>
          <button v-if="type === 'button'" type="button" v-bind:class="defineClass" data-toggle="modal" v-bind:data-target="'#' + name">{{ title }}</button>
          <a v-if="type === 'link'" href="#" v-bind:class="" data-toggle="modal" v-bind:data-target="'#' + name">{{ title }}</a>
        </span>

    </span>
</template>

<script>
    export default {
        props: ['name', 'type', 'title', 'color', 'item'],
        methods: {
            fillForm: function() {
                this.$store.commit('setItem', this.item);
            }
        },
        computed: {
            defineClass: function () {
                return "btn btn-" + (this.color || "default");
            }
        },
    }
</script>
