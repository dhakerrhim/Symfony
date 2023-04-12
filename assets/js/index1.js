export function index(myVarVal,hexToRgba) {
	'use strict'
	/* Apex Chart Start*/
	var options = {
		series: [{
			name: 'Net Profit',
			type: 'column',
			data: [22, 34, 56, 37, 35, 21, 34, 60, 78, 56, 53, 89],
		}, {
			name: 'Sales',
			type: 'column',
			data: [42, 50, 70, 57, 55, 58, 43, 80, 54, 23, 34, 77],
		}, {
			name: 'Total',
			type: 'line',
			data: [25, 36, 58, 39, 38, 25, 37, 62, 56, 25, 37, 79],
		}],
		chart: {
			height: 300,
			foreColor: 'rgba(142, 156, 173, 0.9)',
		},
		stroke: {
			width: [0, 2, 4],
			curve: "smooth"
		},
		grid: {
			borderColor: 'transparent',
		},
		colors: [myVarVal || "#4d65d9", "#d7d7d9", "#e4e7ed"],
		plotOptions: {
			bar: {
				endingShape: 'rounded',
				horizontal: false,
				columnWidth: '30%',
			},
		},
		dataLabels: {
			enabled: false,
		},
		legend: {
			show: true,
			position: 'top',
			labels: {
				color: 'rgba(142, 156, 173, 0.9)'
			},
			fontFamily: 'Hind Siliguri',
		},
		stroke: {
			show: true,
			width: 4,
			colors: ['transparent']
		},
		yaxis: {
			title: {
				style: {
					color: '#adb5be',
					fontSize: '14px',
					fontFamily: 'Hind Siliguri',
					fontWeight: 600,
					cssClass: 'apexcharts-yaxis-label',
				},
			},
			labels: {
				rotate: -90,
				style: {
					fontFamily: 'Hind Siliguri',
					cssClass: 'summaryyaxis',
				}
			}
		},
		xaxis: {
			type: 'month',
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			axisBorder: {
				show: true,
				color: 'rgba(119, 119, 142, 0.05)',
				offsetX: 0,
				offsetY: 0,
			},
			axisTicks: {
				show: true,
				borderType: 'solid',
				color: 'rgba(119, 119, 142, 0.05)',
				width: 6,
				offsetX: 0,
				offsetY: 0
			},
			labels: {
				rotate: -90,
				style: {
					fontFamily: 'Hind Siliguri',
					cssClass: 'summaryxaxis',
				}
			}
		},
		markers: {
			size: 0
		}
	};

	document.getElementById('salessummary').innerHTML = ''
	var chart = new ApexCharts(document.querySelector("#salessummary"), options);
	chart.render();

	/* Apex Chart End*/

	// circle 1
	$('#circle1').circleProgress({
		value: 0.7,
		size: 60,
		fill: {
			color: ["#ff9b21"]
		}
	})
		.on('circle-animation-progress', function (event, progress) {
			$(this).find('strong').html(Math.round(70 * progress) + '<i>%</i>');
		});

	// circle 2
	$('#circle2').circleProgress({
		value: 0.85,
		size: 60,
		fill: {
			color: ["#19b159"]
		}
	})
		.on('circle-animation-progress', function (event, progress) {
			$(this).find('strong').html(Math.round(85 * progress) + '<i>%</i>');
		});

	// circle 3
	$('#circle3').circleProgress({
		value: 0.85,
		size: 60,
		fill: {
			color: ["#01b8ff"]
		}
	})
		.on('circle-animation-progress', function (event, progress) {
			$(this).find('strong').html(Math.round(90 * progress) + '<i>%</i>');
		});

}

export function index2(myVarVal,hexToRgba) {
	/* Chartjs (#sales-summary) */
	var myCanvas = document.getElementById("sales-summary");
	myCanvas.height = "300";
	var myChart = new Chart(myCanvas, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
				label: 'Sales',
				data: [27, 16, 27, 22, 14, 18, 27, 21, 14, 27, 20, 27],
				backgroundColor: myVarVal,
				borderWidth: 1,
				hoverBackgroundColor: myVarVal,
				hoverBorderWidth: 0,
				borderColor: myVarVal,
				hoverBorderColor: myVarVal,  
				barPercentage: 0.15,
			}, {

				label: 'Profits',
				data: [44, 24, 39, 30, 31, 32, 39, 28, 24, 39, 31, 39],
				backgroundColor: hexToRgba(myVarVal, 0.2) ||'#9fa8e0',
				borderWidth: 1,
				hoverBackgroundColor: hexToRgba(myVarVal, 0.2) || '#9fa8e0',
				hoverBorderWidth: 0,
				borderColor: hexToRgba(myVarVal, 0.2) || '#9fa8e0',
				hoverBorderColor: hexToRgba(myVarVal, 0.2) ||'#9fa8e0',
				barPercentage: 0.15,
			},

			]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			plugins:{
				layout: {
					padding: {
						left: 0,
						right: 0,
						top: 0,
						bottom: 0
					}
				},
				tooltips: {
					enabled: false,
				},
				legend: {
					display: true,
				},
				elements: {
					point: {
						radius: 0,
					}
				},

			},
			scales: {
				y: {
					gridLines: {
						display: true,
						drawBorder: false,
						zeroLineColor: 'rgba(142, 156, 173,0.1)',
						color: "rgba(142, 156, 173,0.1)",
					},
					scaleLabel: {
						display: false,
					},
					ticks: {
						beginAtZero: true,
						stepSize: 10,
						max: 50,
						fontColor: "#8492a6",
						fontFamily: 'Hind Siliguri',
					},
				},
				x: {
					barPercentage: 0.15,
					barValueSpacing: 3,
					barDatasetSpacing: 3,
					barRadius: 5,
					stacked: true,
					ticks: {
						beginAtZero: true,
						fontColor: "#8492a6",
						fontFamily: 'Hind Siliguri',
					},
					gridLines: {
						color: "rgba(142, 156, 173,0.1)",
						display: false
					},

				}
			},
		}
	});
	/* Chartjs (#sales-summary) closed */
};

 export function morrisFn(myVarVal,hexToRgba){

	// index CHART COLOR dOTS
	document.querySelector('.bg-primary-light-1').style.background = hexToRgba(myVarVal, 0.7) ;
	document.querySelector('.bg-primary-light-2').style.background = hexToRgba(myVarVal, 0.5) ;
	document.querySelector('.bg-primary-light-3').style.background = hexToRgba(myVarVal, 0.2) ;

	 	/*Morris chart */
	new Morris.Donut({

		element: 'revenuemorrischart',
		data: [
			{ label: "clients", value: 15 },
			{ label: "sales", value: 42 },
			{ label: "shares", value: 20 },
			{ label: "profits", value: 23 }
		],
		colors: [hexToRgba(myVarVal, 0.7) || "#7886d3", myVarVal, hexToRgba(myVarVal, 0.2) || "#d8dcf3", hexToRgba(myVarVal, 0.5) || "#9fa8e0"],
		labelColor: '#77778e',
		resize: true,
	});

	if (document.querySelectorAll('#revenuemorrischart svg').length >= 2) {
		let svgs = document.querySelectorAll('#revenuemorrischart svg')

		for (var i = 0; i <= svgs.length - 1; i++) {
			if (i == 0) {

			}
			else {
				svgs[i].remove()
			}
		}
	}
 }
