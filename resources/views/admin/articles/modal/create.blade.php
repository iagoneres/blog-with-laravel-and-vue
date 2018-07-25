<modal-component name="createArticle" title="Adicionar">
    <form-component id="createForm" css="" action="#" method="put" enctype="application/x-www-form-urlencoded" token="">

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título">
        </div>
        <div class="form-group">
            <label for="title">Descrição</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Descrição">
        </div>
    </form-component>

    <span slot="buttons">
        <button form="createForm" class="btn btn-info">Adicionar</button>
    </span>
</modal-component>