@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Artigos" >

            <breadcrumb-component v-bind:breadcrumb="{{ $breadcrumb }}"></breadcrumb-component>

            <tb-hover-component
                    v-bind:titles="['#','Título', 'Descrição', 'Autor', 'Data']"
                    v-bind:items="{{ $articleList }}"
                    url_create="#criar" url_detail="#detalhe" url_edit="#editar" url_delete="#deletar" token=""
                    modal="true"
            >
            </tb-hover-component>
        </panel-component>
    </page-component>

    @include('admin.articles.modal.create')
    @include('admin.articles.modal.update')
@endsection