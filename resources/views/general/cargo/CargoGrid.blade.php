<div class="row">
    <div class="col">
        <div id="gridCargo" class="w-100 pb-0 mb-0" style="height: {{config('gui_vars.grid_height')}}"></div>
    </div>
</div>

<script>
    $(document).ready(function () {
            $().w2destroy("gridCargo");
            $('#gridCargo').w2grid({
                name: 'gridCargo',
                header: 'Gerenciamento de Cargos',
                msgRefresh: 'Atualizando...',
                multiSelect : false,
                recid:'idcargo',
                show: {
                    footer: true,
                    toolbar: true,
                    toolbarAdd: true,
                    toolbarDelete: true,
                    toolbarEdit: true,
                    header: true,
                    toolbarColumns: false,
                    searchAll: false,
                    toolbarInput: false
                },
                columns: [
                    { caption: '', size: '20px', attr: 'align=center',info: true},
                    { field: 'recid', caption: 'ID.', size: '100px', sortable: true, attr: 'align=center', type: 'int' },
                    { field: 'nome_cargo', caption: 'Nome cargo', size: '300px', sortable: true, attr: 'align=center', type: 'text' },
                    { field: 'ativo_escrito', caption: 'Status', size: '100px', sortable: true, attr: 'align=center',resizable: true, type: 'text' },
                ],
                onAdd: function (event) {
                    var url = '{{route('cargo.addView')}}';
                    var data = [];
                    getView(url, data);
                },
                onEdit: function (event) {
                        var id = event.recid.toString();
                        var url = "{{route('cargo.editView', ['%id%'])}}".replace('%id%', id);
                        var data = [];
                        getView(url, data);
                },

                onDelete: function (event) {

                    var id = this.getSelection();
                    event.onComplete = function() {
                        var url = "{{route('cargo.delete', ['%id%'])}}".replace('%id%', id);
                        var data = [];
                        getView(url, data);
                    }

                    //Caso o Evento tenha finalizado, executa a linha abaixo
                    event.done(function () {
                        this.toolbar.disable("btn-view");

                    });
                },

                searches: [
                    { field: 'idcargo', caption: 'ID.', type: 'int' },
                    { field: 'nome_cargo', caption: 'Nome cargo', type: 'text' },

                    {
                        field: 'ativo', caption: 'Status', type: 'list',
                        options: {
                            items:
                                [
                                    {id: 'T', text: 'Todos'},
                                    {id: '1|boolean', text: 'Ativo'},
                                    {id: '0|boolean', text: 'Inativo'}
                                ],
                            showNone: false,

                        },

                    },
                ],

                url: '{{route('cargo.listar')}}',
                toolbar: {
                    items: [
                        { type: 'button', id: 'btn-view', caption: 'Visualizar', icon: 'fa fa-eye', disabled: true},
                        { type: 'spacer' },

                    ],
                    onClick: function (target, data) {


                        if (target == 'btn-view'){
                                var id = w2ui[this.owner.name].getSelection().toString();
                                var url = "{{route('cargo.view', ['%id%'])}}".replace('%id%', id);
                                var d = [];
                                getView(url, d);
                        }


                    }
                },
                onSelect: function(event) {
                    this.toolbar.enable("btn-view");

                },
                onUnselect: function(event) {
                    this.toolbar.disable("btn-view");


                }
        });
});
</script>