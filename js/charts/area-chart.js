<?php 
$sql = "SELECT * FROM `kpi` WHERE (`id_kpi` = '".$id."') "; 
$retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
while($lista = mysqli_fetch_assoc($retorno)){
	$frequencia_kpi = $lista['$frequencia_kpi'];
	$metadiaria_kpi = $lista['$metadiaria_kpi'];
	$metamensal_kpi = $lista['$metamensal_kpi'];
	$metajaneiro_kpi = $lista['$metajaneiro_kpi'];
	$metafevereiro_kpi = $lista['$metafevereiro_kpi'];
	$metamarco_kpi = $lista['$metamarco_kpi'];
	$metaabril_kpi = $lista['$metaabril_kpi'];
	$metamaio_kpi = $lista['$metamaio_kpi'];
	$metajunho_kpi = $lista['$metajunho_kpi'];
	$metajulho_kpi = $lista['$metajulho_kpi'];
	$metaagosto_kpi = $lista['$metaagosto_kpi'];
	$metasetembro_kpi = $lista['$metasetembro_kpi'];
	$metaoutubro_kpi = $lista['$metaoutubro_kpi'];
	$metanovembro_kpi = $lista['$metanovembro_kpi'];
	$metadezembro_kpi = $lista['$metadezembro_kpi'];
	$metasemanal_kpi = $lista['$metasemanal_kpi'];
	$metatrimestral_kpi = $lista['$metatrimestral_kpi'];
	$metasemestral_kpi = $lista['$metasemestral_kpi'];
 }

 $sql2 = "SELECT * FROM `dadoskpi` WHERE (`idkpi_dadoskpi` = '".$id."') "; 
$retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
while($lista2 = mysqli_fetch_assoc($retorno2)){
	$data_dadoskpi = $lista2['$data_dadoskpi'];
	$resultado_dadoskpi = $lista2['$resultado_dadoskpi'];

 }

?>
function ($) {
 "use strict";
 
	 /*----------------------------------------*/
	/*  1.  Area Chart
	/*----------------------------------------*/
	var ctx = document.getElementById("areachartfalse");
	var areachartfalse = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
			datasets: [{
				label: "My First dataset",
				fill: false,
                backgroundColor: '#00c292',
				borderColor: '#00c292',
				data: [0, -20, 20, -20, 20, -20, 20]
            }]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			spanGaps: false,
			title:{
				display:true,
				text:'Area Chart Fill False'
			},
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
					ticks: {
						autoSkip: false,
						maxRotation: 0
					}
				}]
			}
		}
	});
	
	 /*----------------------------------------*/
	/*  2.  Area Chart origin
	/*----------------------------------------*/
	var ctx = document.getElementById("areachartorigin");
	var areachartorigin = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
			datasets: [{
				label: "My First dataset",
				fill: 'origin',
                backgroundColor: '#00c292',
				borderColor: '#00c292',
				data: [0, -20, 20, -20]
            }]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			spanGaps: false,
			title:{
				display:true,
				text:'Area Chart Fill origin'
			},
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
					ticks: {
						autoSkip: false,
						maxRotation: 0
					}
				}]
			}
		}
	});
	 /*----------------------------------------*/
	/*  3.  Area Chart start
	/*----------------------------------------*/
	var ctx = document.getElementById("areachartfillstart");
	var areachartfillstart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
			datasets: [{
				label: "My First dataset",
				fill: 'start',
                backgroundColor: '#00c292',
				borderColor: '#00c292',
				data: [0, 10, 20, 30]
            }]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			spanGaps: false,
			title:{
				display:true,
				text:'Area Chart Fill start'
			},
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
					ticks: {
						autoSkip: false,
						maxRotation: 0
					}
				}]
			}
		}
	});
	
	
	 /*----------------------------------------*/
	/*  4.  Area Chart end
	/*----------------------------------------*/
	var ctx = document.getElementById("areachartend");
	var areachartend = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
			datasets: [{
				label: "My First dataset",
				fill: 'end',
                backgroundColor: '#00c292',
				borderColor: '#00c292',
				data: [100, 90, 70, 60]
            }]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			spanGaps: false,
			title:{
				display:true,
				text:'Area Chart Fill end'
			},
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
					ticks: {
						autoSkip: false,
						maxRotation: 0
					}
				}]
			}
		}
	});
	
	 
		
})(jQuery); 