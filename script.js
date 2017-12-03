function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
      if (tecla==8 || tecla==0) return true;
  else  return false;
    }
}


$(document).ready(function(){

      var username = "";
      var id_telegram = "";
      function get_dados(username2){
        return $.ajax({
          url: "http://localhost/smartbee/public/dashboard/ntelegram/getdata",
          method: "GET",
          data: {teste: username2},
          dataType: 'json',
          success: function(data) {
            console.log(data.id.length);
            if (data.id != ""){ 
              id_telegram = data.id;
              swal(
                'Sucesso!',
                'Username Confirmado!',
                'success'
                )
            }else{

              swal(
                'Erro!',
                'Username não confirmado! Tente outra vez!',
                'error'
                )
              id_telegram = "";
            }
          },
          error: function(data) {
            console.log(data);
          }
        });
      }
$("#confirmar").click(function(){
  $.when(get_dados($("#username").val())).done(function(){
    $("#id_telegram").val(id_telegram);
  });
});



	   $('#form_not input').attr('checked',false);
       $("#intsim").hide();
       $('.menu2').each(function(){
       		$(this).hide();
       })
       $('.menu3').each(function(){
       		$(this).hide();

       })
       $('#not input').on('change', function() {
   		var op = $('input[name=estado]:checked').val();
		//alert(op);   	
   		switch(op) {

   		case 'ativadas':
       	$("#intsim").show();
   		$('.menu2').each(function(){
       		$(this).hide();
       	});
       	$('.menu3').each(function(){
       		$(this).hide();

       })
   		break;

   		case 'personalizadas':
   		$("#intsim").hide();
   		$('.menu2').each(function(){
       		$(this).show();
       		});
   		break;

   		}
});
    	

      

       $('.menu2 input').on('change', function() {

		//alert(op);
		var campo = $(this).attr("name");
		switch (campo){
			case "temperatura":
			if ($(this).val() == "sim"){
				$('.menu3').each(function(){
       				var op3 = $(this).find("select").attr("name");
       				if (op3 == "intervalot"){
       				    $(this).show();
       				}
			});

			}else{
				$('.menu3').each(function(){
       				var op3 = $(this).find("select").attr("name");
       				if (op3 == "intervalot"){
       					$(this).hide();
       				}
			});
			}
			break;
			case "umidade":
			if ($(this).val() == "sim"){
				$('.menu3').each(function(){
       				var op3 = $(this).find("select").attr("name");
       				if (op3 == "intervalou"){
       					$(this).show();
       				}
			});

			}else{
				$('.menu3').each(function(){
       				var op3 = $(this).find("select").attr("name");
       				if (op3 == "intervalou"){
       					$(this).hide();
       				}
			});
			}
			break;
			case "som":
			if ($(this).val() == "sim"){
				$('.menu3').each(function(){
       				var op3 = $(this).find("select").attr("name");
       				if (op3 == "intervalos"){
       					$(this).show();
       				}
			});

			}else{
				$('.menu3').each(function(){
       				var op3 = $(this).find("select").attr("name");
       				if (op3 == "intervalos"){
       					$(this).hide();
       				}
			});
			}
			break;
			case "oxigenio":
			if ($(this).val() == "sim"){
				$('.menu3').each(function(){
       				var op3 = $(this).find("select").attr("name");
       				if (op3 == "intervaloo"){
       					$(this).show();
       				}
			});

			}else{
				$('.menu3').each(function(){
       				var op3 = $(this).find("select").attr("name");
       				if (op3 == "intervaloo"){
       					$(this).hide();
       				}
			});
			}
			break;
			case "dioxido":
			if ($(this).val() == "sim"){
				$('.menu3').each(function(){
       				var op3 = $(this).find("select").attr("name");
       				if (op3 == "intervalod"){
       					$(this).show();
       				}
			});

			}else{
				$('.menu3').each(function(){
       				var op3 = $(this).find("select").attr("name");
       				if (op3 == "intervalod"){
       					$(this).hide();
       				}
			});
			}
			break;
			case "peso":
			if ($(this).val() == "sim"){
				$('.menu3').each(function(){
       				var op3 = $(this).find("select").attr("name");
       				if (op3 == "intervalop"){
       					$(this).show();
       				}
			});

			}else{
				$('.menu3').each(function(){
       				var op3 = $(this).find("select").attr("name");
       				if (op3 == "intervalop"){
       					$(this).hide();
       				}
			});
			}
			break;
			

		}   	
   		
   	});    

});
