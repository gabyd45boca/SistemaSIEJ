@extends('adminlte::page')

@section('title', 'SIEA')

@section('content_header')

    <div class="text-center">
        <div class="pt-8">
            <h1 class="m-0 text-dark">SISTEMA DE INFORMACION DE EXPEDIENTES ADMINISTRATIVOS</h1>
        </div>
    </div>

    <hr class="my-4 mx-n4" />
    <div class="row g-3">

        <div class="col-md-3">
            <div class="info-box bg-gradient-warning">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">VIOLENCIA DE GENERO</span>
                <span class="info-box-number">20</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-success">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">SINIESTRO VIAL</span>
                <span class="info-box-number">9</span>
            </div>
            </div>
        </div>
   

        <div class="col-md-3">
            <div class="info-box bg-gradient-info">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">USO INDEBIDO DE ARMA REGLAMENTARIA</span>
                <span class="info-box-number">10</span>
            </div>
            </div>
        </div>
   

        <div class="col-md-3">
            <div class="info-box bg-gradient-gray">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">IRREGULARIDADES EN SERVICIO ADICIONAL</span>
                <span class="info-box-number">8</span>
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
                <span class="info-box-text">EBRIEDAD</span>
                <span class="info-box-number">0</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-danger">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">ABUSO SEXUAL</span>
                <span class="info-box-number">3</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-dark">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">IRREGULARIDADES CON COMBUSTIBLE</span>
                <span class="info-box-number">3</span>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box bg-gradient-secondary">
            <span class="info-box-icon"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">USO INDEBIDO DEL CELULAR</span>
                <span class="info-box-number">3</span>
            </div>
            </div>
        </div>

    </div> 
    <hr class="my-4 mx-n4" />
    
    <div class="input-daterange datepicker row align-items-center">
    <div class="col">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control" placeholder="Start date" type="text" value="06/18/2020">
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control" placeholder="End date" type="text" value="06/22/2020">
            </div>
        </div>
    </div>
</div>


@stop

@section('content')

    
@stop

@section('js')
<script src="/assets-old/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
   </script>
   // <block:setup:1>
const data = {
  labels: [
    'Red',
    'Blue',
    'Yellow'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};
// </block:setup>

// <block:config:0>
const config = {
  type: 'doughnut',
  data: data,
};
// </block:config>

module.exports = {
  actions: [],
  config: config,
};
 
    </script>
  

@endsection

