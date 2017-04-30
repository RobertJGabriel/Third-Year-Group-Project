$(function() {

    var months = [];
    var days = [];
    var switch1 = true;
    $.get('assets/model/cardioValues.php', function(data) {

        data = data.split('/');
        for (var i in data) {
            if (switch1 == true) {
                months.push(data[i]);
                switch1 = false;
            } else {
                days.push(parseFloat(data[i]));
                switch1 = true;
            }

        }
        months.pop();

        $('#chart_cardio').highcharts({
            chart : {
                type : 'spline'
            },
            title : {
                text : 'Chat Graph'
            },
            subtitle : {
                text : 'Cit Gym System'
            },
            xAxis : {
                title : {
                    text : 'Amount of miles run'
                },
                categories : months
            },
            yAxis : {
                title : {
                    text : 'About of time running ( Mins)'
                },
                labels : {
                    formatter : function() {
                        return this.value + ''
                    }
                }
            },
            tooltip : {
                crosshairs : true,
                shared : true,
                valueSuffix : ''
            },
            plotOptions : {
                spline : {
                    marker : {
                        radius : 4,
                        lineColor : '#666666',
                        lineWidth : 1
                    }
                }
            },
            series : [{

                name : 'Miles Ran',
                data : days
            }]
        });
    });
});