
<div class="row">
    <div class="col">
        <div id="gridUsuario" class="w-100 pb-0 mb-0" style="height: {{config('gui_vars.grid_height')}}"></div>
    </div>
</div>
<script>
    $(document).ready(function () {
            $().w2destroy("gridUsuario");
            $('#gridUsuario').w2grid({
                name: 'gridUsuario',
                header: 'Gerenciamento de Usuários',
                msgRefresh: 'Atualizando...',
                multiSelect : false,
                recid:'id',
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
                    { field: 'nome_usuario', caption: 'Nome', size: '300px', sortable: true, attr: 'align=center', type: 'text' },
                    { field: 'email', caption: 'Email', size: '300px', sortable: true, attr: 'align=center', type: 'text' },
                    { field: 'cpf', caption: 'CPF', size: '300px', sortable: true, attr: 'align=center', type: 'text' },
                    { field: 'data_nascimento', caption: 'Data nascimento', size: '300px', sortable: true, attr: 'align=center', type: 'text' },
                    { field: 'nome_da_mae', caption: 'Nome mãe', size: '300px', sortable: true, attr: 'align=center', type: 'text' },
                    { field: 'nome_perfil', caption: 'Perfil', size: '300px', sortable: true, resizable: true, type: 'text' },
                    { field: 'ativo_escrito', caption: 'Status', size: '100px', sortable: true, attr: 'align=center',resizable: true, type: 'text' },
                ],
                onAdd: function (event) {
                    var url = '{{route('usuario.AddView')}}';
                    var data = [];
                    getView(url, data);
                },
                onEdit: function (event) {
                        var id = event.recid.toString();
                        var url = "{{route('usuario.EditView', ['%id%'])}}".replace('%id%', id);
                        var data = [];
                        getView(url, data);
                },

                onDelete: function (event) {

                    var id = this.getSelection();
                    event.onComplete = function() {
                        var url = "{{route('usuario.delete', ['%id%'])}}".replace('%id%', id);
                        var data = [];
                        getView(url, data);
                    }

                    //Caso o Evento tenha finalizado, executa a linha abaixo
                    event.done(function () {
                        this.toolbar.disable("btn-view");

                    });
                },

                searches: [
                    { field: 'id', caption: 'ID', type: 'int' },
                    { field: 'nome_usuario', caption: 'Nome', type: 'text' },
                    { field: 'email', caption: 'Email', type: 'text' },
                    { field: 'nome_perfil', caption: 'Nome Pefil', type: 'text' },
                    { field: 'cpf', caption: 'CPF', type: 'text' },
                    { field: 'data_nascimento', caption: 'Data nascimento', type: 'text' },
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

                url: '{{route('usuario.listar')}}',
                toolbar: {
                    items: [
                        { type: 'button', id: 'btn-view', caption: 'Visualizar', icon: 'fa fa-eye', disabled: true},
                        { type: 'spacer' },

                    ],
                    onClick: function (target, data) {


                        if (target == 'btn-view'){
                                var id = w2ui[this.owner.name].getSelection().toString();
                                var url = "{{route('usuario.View', ['%id%'])}}".replace('%id%', id);
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
