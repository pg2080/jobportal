function GetChart()
{
    var drawLineChart = null;
    var drawPieChart = null;
    var drawStackedChart = null;
    var drawBarChart = null;
    var drawDoughnutChart = null;
    var drawBoundryChart = null; //NKB++ 07012020

    this.fnGetBarChart = function (aryXAxisData, aryYAxisData, PointHoverText, ChartHeadText, XAxisText, YAxisText, canvasID, oCustomOption)
    {
        var dataset = [];
        var autoSkip = true;


        if (oCustomOption)
            autoSkip = __glb_Utils_fnN2False(oCustomOption.autoSkip);

        if (aryXAxisData.filter(Array.isArray).length > 0)
        {
            for (var IntIndex = 0; IntIndex < aryXAxisData.length; IntIndex++)
            {
                dataset[IntIndex] = {
                    label: PointHoverText[IntIndex],
                    backgroundColor: this.fnGenerateRandomColor(),
                    borderColor: window.chartColors.white,
                    borderDash: [5, 2],
                    data: aryXAxisData[IntIndex]
                };
            }
        }
        else
        {
            dataset[0] = {
                label: PointHoverText,
                backgroundColor: this.fnGenerateRandomColor(),
                borderColor: window.chartColors.white,
                borderDash: [5, 2],
                data: aryXAxisData
            };
        }

        var config = {
            type: 'bar',
            data: {
                labels: aryYAxisData,
                datasets: dataset
            },
            options: {
                responsive: true,
                //Aashi-- 27022020 events: ['click'], //Aashi++ 07022020 

                title: {
                    display: true,
                    text: ChartHeadText
                },

                legend: {
                    display: true
                },
                scales: {
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: YAxisText
                        },
                        ticks: {
                            beginAtZero: true,
                            min: 0 // Aashi++ 03022020
                        }
                    }],

                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: XAxisText
                        },

                        ticks: {
                            min: 0,
                            max: 130,
                            stepSize: 0,
                            autoSkip: autoSkip
                        }
                    }]
                }
            }
        }

        if (drawBarChart != null)
            drawBarChart.destroy();

        var canvas = document.getElementById(canvasID);
        var ctx = canvas.getContext('2d');
        drawBarChart = new Chart(ctx, config);
        return drawBarChart; //Aashi++ 10022020
    }

    this.fnGetStackedChart = function (aryXAxisData, aryYAxisData, PointHoverText, ChartHeadText, XAxisText, YAxisText, canvasID)
    {
        var dataset = [];
        if (aryXAxisData.filter(Array.isArray).length > 0)
		{
            for (var IntIndex = 0; IntIndex < xarydata.length; IntIndex++)
            {
                dataset[IntIndex] = {
                    label: PointHoverText,
                    backgroundColor: this.fnGenerateRandomColor(),
                    borderColor: window.chartColors.white,
                    borderDash: [5, 2],
                    data: aryXAxisData[IntIndex]
                }
            }
        }
        else
        {
            dataset[0] = {
                label: PointHoverText,
                backgroundColor: this.fnGenerateRandomColor(),
                borderColor: window.chartColors.white,
                borderDash: [5, 2],
                data: aryXAxisData
            }
        }

        var config = {
            type: 'bar',
            data: {
                labels: aryYAxisData,
                datasets: dataset
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: ChartHeadText
                },
                legend: {
                    display: true
                },

                scales: {
                    yAxes: [{
                        display: true,
                        stacked: true,
                        scaleLabel: {
                            display: true,
                            labelString: YAxisText
                        }
                    }],
                    xAxes: [{
                        display: true,
                        stacked: true,
                        scaleLabel: {
                            display: true,
                            labelString: XAxisText

                        },
                        ticks: {
                            min: 0,
                            max: 130,
                            stepSize: 1
                        }

                    }]
                }
            }
        }

        if (drawStackedChart != null)
            drawStackedChart.destroy();

        var canvas = document.getElementById(canvasID);
        var ctx = canvas.getContext('2d');
        drawStackedChart = new Chart(ctx, config);
    }


    this.fnGetLineChart = function (aryXAxisData, aryYAxisData, PointHoverText, ChartHeadText, XAxisText, YAxisText, canvasID, oCustomOption)
    {
        var drawLineChart = null;
        var bShowLine = true
        if (oCustomOption)
            bShowLine = __glb_Utils_fnN2False(oCustomOption.ShowLine);

        var config = {
            type: 'line',
            data: {
                labels: aryXAxisData,
                datasets: [{
                    label: PointHoverText,
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.blue,
                    borderDash: [5, 2],
                    data: aryYAxisData,
                    fill: false,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    showLine: bShowLine
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: ChartHeadText
                },
                legend: {
                    display: false
                },
                elements: {
                    point: {
                        pointStyle: 'Circle'
                    }
                },
                scales: {
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: YAxisText
                        }
                    }],
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: XAxisText
                        },
                        ticks: {
                            min: 0,
                            max: 130,
                            stepSize: 1
                        }

                    }]
                }
            }
        }

        if (drawLineChart != null)
            drawLineChart.destroy();

        var canvas = document.getElementById(canvasID);
        var ctx = canvas.getContext('2d');
        drawLineChart = new Chart(ctx, config);
    }

    this.fnGenerateRandomColor = function ()
    {
        var color = '#' + ('000000' + Math.floor(Math.random() * 16777215).toString(16)).slice(-6);
        return color;
    }

    this.fnGetPieChart = function (aryXAxisData, aryYAxisData, strHoverText, canvasID, oCustomOption)
    {
        var colorArray = [];
        if (oCustomOption)
        {
            colorArray = oCustomOption;
            if (oCustomOption.length <= aryXAxisData.length)
            {
                for (var intIndex = oCustomOption.length; intIndex < aryXAxisData.length; intIndex++)
                    colorArray[intIndex] = this.fnGenerateRandomColor()
            }
        }
        else
        {
            for (var intIndex = 0; intIndex < aryXAxisData.length; intIndex++)
                colorArray[intIndex] = this.fnGenerateRandomColor();
        }

        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: aryXAxisData,
                    backgroundColor: colorArray
                }],
                labels: aryYAxisData
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'left'
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data)
                        {
                            return strHoverText + ":" + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        }
                    }
                }
            }
        };

        if (drawPieChart != null)
            drawPieChart.destroy();

        var canvas = document.getElementById(canvasID);
        var ctx = canvas.getContext('2d');
        drawPieChart = new Chart(ctx, config);
    }

    this.fnGetdoughnutChart = function (aryXAxisData, aryYAxisData, strHoverText, canvasID, oCustomOption)
    {
        var colorArray = [];
        if (oCustomOption)
        {
            colorArray = oCustomOption;
            if (oCustomOption.length <= aryXAxisData.length)
            {
                for (var intIndex = oCustomOption.length; intIndex < aryXAxisData.length; intIndex++)
                    colorArray[intIndex] = this.fnGenerateRandomColor()
            }
        }
        else
        {
            for (var intIndex = 0; intIndex < aryXAxisData.length; intIndex++)
                colorArray[intIndex] = this.fnGenerateRandomColor();
        }

        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: aryXAxisData,
                    backgroundColor: colorArray
                }],
                labels: aryYAxisData
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'left'
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data)
                        {
                            return strHoverText + ":" + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        }
                    }
                }
            }
        };

        if (drawDoughnutChart != null)
            drawDoughnutChart.destroy();

        var canvas = document.getElementById(canvasID);
        var ctx = canvas.getContext('2d');
        drawDoughnutChart = new Chart(ctx, config);
    }

    this.fnGetBoundryChart = function (aryXAxisData, aryYAxisData, PointHoverText, ChartHeadText, XAxisText, YAxisText, canvasID, oCustomOption) //NKB++ 07012020
    {
        var dataset = [];
        var autoSkip = true;

        if (oCustomOption)
            autoSkip = __glb_Utils_fnN2False(oCustomOption.autoSkip);

        if (aryXAxisData.filter(Array.isArray).length > 0) {
            for (var IntIndex = 0; IntIndex < aryXAxisData.length; IntIndex++) {
                dataset[IntIndex] = {
		                backgroundColor: Color.none,  //utils.transparentize(presets.green),
		                borderColor: this.fnGenerateRandomColor(),
		                data: aryXAxisData[IntIndex],
		                pointRadius: 1,
		                borderWidth: 2,
		                label: PointHoverText[IntIndex]
                    //   borderDash: [5, 2],
                    //    data: aryXAxisData[IntIndex]
                };
            }
        }
        else {
            dataset[0] = {
                label: PointHoverText,
                backgroundColor: Color.none,
                borderColor: this.fnGenerateRandomColor(),
                // borderDash: [5, 2],
                pointRadius: 1,
                borderWidth: 2,
                data: aryXAxisData
            };
        }

        var options = {
            maintainAspectRatio: false,
            spanGaps: false,
            elements: {
                line: {
                    tension: 0.000001
                }
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: XAxisText
                    },
                    ticks: {
                        autoSkip: false,
                        maxRotation: 60,
                        min:0
                    }

                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: YAxisText
                    },
                    ticks: {
                        autoSkip: false,
                        maxRotation: 60,
                        min:0
                    }

                }]
            }
        };

        var config = {
            type: 'line',
            data: {
                labels: aryYAxisData,
                datasets: dataset
            },
            options: Chart.helpers.merge(options, {
                title: {
                    text: ChartHeadText, // + boundary,
                    display: true
                }
            })
        }

        if (drawBoundryChart != null)
            drawBoundryChart.destroy();

        var canvas = document.getElementById(canvasID);
        var ctx = canvas.getContext('2d');
       // ctx.clearRect(0, 0, canvas.width, canvas.height);        
        drawBoundryChart = new Chart(ctx, config);
    }
}