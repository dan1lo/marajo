function validaForm(){
	d = document.form;
	//validar nome
	if (d.nome.value == ""){
		alert("O campo nome deve ser preenchido");
		d.nome.focus();
		return false;
	}
	//valida user
	if(d.mail.value == ""){
		alert("O campo e-mail deve ser preenchido");
		d.mail.focus();
		return false;
	}
		if(d.mail.value.indexOf("@")==-1){
			alert("Utilize um e-mail valido");
			d.mail.focus();
			return false;
		
	}
	return true;

	
}//fim dafuncao valida form
