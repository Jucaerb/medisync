<div class="modal fade" id="inactiveModal{{$patient->id}}" tabindex="-1" aria-labelledby="inactiveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;" >
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" >
                <i class="bi bi-question-circle" style="font-size: 4rem; color: #4d6de6"></i>
                <p class="text-body-medium">Inactivar paciente</p>
                <p class="only-text-regular">¿Está seguro de ejecutar esta operación?</p>
            </div>
            <form action="{{route('inactivePatient', ['id' => $patient->id])}}" method="POST">
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


