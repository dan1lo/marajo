function enquete(){
    cx1 = document.form;
    if (cx1.enqueteNome.value == "")
	  {
		alert ("A pergunta não poderá ser vazia!");
	    return false;
	  }

    return true;

   }

