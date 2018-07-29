<template>
    <div>

        <div class="form-inline">
            <p>{{ this.$store.state.items }}</p>
            <a v-if="url_create && !modal" v-bind:href="url_create">Criar</a>

            <modal-btn-component v-if="url_create && modal" name="createArticle" title="Criar" type="button" color="primary"></modal-btn-component>

            <div class="form-group pull-right">
                <input class="form-control" type="search" placeholder="Pesquisar" v-model="search">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th v-for="title in titles">{{title}}</th>
                    <th v-if="url_detail || url_edit || url_delete">Ação</th>
                </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in listItems">
                <td v-for="value in item">{{value}}</td>
                <td>
                    <form v-if="url_delete && token" v-bind:id="index" v-bind:action="url_delete + item.id" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" v-bind:value="token">

                        <a v-if="url_detail && !modal" v-bind:href="url_detail" class="btn btn-link">Visualizar</a>
                        <modal-btn-component v-if="url_detail && modal" v-bind:item="item" v-bind:url="url_detail" type="link" name="showArticle" title="Visualizar"></modal-btn-component>

                        <a v-if="url_edit && !modal" v-bind:href="url_edit" class="btn btn-link">Editar</a>
                        <modal-btn-component v-if="url_edit && modal" v-bind:item="item" v-bind:url="url_edit" type="link" name="editArticle" title="Editar"></modal-btn-component>

                        <a v-if="(url_delete && token)" href="#"  v-on:click="submitForm(index)">Deletar</a>

                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['titles', 'items', 'url_create', 'url_detail', 'url_edit', 'url_delete', 'token', 'modal'],
        data: function() {
            return {
                search:''
            }
        },
        methods:{
            submitForm: function(index){
                document.getElementById(index).submit();
            }
        },
        computed: {
            listItems: function() {
                let listItems = this.items.data;
                if (this.search) {
                    return listItems.filter( res => {
                        res = Object.values(res);
                        for (let index = 0; index < res.length; index++) {
                            if ((res[index]+"").toLowerCase().indexOf(this.search.toLowerCase()) >= 0) {
                                return true;
                            }
                        }
                        return false;
                    })
                }

                return listItems;
            }
        }
    }
</script>
