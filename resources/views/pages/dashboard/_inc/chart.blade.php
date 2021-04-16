@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar",
                data: {
                    labels: [
                        @foreach($yearly_chart_labels as $label)
                            '{{ $label }}',
                        @endforeach
                    ],
                    datasets: [
                        {
                            label: "{{ $yearly_chart_label }}",
                            backgroundColor: window.theme.primary,
                            borderColor: window.theme.primary,
                            hoverBackgroundColor: window.theme.primary,
                            hoverBorderColor: window.theme.primary,
                            data: [{{ implode(', ', $yearly_chart_data) }}],
                            barPercentage: .325,
                            categoryPercentage: .5
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    cornerRadius: 15,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20
                            },
                            stacked: true,
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            },
                            stacked: true,
                        }]
                    }
                }
            });
        });
    </script>
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="card flex-fill w-100">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ $yearly_chart_label }}</h5>
            </div>
            <div class="card-body d-flex w-100">
                <div class="align-self-center chart chart-lg">
                    <canvas id="chartjs-dashboard-bar"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
