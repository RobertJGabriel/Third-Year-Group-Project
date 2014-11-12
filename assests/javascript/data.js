$(function () {
    $('#chart1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'DeadLift'
        },
        xAxis: {
            categories: [
                '30-10-14',
                '3-11-14',
                '6-11-14'
            ]
        },
        yAxis: {
            min: 0,
            labels: {
                format: '{value} kg'
            },
            title: {
                text: 'Weight'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:15px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"># Reps of {point.y:.1f} kg</td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Set 1',
            data: [10,10,20]

        }, {
            name: 'Set 2',
            data: [20,20,30]

        }, {
            name: 'Set 3',
            data: [30,30,40]

        }]
    });
});

$(function () {
    $('#chart2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Bicep Dumbbell'
        },
        xAxis: {
            categories: [
                '30-10-14',
                '3-11-14',
                '6-11-14'
            ]
        },
        yAxis: {
            min: 0,
            labels: {
                format: '{value} kg'
            },
            title: {
                text: 'Weight'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:15px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"># Reps of {point.y:.1f} kg</td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Set 1',
            data: [20,30,40]

        }, {
            name: 'Set 2',
            data: [30,30,40]

        }, {
            name: 'Set 3',
            data: [30,40,50]

        }]
    });
});

$(function () {
    $('#chart3').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Back Dumbbell'
        },
        xAxis: {
            categories: [
                '30-10-14',
                '3-11-14',
                '6-11-14'
            ]
        },
        yAxis: {
            min: 0,
            labels: {
                format: '{value} kg'
            },
            title: {
                text: 'Weight'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:15px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"># Reps of {point.y:.1f} kg</td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Set 1',
            data: [5,5,10]

        }, {
            name: 'Set 2',
            data: [10,10,20]

        }, {
            name: 'Set 3',
            data: [10,10,20]

        }]
    });
});

