<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;" >
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" >
                <i class="bi bi-question-circle" style="font-size: 4rem; color: #4d6de6"></i>
                <p class="text-body-medium">Cancelar formulario</p>
                <p class="only-text-regular">¿Está seguro de que desea cancelar?</p>
            </div>
            <form action="{{route('login')}}" method="GET">
                @csrf
                <div class="modal-footer" style="border-top: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="button-modal">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>




