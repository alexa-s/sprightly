@extends('master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default panel-fs">
                        <div class="panel-heading">
                            <h3 class="panel-title">User Statistics</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12 chart-container">
                                <h3>XS Tasks Durations</h3>
                                <div>
                                    <canvas id="xs_line_chart"></canvas>
                                </div>
                                <h3>S Tasks Durations</h3>
                                <div>
                                    <canvas id="s_line_chart"></canvas>
                                </div>
                                <h3>M Tasks Durations</h3>
                                <div>
                                    <canvas id="m_line_chart"></canvas>
                                </div>
                                <h3>L Tasks Durations</h3>
                                <div>
                                    <canvas id="l_line_chart"></canvas>
                                </div>
                                <h3>XL Tasks Durations</h3>
                                <div>
                                    <canvas id="xl_line_chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var xs_line_chart = {
            labels: [{!! $xs_line_chart['labels'] !!}],
            datasets: [
                {
                    fillColor: "rgba(0,0,0,0)",
                    strokeColor: "rgba(0,127,255,0.75)",
                    data: [{!! $xs_line_chart['d_data'] !!}]
                },
                {
                    fillColor: "rgba(0,0,0,0)",
                    strokeColor: "rgba(255,127,0,0.75)",
                    data: [{!! $xs_line_chart['p_data'] !!}]
                }
            ]
        };

        var s_line_chart = {
            labels: [{!! $s_line_chart['labels'] !!}],
            datasets: [
                {
                    fillColor: "rgba(0,0,0,0)",
                    strokeColor: "rgba(0,127,255,0.75)",
                    data: [{!! $s_line_chart['d_data'] !!}]
                },
                {
                    fillColor: "rgba(0,0,0,0)",
                    strokeColor: "rgba(255,127,0,0.75)",
                    data: [{!! $s_line_chart['p_data'] !!}]
                }
            ]
        };

        var m_line_chart = {
            labels: [{!! $m_line_chart['labels'] !!}],
            datasets: [
                {
                    fillColor: "rgba(0,0,0,0)",
                    strokeColor: "rgba(0,127,255,0.75)",
                    data: [{!! $m_line_chart['d_data'] !!}]
                },
                {
                    fillColor: "rgba(0,0,0,0)",
                    strokeColor: "rgba(255,127,0,0.75)",
                    data: [{!! $m_line_chart['p_data'] !!}]
                }
            ]
        };

        var l_line_chart = {
            labels: [{!! $l_line_chart['labels'] !!}],
            datasets: [
                {
                    fillColor: "rgba(0,0,0,0)",
                    strokeColor: "rgba(0,127,255,0.75)",
                    data: [{!! $l_line_chart['d_data'] !!}]
                },
                {
                    fillColor: "rgba(0,0,0,0)",
                    strokeColor: "rgba(255,127,0,0.75)",
                    data: [{!! $l_line_chart['p_data'] !!}]
                }
            ]
        };

        var xl_line_chart = {
            labels: [{!! $xl_line_chart['labels'] !!}],
            datasets: [
                {
                    fillColor: "rgba(0,0,0,0)",
                    strokeColor: "rgba(0,127,255,0.75)",
                    data: [{!! $xl_line_chart['d_data'] !!}]
                },
                {
                    fillColor: "rgba(0,0,0,0)",
                    strokeColor: "rgba(255,127,0,0.75)",
                    data: [{!! $xl_line_chart['p_data'] !!}]
                }
            ]
        };

        window.onload = function () {
            var xs_line = document.getElementById("xs_line_chart").getContext("2d");
            window.xs_line_chart = new Chart(xs_line).Line(xs_line_chart, {
                pointDotRadius: 2,
                maintainAspectRatio: false,
                responsive: true
            });

            var s_line = document.getElementById("s_line_chart").getContext("2d");
            window.s_line_chart = new Chart(s_line).Line(s_line_chart, {
                pointDotRadius: 2,
                maintainAspectRatio: false,
                responsive: true
            });

            var m_line = document.getElementById("m_line_chart").getContext("2d");
            window.m_line_chart = new Chart(m_line).Line(m_line_chart, {
                pointDotRadius: 2,
                maintainAspectRatio: false,
                responsive: true
            });

            var l_line = document.getElementById("l_line_chart").getContext("2d");
            window.l_line_chart = new Chart(l_line).Line(l_line_chart, {
                pointDotRadius: 2,
                maintainAspectRatio: false,
                responsive: true
            });

            var xl_line = document.getElementById("xl_line_chart").getContext("2d");
            window.xl_line_chart = new Chart(xl_line).Line(xl_line_chart, {
                pointDotRadius: 2,
                maintainAspectRatio: false,
                responsive: true
            });
        }
    </script>
@stop