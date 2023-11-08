<div class="modal fade" id="attentionModal{{$patient->id}}" tabindex="-1" aria-labelledby="attentionModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
{{--            <div class="modal-body text-center">--}}
{{--                <p class="text-body-medium"><strong>Actividad {{$attention->activity_name}} </strong></p>--}}
{{--            </div>--}}
{{--            <div class="d-flex justify-content-center align-items-center p-5">--}}
{{--                <ul class="list-unstyled text-center">--}}
{{--                    @foreach ($activities as $activity)--}}
{{--                        <li class="mb-3">--}}
{{--                            <p class="only-text-regular">Medicamento: {{ $activity->medicine_id }}</p>--}}
{{--                        </li>--}}
{{--                        <li class="mb-3">--}}
{{--                            <p class="only-text-regular">Via: {{ $activity->via }}</p>--}}
{{--                        </li>--}}
{{--                        <li class="mb-3">--}}
{{--                            <p class="only-text-regular">Dosis: {{ $activity->dose }}</p>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <p class="only-text-regular">Hora: {{ $activity->schedule }}</p>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
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
