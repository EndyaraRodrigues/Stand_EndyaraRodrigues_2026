@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h2><i class="bi bi-geo-alt me-2 text-danger"></i>Contactos</h2>
        <p>Venha conhecer-nos pessoalmente ou contacte-nos</p>
    </div>
</div>

<div class="row g-3">

    <div class="col-md-5">
        <div class="card h-100">
            <div class="card-header bg-white">
                <i class="bi bi-info-circle me-2 text-primary"></i> Informações de contacto
            </div>
            <div class="card-body">

                <div class="d-flex gap-3 mb-4">
                    <div class="rounded-circle bg-danger bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:44px;height:44px;">
                        <i class="bi bi-geo-alt-fill text-danger"></i>
                    </div>
                    <div>
                        <p class="mb-0 fw-semibold">Endereço</p>
                        <p class="mb-0 text-muted">Avenida da República, 245<br>1050-189 Lisboa, Portugal</p>
                    </div>
                </div>

                <div class="d-flex gap-3 mb-4">
                    <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:44px;height:44px;">
                        <i class="bi bi-telephone-fill text-success"></i>
                    </div>
                    <div>
                        <p class="mb-0 fw-semibold">Telefone</p>
                        <p class="mb-0 text-muted">+351 21 345 6789</p>
                    </div>
                </div>

                <div class="d-flex gap-3 mb-4">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:44px;height:44px;">
                        <i class="bi bi-envelope-fill text-primary"></i>
                    </div>
                    <div>
                        <p class="mb-0 fw-semibold">Email</p>
                        <p class="mb-0 text-muted">geral@standautomoveis.pt</p>
                    </div>
                </div>

                <div class="d-flex gap-3 mb-2">
                    <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:44px;height:44px;">
                        <i class="bi bi-clock-fill text-warning"></i>
                    </div>
                    <div>
                        <p class="mb-0 fw-semibold">Horário</p>
                        <p class="mb-0 text-muted">
                            Segunda a Sexta: 09h00 — 19h00<br>
                            Sábado: 10h00 — 13h00<br>
                            Domingo: Fechado
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card h-100">
            <div class="card-header bg-white">
                <i class="bi bi-map me-2 text-danger"></i> Onde estamos
            </div>
            <div class="card-body p-0">
                <iframe
                    src="https://www.google.com/maps?q=Avenida+da+Rep%C3%BAblica+245+Lisboa&output=embed"
                    width="100%"
                    height="430"
                    style="border:0; border-radius: 0 0 16px 16px;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>

</div>

@endsection
