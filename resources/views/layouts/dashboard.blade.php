@extends('layouts.main')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="widget gradient-widget">
                <div class="widget-caption gradient-danger">
                    <div class="gradient-icon gr-icon-danger">
                        <i class="icon icon-profile-male"></i>
                    </div>
                    <div class="gradient-detail">
                        <div class="widget-detail">
                            <h3>4</h3>
                            <span>Usuarios nuevos este mes</span>
                        </div>
                        {{-- <a href="#" class="gr-btn" title="View More">More Info</a> --}}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="widget gradient-widget">
                <div class="widget-caption gradient-info">
                    <div class="gradient-icon gr-icon-info">
                        <i class="icon icon-happy"></i>
                    </div>
                    <div class="gradient-detail">
                        <div class="widget-detail">
                            <h3>10</h3>
                            <span>Usuarios registrados</span>
                        </div>
                        {{-- <a href="#" class="gr-btn" title="View More">More Info</a> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget gradient-widget">
                <div class="widget-caption gradient-purple">
                    <div class="gradient-icon gr-icon-purple">
                        <i class="icon icon-basket"></i>
                    </div>
                    <div class="gradient-detail">
                        <div class="widget-detail">
                            <h3>2</h3>
                            <span>Pedidos realizados</span>
                        </div>
                        {{-- <a href="#" class="gr-btn" title="View More">More Info</a> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget gradient-widget">
                <div class="widget-caption gradient-success">
                    <div class="gradient-icon gr-icon-success">
                        <i class="icon icon-trophy"></i>
                    </div>
                    <div class="gradient-detail">
                        <div class="widget-detail">
                            <h3>$100 MXN</h3>
                            <span>Pagado por clientes</span>
                        </div>
                        {{-- <a href="#" class="gr-btn" title="View More">More Info</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="widget simple-widget">
                <div class="row">
                    <div class="widget-caption danger">
                        <div class="col-xs-4 no-pad">
                            <i class="cl-danger icon fa fa-user"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                <h3 class="cl-danger">2 <span>(4%)</span></h3>
                                <span>Usuarios bloqueados</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line">
                                <span style="width:2%;" class="bg-danger widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget simple-widget">
                <div class="row">
                    <div class="widget-caption info">
                        <div class="col-xs-4 no-pad">
                            <i class="cl-info icon fa fa-tags"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                <h3 class="cl-info">1 <span>(5%)</span></h3>
                                <span>Pedidos finalizados</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line">
                                <span style="width:5%;" class="bg-info widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget simple-widget">
                <div class="row">
                    <div class="widget-caption purple">
                        <div class="col-xs-4 no-pad">
                            <i class="cl-purple icon fa fa-exclamation"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                <h3>$100 MXN</h3>
                                <span>Comisión conekta</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line">
                                <span style="width:100%;" class="bg-purple widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget simple-widget">
                <div class="row">
                    <div class="widget-caption warning">
                        <div class="col-xs-4 no-pad">
                            <i class="cl-warning icon fa fa-usd"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                <h3 class="cl-warning">$100 MXN</h3>
                                <span>Ganancia total</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line">
                                <span style="width:100%;" class="bg-warning widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="text-center col-sm-12 col-xs-12"><!-- Se imprime con todo el ancho de la página -->
            <canvas id="myChart" height="200" width="700"></canvas>  
        </div>
    </div>
</div>
<script type="text/javascript">
var ctx = $("#myChart");
var ventas = [];

var data = {
    labels: ventas.week_days,
    datasets: [
        {
            label: "Ingresos de última semana en Pesos (MXN)",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: ventas.total_sales,
            spanGaps: false,
        }
    ]
};

var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@endsection