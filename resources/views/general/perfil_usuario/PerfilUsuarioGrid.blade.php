
<div class="row">
    <div class="col">
        <div id="gridPerfilUsuario" class="w-100 pb-0 mb-0" style="height: {{config('gui_vars.grid_height')}}"></div>
    </div>
</div>
<script>
    $(document).ready(function () {
            $().w2destroy("gridPerfilUsuario");
            $('#gridPerfilUsuario').w2grid({
                name: 'gridPerfilUsuario',
                header: 'Gerenciamento de Perfil de Usuário',
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
                    { field: 'recid', caption: 'Cód.', size: '100px', sortable: true, attr: 'align=center', type: 'int' },
                    { field: 'nome', caption: 'Nome', size: '200px', sortable: true, attr: 'align=center', type: 'text' },
                    { field: 'descricao', caption: 'Descrição', size: '800px', sortable: true, resizable: true, type: 'text' },
                ],
                onAdd: function (event) {
                    var url = '{{route('perfil_usuario.AddView')}}';
                    var data = [];
                    getView(url, data);
                },
                onEdit: function (event) {
                        var id = event.recid.toString();
                        var url = "{{route('perfil_usuario.EditView', ['%id%'])}}".replace('%id%', id);
                        var data = [];
                        getView(url, data);
                },

                onDelete: function (event) {

                    var id = this.getSelection();
                    event.onComplete = function() {
                        var url = "{{route('perfil_usuario.delete', ['%id%'])}}".replace('%id%', id);
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
                    { field: 'nome', caption: 'Nome', type: 'text' },
                    { field: 'descricao', caption: 'Descrição', type: 'text' },
                ],

                url: '{{route('perfil_usuario.listar')}}',
                toolbar: {
                    items: [
                        { type: 'button', id: 'btn-view', caption: 'Visualizar', icon: 'fa fa-eye', disabled: true},
                        { type: 'spacer' },

                    ],
                    onClick: function (target, data) {


                        if (target == 'btn-view'){
                                var id = w2ui[this.owner.name].getSelection().toString();
                                var url = "{{route('perfil_usuario.View', ['%id%'])}}".replace('%id%', id);
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
