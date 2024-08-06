@extends('layouts.web.app')

@section('css')
    <style>
        /* (CSS di atas) */
    </style>
@endsection

@section('content')
    <section class="content-section">
        @if (Auth::check())
            @if (Gate::allows('isAdmin') || Gate::allows('isOwner'))
                <div class="alert alert-info">
                    Selamat Datang {{ Auth::user()->nama }} ....<br>
                   Role : {{ Auth::user()->role }} <br><br>
                    <strong>Info:</strong> Halaman ini menampilkan data perolehan suara. Perbarui halaman untuk melihat data
                    terbaru. <br><br>
                    <div class="info-item">
                        <i class="fas fa-user info-icon"></i>
                        <strong>NAMA: </strong> <span> &nbsp; {{ $caleg->nama }}</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-flag info-icon"></i>
                        <strong>PARTAI: </strong> <span> &nbsp; {{ $caleg->partai }}</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt info-icon"></i>
                        <strong>DAPIL: </strong> <span> &nbsp; {{ $caleg->dapil }}</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-building info-icon"></i>
                        <strong>CALEG DPRD KAB/KOTA:</strong> <span> &nbsp; {{ $caleg->wilayah }}</span>
                    </div>
                </div>

                <div class="dashboard-summary">
                    <div class="summary-box total-saksi">
                        <h3><i class="fas fa-users"></i> Total Saksi</h3>
                        <p>{{ $totalSaksi }}</p>
                    </div>
                    <div class="summary-box total-tps">
                        <h3><i class="fas fa-map-pin"></i> Total TPS</h3>
                        <p>{{ $totalTps }}</p>
                    </div>
                    <div class="summary-box tps-terinput">
                        <h3><i class="fas fa-check-circle"></i> TPS Terinput</h3>
                        <p>{{ $inputTps }}</p>
                    </div>
                    <div class="summary-box total-perolehan-suara">
                        <h3><i class="fas fa-chart-line"></i> Total Suara</h3>
                        <p>{{ number_format($totalSuara, 0, ',', '.') }}</p>
                    </div>
                    <div class="summary-box terakhir-update-data">
                        <h3><i class="fas fa-calendar-day"></i> Update Data:</h3>
                        <p>{{ $lastDataUpdate }}</p>
                    </div>
                </div>

                <section class="content-section">
                    <div class="chart-container">
                        <h2>Perolehan Suara</h2>
                        <canvas id="barChart"></canvas>
                    </div>
                </section>
            @else
                <div class="alert alert-info">
                    Selamat Datang {{ Auth::user()->nama }} ....
                </div>
            @endif
        @endif
    </section>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ url('/results-json') }}",
                type: 'GET',
                success: function(data) {
                    const tpsLabels = data.data.map(item => item.no_tps); // Use no_tps as label
                    const votesValues = data.data.map(item => parseFloat(item.total_suara));
                    const totalVotes = votesValues.reduce((acc, curr) => acc + curr, 0);

                    const rupiahFormat = new Intl.NumberFormat('id-ID', {
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0,
                        useGrouping: true
                    });

                    new Chart(document.getElementById('barChart'), {
                        type: 'bar',
                        data: {
                            labels: tpsLabels,
                            datasets: [{
                                label: 'Jumlah Suara per TPS',
                                data: votesValues,
                                backgroundColor: '#4BC0C0',
                                borderColor: '#357a7d',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top',
                                    labels: {
                                        color: '#333'
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            return tooltipItem.label + ': ' + rupiahFormat
                                                .format(tooltipItem.raw);
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    grid: {
                                        color: 'rgba(0, 0, 0, 0.1)'
                                    },
                                    ticks: {
                                        color: '#333'
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: 'rgba(0, 0, 0, 0.1)'
                                    },
                                    ticks: {
                                        color: '#333'
                                    }
                                }
                            },
                            layout: {
                                padding: 20
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
