		function buscar(){
			var query=$("#busqueda").val();
			var parametros = {"action":"ajax",'query':query};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'php/busqueda.php',
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