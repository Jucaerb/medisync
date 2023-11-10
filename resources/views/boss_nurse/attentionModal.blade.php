<div class="modal fade" id="attentionModal{{$jsonData->id}}" aria-hidden="true"
     aria-labelledby="attentionModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <div class="modal-body text-center d-flex justify-content-between text-center">
                    <p class="text-body-medium mb-0"><strong>Actividad {{$jsonData->activity_name}}</strong></p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center align-items-center">
                    <ul class="list-unstyled text-center">
                        <li class="mb-3">
                            <p class="text-body"><strong>Medicamento:</strong> {{ $jsonData->medicine_id }}</p>
                        </li>
                        <li class="mb-3">
                            <p class="text-body"><strong>Via:</strong> {{ $jsonData->via }}</p>
                        </li>
                        <li class="mb-3">
                            <p class="text-body"><strong>Dosis:</strong> {{ $jsonData->dose }}</p>
                        </li>
                        <li>
                            <p class="text-body">
                                <strong>Hora:</strong> {{ \Carbon\Carbon::createFromFormat('H',$jsonData->hour)->format('H:i') }}
                            </p>
                        </li>
                        <li>
                            <p class="text-body"><strong>Fecha:</strong> {{$jsonData->date_for}}</p>
                        </li>
                        <li>
                            <p class="text-body"><strong>Paciente:</strong> {{$jsonData->name}} </p>
                        </li>
                        <li>
                            <p class="text-body"><strong>Habitación:</strong> {{$jsonData->room}}</p>
                        </li>
                        <li>
                            <p class="text-body">El usuario que realice esta operación debe <br>ser mínimo un
                                <strong>{{ __('passwords.'.$jsonData->min_permissions) }}</strong></p>
                        </li>
                        <li>
                            <p class="text-body"><strong>Observaciones:</strong> {{$jsonData->observations}}</p>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button-modal" data-bs-target="#registerAttentionModal{{$jsonData->id}}"
                        data-bs-toggle="modal">Atender
                </button>
                <button class="btn btn-secondary" data-bs-toggle="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>
