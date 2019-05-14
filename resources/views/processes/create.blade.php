<!-- The Modal -->
<form method="POST" v-on:submit.prevent="createProcesses">
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Proceso</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <label for="department">Departamento</label>
                <input type="text" name="department" class="form-control" v-model="department">
                <label for="municipality">Municipio</label>
                <input type="text" name="municipality" class="form-control" v-model="municipality">
                <label for="description">Descripcion</label>
                <textarea name="description" cols="20" rows="5" class="form-control" v-model="description"></textarea>
                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Guardar">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</form>