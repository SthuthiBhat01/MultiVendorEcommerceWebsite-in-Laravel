@extends('adminfrontend.layouts.main')

@section('main-container')



<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div class="content">
        <!-- Top Statistics -->
        <div class="row">
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-1">
                    <div class="card-body">
                        <h2 class="mb-1">{{ $totalSignups }}</h2>
                        <p>Total Signups</p>
                        <span class="mdi mdi-account-arrow-left"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">{{ $vendorsCount }}</h2>
                        <p>Vendors</p>
                        <span class="mdi mdi-account-clock"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-3">
                    <div class="card-body">
                        <h2 class="mb-1">{{ $buyersCount }}</h2>
                        <p>Buyers</p>
                        <span class="mdi mdi-package-variant"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-4">
                    <div class="card-body">
                        <h2 class="mb-1">{{ $enquiriesCount }}</h2>
                        <p>Enquiries</p>
                        <span class="mdi mdi-currency-usd"></span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Content Wrapper -->
</div>

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
        
        
    </div>
    <div class="col-xl-4 col-md-12 p-b-15">
        <div class="card card-default">
            <div class="card-header flex-column align-items-start">
                <h2>Sent Enquiries per Seller Report</h2>
            </div>
            <div class="card-body">
             
                <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
             
            </div>
           
        </div>
    </div>
</div>

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

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>


@endsection
