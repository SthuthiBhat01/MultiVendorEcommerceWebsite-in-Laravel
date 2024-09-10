@extends('adminfrontend.layouts.main')

@section('main-container')

@php
    $months = [];
    $now = \Carbon\Carbon::now();

    for ($i = 0; $i < 4; $i++) {
        $months[] = $now->copy()->subMonths($i)->format('M, Y');
    }

    $userChartDataPoints = [];
    for ($i = 0; $i < 4; $i++) {
        $userChartDataPoints[] = [
            "y" => $usersCount[3 - $i],
            "label" => $months[3 - $i]
        ];
    }
@endphp

{{-- Combined chart rendering script --}}
<script>
    window.onload = function () {
        var userChart = new CanvasJS.Chart("chartContainer1", {
            title: {
                text: "Number of Users"
            },
            axisY: {
                title: "Number of Users"
            },
            data: [{
                type: "line",
                dataPoints: @json($userChartDataPoints)
            }]
        });

        var sellerChart = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            title:{
                text: "Sent Enquiries per Seller"
            },
            axisY: {
                title: "Number of Enquiries",
                includeZero: true
            },
            data: [{
                type: "bar",
                yValueFormatString: "#,##0",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontWeight: "bolder",
                indexLabelFontColor: "white",
                dataPoints: @json($sellerChartDataPoints)
            }]
        });

        userChart.render();
        sellerChart.render();
    }
</script>

{{-- Divs for the charts --}}
<div class="row">
    <div class="col-xl-8 col-md-12 p-b-15">
        <div id="user-acquisition" class="card card-default">
            <div class="card-header">
                <h2>User Report</h2>
            </div>
            <div class="card-body">
                {{-- User Chart --}}
                <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
                
            </div>
        </div>
        <div class="col-xl-8 col-md-12 p-b-15">
        </div>

        <div id="user-acquisition" class="card card-default">
            <div class="card-header">
                <h2>Seller Enquiries Report</h2>
            </div>
            <div class="card-body">
              
                {{-- Seller Enquiries Chart --}}
                <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
            </div>
        </div>


    </div>
</div>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

@endsection
