<template>
    <div>
        <div class="form-inline">
            <a v-if="url_create" v-bind:href="url_create">Criar</a>
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
                    <form v-if="url_delete && token" v-bind:id="index" v-bind:action="url_delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" v-bind:value="token">
                    </form>
                    <a v-bind:href="url_detail" class="btn btn-link">Visualizar</a>
                    <a v-bind:href="url_edit" class="btn btn-link">Editar</a>
                    <a v-if="(url_delete && !token)" v-bind:href="url_delete" class="btn btn-link">Deletar</a>
                    <button v-if="url_delete && token" type="submit" class="btn btn-link" v-bind:form="index">Deletar</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['titles', 'items', 'url_create', 'url_detail', 'url_edit', 'url_delete', 'token'],
        data: function() {
            return {
                search:''
            }
        },
        computed: {
            listItems: function() {
                if (this.search) {
                    return this.items.filter( res => {
                        for (let index = 0; index < res.length; index++) {
                            if ((res[index]+"").toLowerCase().indexOf(this.search.toLowerCase()) >= 0) {
                                return true;
                            }
                        }
                        return false;
                    })
                }

                return this.items;
            }
        }
    }
</script>
