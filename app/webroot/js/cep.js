$(document).ready( function() {
   /* Executa a requisicao quando o campo CEP perder o foco */
   $('#PessoaCidadeId').blur(function(){
           /* Configura a requisicao AJAX */
           $.ajax({
                url : 'cidades/cep/' +  $('#PessoaCidadeId').val(), /* URL que sera chamada */
                type : 'POST', /* Tipo da requisicao */
                data: $('#PessoaCidadeId').val(), /* dado que sera enviado via POST */
                dataType: 'json', /* Tipo de transmissao */
                success: function(data){
		    alert(data.cep);
		    $('#PessoaCep').val(data.cep); 
		    $('#PessoaCep').focus();
                }
           });  
   return false;    
   });
});
