<modal-component name="create" title="Adicionar">
    <form-component id="createForm" css="" action="{{route('usuarios.index')}}" method="post" enctype="" token="{{ csrf_token() }}">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Email">
        </div>
    </form-component>

    <span slot="buttons">
        <button form="createForm" class="btn btn-info">Adicionar</button>
    </span>
</modal-component>