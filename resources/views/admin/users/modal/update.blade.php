<modal-component name="edit" title="Editar">
    <form-component id="editForm" css="" v-bind:action="'/admin/usuarios/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">

        <div class="form-group">
            <label for="title">Nome</label>
            <input type="text" class="form-control" v-model="$store.state.item.name" id="name" name="name" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="title">Email</label>
            <input type="email" class="form-control" v-model="$store.state.item.email" id="email" name="email" placeholder="Email">
        </div>

    </form-component>

    <span slot="buttons">
            <button form="editForm" class="btn btn-info">Salvar</button>
        </span>
</modal-component>