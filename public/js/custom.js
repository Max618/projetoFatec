var btn = document.getElementById('btn_add');
btn.addEventListener('click', add);
var cont = 0;
function add() {
    var div = document.getElementById('novos_campos');
    var campo = "<div class=\"col-md-6\">\n" +
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

var prof = document.getElementById('add_prof');
prof.addEventListener('click',add_prof);
var cont2 = 0;
function add_prof() {
    var div = document.getElementById('prof_aux');
    var campo =
        "       <div class='col-md-6'>\n" +
        "           <div class='form-group'>\n" +
        "              <label class='upper' for='prof_"+cont2+"'>Professor Auxiliar</label>\n" +
        "              <input type='text' class='form-control' name='name_prof_"+cont2+"' placeholder='Nome Professor Auxiliar' id='name_prof_"+cont2+"' aria-required='true'>\n" +
        "           </div>\n" +
        "        </div>\n" +
        "        <div class='col-md-6'>\n" +
        "            <div class='form-group'>\n" +
        "               <label class='upper' for='prof_email_"+cont2+"'>E-mail</label>\n" +
        "               <input type='email' class='form-control required' name='email_"+cont2+"' placeholder='E-mail Professor Auxiliar' id='email_"+cont2+"' aria-required='true'>\n" +
        "         </div>\n" +
        "     </div>";

    div.innerHTML += campo;
    cont2++;
}


var esc = document.getElementById('add_esc');
esc.addEventListener('click',add_escola);
var cont3 = 1;
function add_escola() {
    var div = document.getElementById('add_escola');
    var campo =
        "        <div class='col-md-6'>\n" +
        "           <div class='form-group'>\n" +
        "               <label class='upper' for='esc_"+cont3+"'></label>\n" +
        "               {{ Form::select('instituicao_id', $instituicoes, 'Selecione uma Unidade', ['class' => 'form-control']) }}" +
        "           </div>\n" +
        "        </div>";
    div.innerHTML += campo;
    cont3++;
}