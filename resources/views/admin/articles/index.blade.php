@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Artigos" >
            <breadcrumb-component v-bind:breadcrumb="{{ $breadcrumb }}"></breadcrumb-component>
            <modal-btn-component name="createArticle" title="Criar" type="button" color="primary"></modal-btn-component>
            <tb-hover-component
                    v-bind:titles="['#','Título', 'Descrição', 'Autor', 'Data']"
                    v-bind:items="{{ $articleList }}"
                    url_create="#criar" url_detail="#detalhe" url_edit="#editar" url_delete="#deletar" token=""
            >
            </tb-hover-component>
        </panel-component>
    </page-component>

    <modal-component name="createArticle">
        <panel-component title="Adicionar">
            <form-component css="" action="#" method="put" enctype="application/x-www-form-urlencoded" token="">

                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="title">Descrição</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Descrição">
                </div>

                <button class="btn btn-info">Adicionar</button>

            </form-component>
        </panel-component>
    </modal-component>
@endsection