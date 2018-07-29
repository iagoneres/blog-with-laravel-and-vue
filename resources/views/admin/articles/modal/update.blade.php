<modal-component name="edit" title="Editar">
        <form-component id="editForm" css="" v-bind:action="'/admin/artigos/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" v-model="$store.state.item.title" id="title" name="title" placeholder="Título">
            </div>
            <div class="form-group">
                <label for="title">Descrição</label>
                <input type="text" class="form-control" v-model="$store.state.item.description" id="description" name="description" placeholder="Descrição">
            </div>
            <div class="form-group">
                <label for="content">Conteúdo</label>
                <textarea class="form-control" id="content" name="content" v-model="$store.state.item.content"></textarea>
            </div>

        </form-component>

        <span slot="buttons">
            <button form="editForm" class="btn btn-info">Salvar</button>
        </span>
</modal-component>