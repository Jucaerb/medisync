<div class="modal fade" id="registerAttentionModal{{$jsonData->id}}" aria-hidden="true"
     aria-labelledby="registerAttentionModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-body text-center d-flex justify-content-between text-center">
                    <p class="text-body-medium mb-0"><strong>Registra la atención realizada</strong></p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Paciente</span>
                    <input class="form-control" type="text" value="{{$jsonData->name}}"
                           aria-label="Disabled input example"
                           disabled readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre actividad</span>
                    <input class="form-control" type="text" value="{{$jsonData->activity_name}}"
                           aria-label="Disabled input example" disabled readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Comentarios</span>
                    <input id="comments" name="comments" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="400" required>
                </div>
            </div>

            <form action="{{route('attentionmodal', ['id' => $jsonData->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-footer" style="border-top: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="button-modal">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>
