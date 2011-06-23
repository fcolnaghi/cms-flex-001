function showError(titulo, mensagem) {
		$("#dialog").html("<p><span class=\"ui-icon ui-icon-alert\" style=\"float:left; margin:0 7px 50px 0;\"></span>"+ mensagem + "</p>");
		$("#dialog").attr("title",titulo);
		
		$("#dialog").dialog({
			bgiframe: true,
			modal: true,
			draggable: true,
			resizable: false,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
		});
}

function validaForm(objeto) {
	for(i=0;i < objeto.elements.length; i++) {						
		if((objeto.elements[i].type == "select-one" || objeto.elements[i].type == "text" || objeto.elements[i].type == "radio" || objeto.elements[i].type == "password" || objeto.elements[i].type == "file") && objeto.elements[i].className.indexOf("requerido") > -1) {
			if(objeto.elements[i].className.indexOf("data") > -1) {
				if(!validaData(objeto.elements[i])) {
					showError("Atenção","Data em formato inválido.");
					objeto.elements[i].value = "";
					objeto.elements[i].focus();
					return false;
				}
			}
			if(objeto.elements[i].value == "") {
				showError("Atenção", objeto.elements[i].title + " é um campo obrigatório.");
				objeto.elements[i].focus();
				return false;
			}
		}
	}
	
	return objeto.submit();
}
