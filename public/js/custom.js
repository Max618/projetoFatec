var btn = document.getElementById('btn_add');
btn.addEventListener('click', add);
var cont = 0;
function add() {
    var div = document.getElementById('novos_campos');
    campo = "<div class=\"col-md-6\">\n" +
"               <div class=\"form-group\">\n" +
"                  <label class=\"upper\" for='campoNome_"+cont+"'>Nome do Campo</label>\n" +
"                  <input type=\"text\" class=\"form-control\" name='campoNome_"+cont+"' placeholder=\"Nome do campo\" id='campoNome_"+cont+"' aria-required=\"true\">\n" +
"               </div>\n" +
"             </div>" +
"           <div class=\"col-md-6\">\n" +
"                <div class=\"form-group\">\n" +
"                   <label class=\"upper\" for='campoVal_"+cont+"'>Valor do Campo</label>\n" +
"                   <input type=\"text\" class=\"form-control required\" name='campoVal_"+cont+"' placeholder=\"Valor do Campo\" id='campoVal_"+cont+"' aria-required=\"true\">\n" +
"                </div>\n" +
"            </div>";
    div.innerHTML += campo;
    cont++;
}
