function validacao() {
    var senha = document.getElementById("senhaUsuario").value;
    var csenha = document.getElementById("CsenhaUsuario").value;
	if (senha == csenha) {
		return true;
	} else {
	    return false;
	}
}
 
