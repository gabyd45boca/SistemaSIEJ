@extends('adminlte::page')

@section('title', 'SIEA')

@section('content_header')
    <h1 class="m-0 text-dark">Consultas Sumarios</h1>
@stop

@section('content')
<hr class="my-4 mx-n4" />
    <div class="row g-3">

        <div class="col-md-3">
            <div class="info-box bg-gradient-primary">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">VIOLENCIA DE GENERO</span>
                <span class="info-box-number">{{$sumarios1->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-info">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">AUSENTISMO LABORAL</span>
                <span class="info-box-number">{{$sumarios2->count()}}</span>
            </div>
            </div>
        </div>
   

        <div class="col-md-3">
            <div class="info-box bg-gradient-dark">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">PERDIDA Y/O SUSTRACCION DEL ARMA REGLAMENTARIA</span>
                <span class="info-box-number">{{$sumarios3->count()}}</span>
            </div>
            </div>
        </div>
   

        <div class="col-md-3">
            <div class="info-box bg-gradient-gray">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">SINIESTRO VIAL</span>
                <span class="info-box-number">{{$sumarios4->count()}}</span>
            </div>
            </div>
        </div>

    </div>    

    <hr class="my-4 mx-n4" />   

    <div class="row g-3">

        <div class="col-md-3">
            <div class="info-box bg-gradient-primary">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">ABUSO SEXUAL</span>
                <span class="info-box-number">{{$sumarios5->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-info">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">EBRIEDAD</span>
                <span class="info-box-number">{{$sumarios6->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-dark">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">IRREGULARIDADES EN SERVICIO ADICIONAL</span>
                <span class="info-box-number">{{$sumarios7->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-secondary">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">IRREGULARIDADES CON COMBUSTIBLE</span>
                <span class="info-box-number">{{$sumarios8->count()}}</span>
            </div>
            </div>
        </div>

    </div> 
    <hr class="my-4 mx-n4" />

    <div class="row g-3">

        <div class="col-md-3">
            <div class="info-box bg-gradient-primary">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">USO INDEBIDO DEL CELULAR</span>
                <span class="info-box-number">{{$sumarios9->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-info">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">USO INDEBIDO DE ARMA REGLAMENTARIA</span>
                <span class="info-box-number">{{$sumarios10->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-dark">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">SUPUESTA INFRACCION AL ART. 205 DEL C.P.A</span>
                <span class="info-box-number">{{$sumarios11->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-secondary">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">OTRO</span>
                <span class="info-box-number">{{$sumarios12->count()}}</span>
            </div>
            </div>
        </div>

    </div> 

<hr class="my-4 mx-n4" />

    <div class="container">
        <h2 class="m-0 text-dark">Sumarios por Motivo</h2>
        <canvas id="motivosChart" width="400" height="400"></canvas>
    </div>
<hr class="my-4 mx-n4" />    

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch("{{ route('sumarios.motivosData') }}")
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(item => item.nombre_mot);
                    const counts = data.map(item => item.total);

                    const ctx = document.getElementById('motivosChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Sumarios por Motivo',
                                data: counts,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: 'Sumarios por Motivo'
                                }
                            }
                        }
                    });
                });
        });
    </script>

@endsection