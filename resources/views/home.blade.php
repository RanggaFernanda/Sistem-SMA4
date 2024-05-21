@extends('Layout.App')
@section('title', 'Dashboard Utama')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info Boxes -->
            <div class="row">
                @if(isset($dataPembina))
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-user-friends"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Seluruh Pembina</span>
                            <span class="info-box-number">{{ $dataPembina }} Pembina Ekskul</span>
                        </div>
                    </div>
                </div>
                @endif

                @if(isset($dataEvent))
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-calendar-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Seluruh Event</span>
                            <span class="info-box-number">{{ $dataEvent }} Event/ Lomba</span>
                        </div>
                    </div>
                </div>
                @endif

                @if(isset($dataPrestasi))
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-warning">
                        <span class="info-box-icon"><i class="fas fa-trophy"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Seluruh Prestasi</span>
                            <span class="info-box-number">{{ $dataPrestasi }} Prestasi</span>
                        </div>
                    </div>
                </div>
                @endif

                @if(isset($dataEkskul))
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="fas fa-running"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Seluruh Ekskul</span>
                            <span class="info-box-number">{{ $dataEkskul }} Ekstrakurikuler</span>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Grafik Data</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <canvas id="myChart"></canvas>
                                </div>
                                <div class="col-md-4">
                                    <div class="percentage-display">
                                        <h4>Persentase Data</h4>
                                        <ul>
                                            @if(isset($totalData) && $totalData > 0)
                                            <li>Data Seluruh Pembina: {{ number_format(($dataPembina / $totalData) * 100, 2) }}%</li>
                                            <li>Data Seluruh Event: {{ number_format(($dataEvent / $totalData) * 100, 2) }}%</li>
                                            <li>Data Seluruh Prestasi: {{ number_format(($dataPrestasi / $totalData) * 100, 2) }}%</li>
                                            <li>Data Seluruh Ekskul: {{ number_format(($dataEkskul / $totalData) * 100, 2) }}%</li>
                                            @else
                                            <li>No data available</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- JavaScript -->
    <script>
        // Data for the chart from the backend
        var chartLabels = @json($chartData['labels'] ?? []);
        var chartData = @json($chartData['data'] ?? []);

        // Create the chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Data Sample',
                    data: chartData,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
