<div class="row">
    <div class="col">
        <div id="gridMatricula" class="w-100 pb-0 mb-0" style="height: {{config('gui_vars.grid_height')}}"></div>
    </div>
</div>

<script>
    $(document).ready(function () {
            $().w2destroy("gridMatricula");
            $('#gridMatricula').w2grid({
                name: 'gridMatricula',
                header: 'Gerenciamento de Matricula',
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
                    { field: 'nome_usuario', caption: 'Usuario', size: '300px', sortable: true, attr: 'align=center', type: 'text' },
                    { field: 'nome_cargo', caption: 'Cargo', size: '100px', sortable: true, attr: 'align=center',resizable: true, type: 'text' },
                    { field: 'data_admissao', caption: 'Data Admissão', size: '100px', sortable: true, attr: 'align=center',resizable: true, type: 'text' },
                    { field: 'salario_funcionario', caption: 'Salario Funcionario', size: '100px', sortable: true, attr: 'align=center',resizable: true, type: 'int' },
                    { field: 'ativo_escrito', caption: 'Status', size: '100px', sortable: true, attr: 'align=center',resizable: true, type: 'text' },
                ],
                onAdd: function (event) {
                    var url = '{{route('matricula.addView')}}';
                    var data = [];
                    getView(url, data);
                },
                onEdit: function (event) {
                        var id = event.recid.toString();
                        var url = "{{route('matricula.editView', ['%id%'])}}".replace('%id%', id);
                        var data = [];
                        getView(url, data);
                },

                onDelete: function (event) {

                    var id = this.getSelection();
                    event.onComplete = function() {
                        var url = "{{route('matricula.delete', ['%id%'])}}".replace('%id%', id);
                        var data = [];
                        getView(url, data);
                    }

                    //Caso o Evento tenha finalizado, executa a linha abaixo
                    event.done(function () {
                        this.toolbar.disable("btn-view");

                    });
                },

                searches: [
                    { field: 'id', caption: 'ID.', type: 'int' },
                    { field: 'nome_usuario', caption: 'Nome usuario', type: 'text' },
                    { field: 'nome_cargo', caption: 'Nome cargo', type: 'text' },
                    { field: 'data_admissao', caption: 'Data admissao', type: 'text' },
                    { field: 'salario_funcionario', caption: 'Salario funcionario', type: 'int' },

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

                url: '{{route('matricula.listar')}}',
                toolbar: {
                    items: [
                        { type: 'button', id: 'btn-view', caption: 'Visualizar', icon: 'fa fa-eye', disabled: true},
                        { type: 'spacer' },

                    ],
                    onClick: function (target, data) {


                        if (target == 'btn-view'){
                                var id = w2ui[this.owner.name].getSelection().toString();
                                var url = "{{route('matricula.view', ['%id%'])}}".replace('%id%', id);
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