<div class="modal fade" id="attentionModal{{$jsonData->id}}" tabindex="-1" aria-labelledby="attentionModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="text-body-medium"><strong>Actividad {{$jsonData->activity_name}} </strong></p>
            </div>
            <div class="d-flex justify-content-center align-items-center p-5">
                <ul class="list-unstyled text-center">
                        <li class="mb-3">
                            <p class="only-text-regular">Medicamento: {{ $jsonData->medicine_id }}</p>
                        </li>
                        <li class="mb-3">
                            <p class="only-text-regular">Via: {{ $jsonData->via }}</p>
                        </li>
                        <li class="mb-3">
                            <p class="only-text-regular">Dosis: {{ $jsonData->dose }}</p>
                        </li>
                        <li>
                            <p class="only-text-regular">Hora: {{ \Carbon\Carbon::createFromFormat('H',$jsonData->hour)->format('H:i') }}</p>
                        </li>
                </ul>
            </div>
        </div>
    </div>
{{--    <form action="{{route('attentionModal', [''])}}" method="POST">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}
{{--        <div class="modal-footer" style="border-top: none;">--}}
{{--            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>--}}
{{--            <button type="submit" class="button-modal">Confirmar</button>--}}
{{--        </div>--}}
{{--    </form>--}}
</div>
