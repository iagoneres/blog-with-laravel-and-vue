<modal-component name="editArticle" title="Editar">
        <form-component css="" action="#" method="put" enctype="application/x-www-form-urlencoded" token="">

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" v-model="$store.state.item.title" id="title" name="title" placeholder="Título">
            </div>
            <div class="form-group">
                <label for="title">Descrição</label>
                <input type="text" class="form-control" v-model="$store.state.item.description" id="description" name="description" placeholder="Descrição">
            </div>

        </form-component>

        <span slot="buttons">
            <button form="createForm" class="btn btn-info">Salvar</button>
        </span>
</modal-component>