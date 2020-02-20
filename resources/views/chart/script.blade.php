<script>
    var options =
    {
        chart: {
            type: '{!! $chart->type() !!}',
            height: {!! $chart->height() !!},
            toolbar: {!! $chart->toolbar() !!},
            dropShadow: {!! $chart->shadow() !!},
            zoom: {!! $chart->zoom() !!}
        },
        plotOptions: {
            bar: {!! $chart->horizontal() !!}
        },
        colors: {!! $chart->colors() !!},
        series: {!! $chart->dataset() !!},
        dataLabels: {!! $chart->dataLabels() !!},
        labels: [{!! $chart->labels() !!}],
        title: {
            text: "{!! $chart->title() !!}"
        },
        subtitle: {
            text: '{!! $chart->subtitle() !!}',
            align: '{!! $chart->subtitlePosition() !!}'
        },
        xaxis: {
            categories: {!! $chart->xAxis() !!}
        },
        grid: {!! $chart->grid() !!},
        @if($chart->stroke())
            stroke: {!! $chart->stroke() !!},
        @endif
        annotations: {!! $chart->annotations() !!},

    }

    var chart = new ApexCharts(document.querySelector("#{!! $chart->id() !!}"), options);
    chart.render();

</script>
