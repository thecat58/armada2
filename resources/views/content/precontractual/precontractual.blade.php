@extends('layouts/layoutMaster')

@section('title', 'Pre-Contractual - Formulario')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/flatpickr/flatpickr.scss', 'resources/assets/vendor/libs/typeahead-js/typeahead.scss', 'resources/assets/vendor/libs/tagify/tagify.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/flatpickr/flatpickr.js', 'resources/assets/vendor/libs/typeahead-js/typeahead.js', 'resources/assets/vendor/libs/tagify/tagify.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js'])
@endsection

@section('page-script')
    @vite(['resources/js/planes-precontractual.js'])
@endsection

@section('content')
    @role('Administrador')

        <h5 class="card-header">Validación Plan de Adquisiciones</h5>
        <div class="row mb-6">
            <div class="col-md mb-6 mb-md-0">
                <div class="card">

                    <div class="card-body">
                        <form id="precontractualForm" class="precontractual-form-validation"
                            action="{{ route('precontractual.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="plan">Seleccionar Plan</label>
                                        <select class="form-control" id="plan" name="plan" required>
                                            <option value="">Seleccione un plan</option>
                                            @foreach ($planes as $plan)
                                                <option value="{{ $plan->id }}">{{ $plan->nombrePlan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="mt-2">
                            <h6>Planes Registrados</h6>
                            <ul id="registeredPlansList" class="list-group"></ul>
                        </div>
                        <div class="mt-4">
                            <h6>Estudio Previo</h6>
                            <div class="mb-3">
                                <label class="form-label">Documento Estudio Previo</label>
                                <input type="file" class="form-control" id="estudioPrevio" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <select class="form-control" id="estadoEstudio">
                                    <option value="pendiente">Pendiente</option>
                                    <option value="en_revision">En Revisión</option>
                                    <option value="aprobado">Aprobado</option>
                                    <option value="rechazado">Rechazado</option>
                                </select>
                            </div>
                        </div>

                        <!-- Agregar sección de seguimiento -->
                        <div class="mt-4">
                            <h6>Seguimiento del Proceso</h6>
                            <div class="timeline">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Añadir la modal al final del contenido -->
        <div class="modal fade" id="planDetailsModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detalles del Plan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="planDetailsContent"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            No tienes permisos para acceder a esta página.
        </div>
    @endrole
@endsection