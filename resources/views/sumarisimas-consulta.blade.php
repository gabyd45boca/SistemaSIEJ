@extends('adminlte::page')

@section('title', 'SIEA')

@section('content_header')
    <h1 class="m-0 text-dark">Consultas Sumarisimas</h1>
@stop

@section('content')
<hr class="my-4 mx-n4" />
    <div class="row g-3">

        <div class="col-md-3">
            <div class="info-box bg-gradient-primary">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">VIOLENCIA DE GENERO</span>
                <span class="info-box-number">{{$sumarisimas1->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-info">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">AUSENTISMO LABORAL</span>
                <span class="info-box-number">{{$sumarisimas2->count()}}</span>
            </div>
            </div>
        </div>
   

        <div class="col-md-3">
            <div class="info-box bg-gradient-dark">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">PERDIDA Y/O SUSTRACCION DEL ARMA REGLAMENTARIA</span>
                <span class="info-box-number">{{$sumarisimas3->count()}}</span>
            </div>
            </div>
        </div>
   

        <div class="col-md-3">
            <div class="info-box bg-gradient-gray">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">SINIESTRO VIAL</span>
                <span class="info-box-number">{{$sumarisimas4->count()}}</span>
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
                <span class="info-box-number">{{$sumarisimas5->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-info">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">EBRIEDAD</span>
                <span class="info-box-number">{{$sumarisimas6->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-dark">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">IRREGULARIDADES EN SERVICIO ADICIONAL</span>
                <span class="info-box-number">{{$sumarisimas7->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-secondary">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">IRREGULARIDADES CON COMBUSTIBLE</span>
                <span class="info-box-number">{{$sumarisimas8->count()}}</span>
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
                <span class="info-box-number">{{$sumarisimas9->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-info">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">USO INDEBIDO DE ARMA REGLAMENTARIA</span>
                <span class="info-box-number">{{$sumarisimas10->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-dark">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">SUPUESTA INFRACCION AL ART. 205 DEL C.P.A</span>
                <span class="info-box-number">{{$sumarisimas11->count()}}</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-secondary">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">OTRO</span>
                <span class="info-box-number">{{$sumarisimas12->count()}}</span>
            </div>
            </div>
        </div>

    </div> 

<hr class="my-4 mx-n4" />

    <div class="container">
        <h2 class="m-0 text-dark">Sumarisimas por Motivo</h2>
        <canvas id="motivosChart" width="400" height="400"></canvas>
    </div>
<hr class="my-4 mx-n4" />    

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch("{{ route('sumarisimas.motivosData') }}")
                .then(response => response.json())
                .then(data => {
                    data = data.filter(item => item.nombre_mot); // Filtra motivos vacíos
                    console.log(data); // Verifica los datos aquí
                    const labels = data.map(item => item.nombre_mot);//labels: Extrae los nombres de los motivos 
                    //(nombre_mot) de cada objeto en el arreglo data 
                    //y los guarda en un arreglo labels. Estos serán las etiquetas del gráfico.
                    const counts = data.map(item => item.total);//Extrae el total de sumarios por motivo (total) 
                    //y los guarda en el arreglo counts. Estos valores serán representados en el gráfico.

                    const ctx = document.getElementById('motivosChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Sumarisimas por Motivo',
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
                            //maintainAspectRatio: false, // para reducir el grafico
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                   // text: 'Sumarisimas por Motivo'
                                }
                            }
                        }
                    });
                });
        });
    </script>

@endsection