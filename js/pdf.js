
$(function() {
			//buscar();
		});
		function generarPDF(id){
			console.log("pdf "+id);
			var parametros = {"action":"ajax",'query':id};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'php/generateReport.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loaderi").html("<div class='loader'></div>");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loaderi").html("");
				}
			})
		}