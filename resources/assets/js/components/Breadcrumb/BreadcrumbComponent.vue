<template>
    <ol class="breadcrumb">
        <li v-for="item in breadcrumb">
            <a v-if="item.url" v-bind:href="item.url">{{ item.title }}</a>
            <span v-else class="active">{{ item.title }}</span>
        </li>
    </ol>
</template>

<script>
    export default {
        props: ['breadcrumb'],
    }
</script>
