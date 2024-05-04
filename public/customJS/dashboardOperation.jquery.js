/*! jQuery v3.6.4 | (c) OpenJS Foundation and other contributors | jquery.org/license */

$(document).ready(function() {

if ($('#RegCandidate').length > 0) {
    //** Getting Data */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/admin/fetch-data',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            // Handle the fetched data and print it in HTMLs
            $('#RegCandidate').html(response.RegisterCandidate);
            $('#totTraningCenter').html(response.totalTraningCenter);
            $('#totTrainingPartner').html(response.totalTraningPartner);
            $('#totalCandidatesPlaced').html(response.totalCandidatesPlaced);
        }
    });
}

    //Bar Chart

if ($('#chart').length > 0) {
    $.ajax({
        url: '/admin/fetch-graph-data', // Replace with the actual URL to fetch data
        method: 'POST',
        dataType: 'json',
        success: function(response) {
          // Process the response data
          var options = {
            series: [{
                name: "Registered Candidate",
                data: response.counts
            }],
            chart: {
                foreColor: '#9a9797',
                type: "bar",
                height: 280,
                toolbar: {
                    show: !1
                },
                zoom: {
                    enabled: !1
                },
                dropShadow: {
                    enabled: 0,
                    top: 3,
                    left: 14,
                    blur: 4,
                    opacity: .12,
                    color: "#3361ff"
                },
                sparkline: {
                    enabled: !1
                }
            },
            markers: {
                size: 0,
                colors: ["#3361ff"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7
                }
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "70%",
                    endingShape: "rounded"
                }
            },
            legend: {
                show: false,
                position: 'top',
                horizontalAlign: 'left',
                offsetX: -20
            },
            dataLabels: {
                enabled: true,
                formatter: function (val) {
                return val;
                },
                offsetY: -20,
                style: {
                fontSize: '12px',
                colors: ["#304758"]
                }
            },
            stroke: {
                show: !0,
                width: 0,
                curve: "smooth"
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: "vertical",
                    shadeIntensity: 0.5,
                    gradientToColors: ["#005bea"],
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 1,
                }
            },
            colors: ["#348bff"],
            xaxis: {
                categories: response.districts
            },
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function(val) {
                        return "" + val + ""
                    }
                }
            }
        };
          var chart = new ApexCharts(document.querySelector("#chart"), options);
          chart.render();
          
        },
        error: function(xhr, status, error) {
          // Handle the error response response.districts  response.counts 
        }
      });
}


if ($('#donutChart').length > 0) {
      $.ajax({
        url: '/admin/fetchmalefemaledata', // Replace with the actual URL to fetch data
        method: 'POST',
        dataType: 'json',
        success: function(response) {
   
                //-------------
                //- DONUT CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                    var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
                    var donutData = {
                        labels: response.labels,
                        datasets: [{
                            data: response.dataset,
                            backgroundColor: ['#f56954', '#00a65a'],
                        }],
                    };

                    var donutOptions = {
                        maintainAspectRatio: false,
                        responsive: true,
                    };

                    //Create pie or doughnut chart
                    // You can switch between pie and doughnut using the method below.
                    var donutChart = new Chart(donutChartCanvas, {
                        type: 'doughnut',
                        data: donutData,
                        options: donutOptions,
                    });

                    // Display values on the donut chart
                    var data = donutChart.data.datasets[0].data;
                    var sum = data.reduce((a, b) => a + b, 0);

                    donutChart.options.plugins = {
                        legend: false,
                        tooltip: false,
                        beforeDraw: function(chart) {
                            var width = chart.chart.width,
                                height = chart.chart.height,
                                ctx = chart.chart.ctx;

                            ctx.restore();
                            var fontSize = (height / 114).toFixed(2);
                            ctx.font = fontSize + "em sans-serif";
                            ctx.textBaseline = "middle";

                            var text = sum,
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;

                            ctx.fillText(text, textX, textY);
                            ctx.save();
                        }
                    };
                    /**
                     * ENd of Pie Chart
                     */
        },
        error: function(xhr, status, error) {
            // Handle the error response response.districts  response.counts 
        }
    });
}



    if ($('#org_reg_id').length > 0) {
        // Generate Operation ID 
        //** Getting Data */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: 'generateOrganizationId',
            type: 'POST',
            dataType: 'json',
            data: {
                alise: $('#phase').val()
            },
            success: function(response) {
            
                $('#org_reg_id').val(response);
            }
        });
    }

});