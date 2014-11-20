
    $(function() {


        var options = {

            chart: {
                renderTo: 'container',
                type: 'column',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Weight Lifted ( Kg)',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                title: {
                    text: 'Weight '
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: []
        }

        $.getJSON("assests/model/Graphs_Values/weightChart.php", function(json) {
            options.xAxis.categories = json[0]['data'];
      options.series[0] = json[1];
            options.series[1] = json[2];
            options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
        });
    });