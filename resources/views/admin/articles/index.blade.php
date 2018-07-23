@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Artigos" >
            <breadcrumb-component v-bind:breadcrumb="{{ $breadcrumb }}"></breadcrumb-component>
            <modal-btn-component name="createArticle" title="Criar" type="button" color="primary"></modal-btn-component>
            <tb-hover-component
                    v-bind:titles="['#','Título', 'Descrição', 'Autor', 'Data']"
                    v-bind:items="[['1', 'Como criar um blog em Laravel', 'Postagem descrevendo como criar um blog', 'Iago Neres', '21/07/2018']]"
                    url_create="#criar" url_detail="#detalhe" url_edit="#editar" url_delete="#deletar" token=""
            >
            </tb-hover-component>
        </panel-component>
    </page-component>

    <modal-component name="createArticle">
        <panel-component title="Adicionar">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Check me out
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </panel-component>
    </modal-component>
@endsection
