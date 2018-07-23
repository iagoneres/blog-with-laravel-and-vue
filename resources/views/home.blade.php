@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Painel de Controle" >
            <breadcrumb-component v-bind:breadcrumb="{{$breadcrumb}}"></breadcrumb-component>
            <div class="row">
                <div class="col-md-4">
                    <box-component title="Usuários" value="150" url="" color="#3182bd" icon="ion-person-stalker">
                    </box-component>
                </div>
                <div class="col-md-4">
                    <box-component title="Artigos" value="150" url="{{route('artigos.index')}}" color="#fdae6b" icon="ion-ios-copy-outline">
                    </box-component>
                </div>
                <div class="col-md-4">
                    <box-component title="Erros" value="2" url="" color="#de2d26" icon="ion-bug">
                    </box-component>
                </div>
            </div>
        </panel-component>
    </page-component>
@endsection
