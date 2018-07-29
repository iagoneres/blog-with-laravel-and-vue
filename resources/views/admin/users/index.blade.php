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

        <panel-component title="Usuarios" >

            <breadcrumb-component v-bind:breadcrumb="{{ $breadcrumb }}"></breadcrumb-component>

            <tb-hover-component
                    v-bind:titles="['#','Nome', 'Email', 'Criado', 'Atualizado']"
                    v-bind:items="{{ json_encode($users) }}"
                    url_create="#criar" url_detail="/admin/usuarios/" url_edit="/admin/usuarios/" url_delete="/admin/usuarios/" token="{{ csrf_token() }}"
                    modal="true"
            >
            </tb-hover-component>
            <div align="center">
                {{ $users }}
            </div>

        </panel-component>
    </page-component>

    @include('admin.users.modal.create')
    @include('admin.users.modal.update')
    @include('admin.users.modal.show')
@endsection