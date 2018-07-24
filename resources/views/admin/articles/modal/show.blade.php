<modal-component name="showArticle">
    <panel-component v-bind:title="$store.state.item.title">
        <p>@{{ $store.state.item.description }}</p>
    </panel-component>
</modal-component>