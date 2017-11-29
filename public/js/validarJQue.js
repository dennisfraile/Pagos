	var expr = /[aA-zZ]/;
	var exprDui = /^\d{8}-\d{1}$/;

	$(document).ready(function(){
		$("#guardar").click(function(){

			var primernombre = $("#primernombre").val();
			var primerapellido = $("#primerapellido").val();
			var dui = $("#dui").val();
		

			if(primernombre == "" || !expr.test(primernombre)){

				$("#mensaje1").fadeIn();
				return false;

			}else{

				$("#mensaje1").fadeOut();
				
					if(primerapellido == "" || !expr.test(primerapellido)){

						$("#mensaje3").fadeIn();
						return false;

					}else{

						$("#mensaje4").fadeOut();
							
							if(dui == "" || !exprDui.test(dui)){

								$("#mensaje5").fadeIn();
								return false;
							}
					}
				}

		});
	});
