@extends('layouts.app')

@section('content')
    <page-component size="12">

        @if($errors->all())
            @foreach($errors->all() as $key => $value)
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Atenção!</strong> {{ $value }}.
                </div>
            @endforeach
        @endif

        <panel-component title="Artigos" >

            <breadcrumb-component v-bind:breadcrumb="{{ $breadcrumb }}"></breadcrumb-component>

            <tb-hover-component
                    v-bind:titles="['#','Título', 'Descrição', 'Conteúdo', 'Autor', 'Criado', 'Atualizado']"
                    v-bind:items="{{ $articleList }}"
                    url_create="#criar" url_detail="#detalhe" url_edit="#editar" url_delete="#deletar" token="131313"
                    modal="true"
            >
            </tb-hover-component>
        </panel-component>
    </page-component>

    @include('admin.articles.modal.create')
    @include('admin.articles.modal.update')
    @include('admin.articles.modal.show')
@endsection