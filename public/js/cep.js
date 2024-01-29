$(document).ready(function() {

    function clean() {

        $("#address").val("");
        $("#city").val("");
        $("#state").val("");
    }

    $("#zip_code").blur(function() {

        const cep = $(this).val().replace(/\D/g, '');

        if (cep !== "") {

            const validateCep = /^[0-9]{8}$/;

            if(validateCep.test(cep)) {

                $("#address").val("...");
                $("#city").val("...");
                $("#state").val("...");

                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/", function(dados) {

                    if (!("erro" in dados)) {

                        $("#address").val(dados.logradouro);
                        $("#city").val(dados.localidade);
                        $("#state").val(dados.uf);
                    }
                    else {

                        clean();
                    }
                });
            }
            else {

                clean();
            }
        }
        else {
            clean();
        }
    });
});
