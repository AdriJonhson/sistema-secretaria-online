var inputsCEP = $('#logradouro, #bairro, #localidade, #uf, #ibge');
	var inputsRUA = $('#cep, #bairro, #ibge');
	var validacep = /^[0-9]{8}$/;

	function limpa_formulário_cep(alerta) {
		if (alerta !== undefined) {
			alert(alerta);
		}

		inputsCEP.val('');
	}

	function get(url) {

		$.get(url, function(data) {

			if (!("erro" in data)) {

				if (Object.prototype.toString.call(data) === '[object Array]') {
					var data = data[0];
				}

				$.each(data, function(nome, info) {
					$('#' + nome).val(nome === 'cep' ? info.replace(/\D/g, '') : info).attr('info', nome === 'cep' ? info.replace(/\D/g, '') : info);
				});



			} else {
				limpa_formulário_cep("CEP não encontrado.");
			}

		});
	}

// Digitando RUA/CIDADE/UF
$('#logradouro, #localidade, #uf').on('blur', function(e) {

	if ($('#logradouro').val() !== '' && $('#logradouro').val() !== $('#logradouro').attr('info') && $('#localidade').val() !== '' && $('#localidade').val() !== $('#localidade').attr('info') && $('#uf').val() !== '' && $('#uf').val() !== $('#uf').attr('info')) {

		inputsRUA.val('...');
		get('https://viacep.com.br/ws/' + $('#uf').val() + '/' + $('#localidade').val() + '/' + $('#logradouro').val() + '/json/');
	}

});

// Digitando CEP
$('#cep').on('blur', function(e) {

	var cep = $('#cep').val().replace(/\D/g, '');

	if (cep !== "" && validacep.test(cep)) {

		inputsCEP.val('...');
		get('https://viacep.com.br/ws/' + cep + '/json/');

	} else {
		limpa_formulário_cep(cep == "" ? undefined : "Formato de CEP inválido.");
	}
});

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('uf').value=(conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value="...";
            document.getElementById('bairro').value="...";
            document.getElementById('cidade').value="...";
            document.getElementById('uf').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};