@extends('layouts.model')

@section('page-title')
Criar Novo Projeto
@endsection


@section('content')
<section id="page-content">
    @if(count($errors->all()) > 0)
    @foreach($errors->all() as $error)
    <div class="container">
        <div role="alert" class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
            <strong><i class="fa fa-warning"></i> Alerta!</strong> {{ $error }}
        </div>
    </div>
    @endforeach
    @endif
    <div class="container">
        <!-- Page title -->
        <div class="page-title">
            <h1>Cadastrar Novo Projeto</h1>
            <div class="breadcrumb float-left">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a>
                    </li>
                    <li><a href="{{ route('projeto.index') }}">Projetos</a>
                    </li>
                    <li><a class="active" href="{{ route('projeto.create') }}">Novo Projeto</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end: Page title -->
        <!--Castrar Projeto Form-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- <form action="{{ route('projeto.store') }}" method="POST"> -->
                {!! Form::open(['route' => 'projeto.store', 'methood' => 'post']) !!}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="name">Nome do Projeto</label>
                            <input type="text" class="form-control required" name="name" placeholder="Nome Projeto" id="name" aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="descricao">Descrição</label>
                            <input type="text" class="form-control required" name="descricao" placeholder="Breve Descrição do Projeto" id="descricao" aria-required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="componente_curricular">Componente curricular</label>
                            <input type="text" class="form-control required" name="componente_curricular" placeholder="Componente Curricular" id="componente_curricular" aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="n_alunos">Alunos por Grupo</label>
                            <select name="n_alunos" id="n_alunos">
                                <option value="">Selecione um Opção</option>
                                @for($i = 1; $i < 11; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="n_aulas">Aulas Necessárias</label>
                            <select name="n_aulas" id="n_aulas">
                                <option value="">Selecione um Opção</option>
                                @for($i = 1; $i < 21; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="tags">Tags</label>
                            <input type="text" class="form-control required" name="tags" placeholder="Separe uma tag da outra com '/'" id="tags" aria-required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="upper" for="cronograma">Projeto</label>
                        <textarea class="form-control required" name="projeto" rows="6" placeholder="Projeto" id="projeto" aria-required="true"></textarea>
                    </div>
                </div>
                <div id="novos_campos" class="row">

                </div>
                <div class="seperator"><span>Informações</span></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="prof">Professor Resposável</label>
                            {{ Form::text('name_user', Auth::user()->name, ['class' => 'form-control', 'id' => 'prof', 'aria-required' =>'true' ]) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="prof_email">E-mail</label>
                            {{ Form::email('email', Auth::user()->email, ['class' => 'form-control', 'id' => 'prof_email', 'aria-required' =>'true' ]) }}
                        </div>
                    </div>
                </div>
                <div class="row" id="prof_aux">

                </div>
                <button type="button" id="add_prof" class="btn btn-light btn-xs">+</button>
                <div id="add_escola" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="unidade">Unidade Escolar</label>
                            <!--{{ Form::select('instituicao_id', $instituicoes, 'Selecione uma Unidade', ['class' => 'form-control']) }}-->
                            <select name="unidade" id="unidade">
                                <option value=""> Selecione uma Unidade</option>
                                <option value="63">ADAMANTINA - ETEC ENGº HERVAL BELLUSCI - OP 63</option>
                                <option value="55">ADAMANTINA - ETEC EUDÉCIO LUIZ VICENTE - OP 55</option>
                                <option value="215">AGUAI - ETEC ARNALDO PEREIRA CHEREGATTI - OP 215</option>
                                <option value="6">AMERICANA - ETEC POLIVALENTE DE AMERICANA - OP 6</option>
                                <option value="67">AMPARO - ETEC JOÃO BELARMINO - OP 67</option>
                                <option value="28">ANDRADINA - ETEC SEBASTIANA AUGUSTA DE MORAES - OP 28</option>
                                <option value="281">APIAÍ - ETEC DE APIAÍ - OP 281</option>
                                <option value="165">ARACATUBA - ETEC DE ARAÇATUBA - OP 165</option>
                                <option value="29">ARARAQUARA - ETEC PROFª ANNA DE OLIVEIRA FERRAZ - OP 29</option>
                                <option value="24">ARARAS - ETEC PREFEITO ALBERTO FERES - OP 24</option>
                                <option value="274">ARUJÁ - ETEC PROF LUIZA MARIA MACHADO - OP 274</option>
                                <option value="95">ASSIS - ETEC PEDRO D'ARCÁDIA NETO - OP 95</option>
                                <option value="147">ATIBAIA - ETEC PROF. CARMINE BIAGIO TUNDISI - OP 147</option>
                                <option value="145">AVARE - ETEC PROF. FAUSTO MAZZOLA - OP 145</option>
                                <option value="40">BARRA BONITA - ETEC COMENDADOR JOÃO RAYS - OP 40</option>
                                <option value="108">BARRETOS - ETEC CEL. RAPHAEL BRANDÃO - OP 108</option>
                                <option value="245">BARUERI - ETEC DE BARUERI - OP 245</option>
                                <option value="30">BATATAIS - ETEC ANTONIO DE PADUA CARDOSO - OP 30</option>
                                <option value="135">BAURU - ETEC RODRIGUES DE ABREU - OP 135</option>
                                <option value="151">BEBEDOURO - ETEC PROF. IDIO ZUCCHI - OP 151</option>
                                <option value="51">BOTUCATU - ETEC DR. DOMINGOS MINICUCCI FILHO - OP 51</option>
                                <option value="38">CABRALIA PAULISTA - ETEC ASTOR DE MATOS CARVALHO - OP 38</option>
                                <option value="82">CACAPAVA - ETEC MACHADO DE ASSIS - OP 82</option>
                                <option value="44">CACHOEIRA PAULISTA - ETEC PROF. MARCOS UCHOAS DOS SANTOS - OP 44</option>
                                <option value="62">CAFELANDIA - ETEC PROFª HELCY M. MARTINS AGUIAR - OP 62</option>
                                <option value="279">CAIEIRAS - ETEC DE CAIEIRAS - OP 279</option>
                                <option value="191">CAJAMAR - ETEC GINO REZAGHI - OP 191</option>
                                <option value="43">CAMPINAS - ETEC BENTO QUIRINO - OP 43</option>
                                <option value="7">CAMPINAS - ETEC CONSELHEIRO ANTÔNIO PRADO - OP 7</option>
                                <option value="201">CAMPO LIMPO PAULISTA - ETEC DE CAMPO LIMPO PAULISTA - OP 201</option>
                                <option value="81">CANDIDO MOTA - ETEC PROF. LUIZ PIRES BARBOSA - OP 81</option>
                                <option value="124">CAPAO BONITO - ETEC DR. CELSO CHARURI - OP 124</option>
                                <option value="213">CARAGUATATUBA - ETEC CARAGUATATUBA - OP 213</option>
                                <option value="144">CARAPICUIBA - ETEC&nbsp; CARAPICUIBA - OP 144</option>
                                <option value="59">CASA BRANCA - ETEC DR. FRANCISCO NOGUEIRA DE LIMA - OP 59</option>
                                <option value="54">CATANDUVA - ETEC ELIAS NECHAR - OP 54</option>
                                <option value="72">CERQUEIRA CESAR - ETEC PREFEITO JOSÉ ESTEVES - OP 72</option>
                                <option value="248">CERQUILHO - ETEC DE CERQUILHO - OP 248</option>
                                <option value="222">COTIA - ETEC DE COTIA - OP 222</option>
                                <option value="77">CRUZEIRO - ETEC PROF. JOSÉ SANT'ANA DE CASTRO - OP 77</option>
                                <option value="181">CUBATAO - ETEC DE CUBATÃO - OP 181</option>
                                <option value="166">DIADEMA - ETEC JUSCELINO KUBITSCHECK DE OLIVEIRA - OP 166</option>
                                <option value="52">DRACENA - ETEC PROFª CARMELINA BARBOSA - OP 52</option>
                                <option value="241">EMBU - ETEC DE EMBU - OP 241</option>
                                <option value="47">ESPIRITO STO PINHAL - ETEC DR. CAROLINO DA MOTA E SILVA - OP 47</option>
                                <option value="138">FERNANDOPOLIS - ETEC PROFESSOR ARMANDO JOSÉ FARINAZZO - OP 138</option>
                                <option value="170">FERRAZ VASCONCELOS - ETEC FERRAZ DE VASCONCELOS - OP 170</option>
                                <option value="78">FRANCA - ETEC DR. JÚLIO CARDOSO - OP 78</option>
                                <option value="46">FRANCA - ETEC PROF. CARMELINO CORREA JUNIOR - OP 46</option>
                                <option value="231">FRANCISCO MORATO - ETEC FRANCISCO MORATO - OP 231</option>
                                <option value="142">FRANCO DA ROCHA - ETEC DR. EMILIO H. AGUILAR - OP 142</option>
                                <option value="93">GARCA - ETEC DEP. PAULO ORNELLAS C. DE BARROS - OP 93</option>
                                <option value="88">GARCA - ETEC MONSENHOR ANTONIO MAGLIANO - OP 88</option>
                                <option value="26">GUARATINGUETA - ETEC PROF. ALFREDO DE BARROS SANTOS - OP 26</option>
                                <option value="256">GUARIBA - ETEC BENTO CARLOS BOTELHO DO AMARAL - OP 256</option>
                                <option value="152">GUARUJA - ETEC ALBERTO SANTOS DUMONT - OP 152</option>
                                <option value="115">HORTOLANDIA - ETEC DE HORTOLÂNDIA - OP 115</option>
                                <option value="263">IBATE - ETEC DE IBATÉ - OP 263</option>
                                <option value="161">IBITINGA - ETEC DE IBITINGA - OP 161</option>
                                <option value="33">IGARAPAVA - ETEC ANTONIO JUNQUEIRA DA VEIGA - OP 33</option>
                                <option value="89">IGUAPE - ETEC ENGº AGRÔNOMO NARCISO MEDEIROS - OP 89</option>
                                <option value="65">ILHA SOLTEIRA - ETEC DE ILHA SOLTEIRA - OP 65</option>
                                <option value="97">IPAUSSU - ETEC PEDRO DE LEME BRISOLLA SOBRINHO - OP 97</option>
                                <option value="158">ITANHAEM - ETEC DE ITANHAEM - OP 158</option>
                                <option value="261">ITAPETININGA - ETEC DARCY PEREIRA DE MORAES - OP 261</option>
                                <option value="53">ITAPETININGA - ETEC PROF. EDSON GALVÃO - OP 53</option>
                                <option value="50">ITAPEVA - ETEC DR. DEMÉTRIO AZEVEDO JÚNIOR - OP 50</option>
                                <option value="218">ITAPIRA - ETEC JOÃO MARIA STEVANATTO - OP 218</option>
                                <option value="249">ITAQUAQUECETUBA - ETEC DE ITAQUAQUECETUBA - OP 249</option>
                                <option value="243">ITARARE - ETEC ITARARE - OP 243</option>
                                <option value="100">ITATIBA - ETEC ROSA PERRONE SCAVONE - OP 100</option>
                                <option value="86">ITU - ETEC MARTINHO DI CIERO - OP 86</option>
                                <option value="233">ITUVERAVA - ETEC PROF. JOSÉ IGNÁCIO AZEVEDO FILHO - OP 233</option>
                                <option value="48">JACAREI - ETEC CÔNEGO JOSÉ BENTO - OP 48</option>
                                <option value="73">JALES - ETEC DR. JOSÉ LUIZ VIANA COUTINHO - OP 73</option>
                                <option value="268">JANDIRA - ETEC PREFEITO BRAZ PASCHOALIN - OP 268</option>
                                <option value="70">JAU - ETEC JOAQUIM FERREIRA DO AMARAL - OP 70</option>
                                <option value="90">JAU - ETEC PROF. URIAS FERREIRA - OP 90</option>
                                <option value="42">JUNDIAI - ETEC BENEDITO STORANI - OP 42</option>
                                <option value="8">JUNDIAI - ETEC VASCO ANTONIO VENCHIARUTTI - OP 8</option>
                                <option value="110">LEME - ETEC DEP. SALIM SEDEH - OP 110</option>
                                <option value="244">LENCOIS PAULISTA - ETEC CIDADE DO LIVRO - OP 244</option>
                                <option value="104">LIMEIRA - ETEC TRAJANO CAMARGO - OP 104</option>
                                <option value="148">LINS - ETEC DE LINS - OP 148</option>
                                <option value="240">LORENA - ETEC PADRE CARLOS LEONCIO DA SILVA - OP 240</option>
                                <option value="235">MAIRINQUE - ETEC MAIRINQUE - OP 235</option>
                                <option value="271">Mairiporã - ETEC DE MAIRIPORÃ - OP 271</option>
                                <option value="31">MARILIA - ETEC ANTONIO DEVISATE - OP 31</option>
                                <option value="103">MATAO - ETEC PROF. DR. SYLVIO DE MATTOS CARVALHO - OP 103</option>
                                <option value="128">MAUA - ETEC DE  MAUÁ - OP 128</option>
                                <option value="79">MIGUELOPOLIS - ETEC LAURINDO ALVES DE QUEIROZ - OP 79</option>
                                <option value="87">MIRASSOL - ETEC PROF. MATHEUS LEITE DE ABREU - OP 87</option>
                                <option value="60">MOCOCA - ETEC FRANCISCO GARCIA - OP 60</option>
                                <option value="9">MOCOCA - ETEC JOÃO BATISTA DE LIMA FIGUEIREDO - OP 9</option>
                                <option value="15">MOGI DAS CRUZES - ETEC PRESIDENTE VARGAS - OP 15</option>
                                <option value="206">MOGI GUACU - ETEC EURO ALBINO DE SOUZA - OP 206</option>
                                <option value="96">MOGI-MIRIM - ETEC PEDRO FERREIRA ALVES - OP 96</option>
                                <option value="107">MONGAGUA - ETEC ADOLPHO BEREZIN - OP 107</option>
                                <option value="255">MONTE ALTO - ETEC ALCIDES CESTARI - OP 255</option>
                                <option value="75">MONTE APRAZIVEL - ETEC PADRE JOSÉ NUNES DIAS - OP 75</option>
                                <option value="198">MONTE MOR - ETEC DE MONTE MOR - OP 198</option>
                                <option value="234">NOVA ODESSA - ETEC DE NOVA ODESSA - OP 234</option>
                                <option value="212">NOVO HORIZONTE - ETEC PROF. MARINES TEODORO DE F. ALMEIDA - OP 212</option>
                                <option value="232">OLIMPIA - ETEC DE OLIMPIA - OP 232</option>
                                <option value="25">ORLANDIA - ETEC PROF. ALCIDIO DE SOUZA PRADO - OP 25</option>
                                <option value="242">OSASCO - ETEC DR. CELSO GIGLIO - OP 242</option>
                                <option value="149">OSASCO - ETEC PROF. ANDRÉ BOGASIAN - OP 149</option>
                                <option value="27">OSVALDO CRUZ - ETEC AMIN JUNDI - OP 27</option>
                                <option value="66">OURINHOS - ETEC JACINTO FERREIRA DE SÁ - OP 66</option>
                                <option value="164">PALMITAL - ETEC PROF. MARIO ANTONIO VERZA - OP 164</option>
                                <option value="39">PARAGUACU PAULISTA - ETEC AUGUSTO TORTOLERO ARAUJO - OP 39</option>
                                <option value="69">PENAPOLIS - ETEC JOÃO JORGE GERAISSATE - OP 69</option>
                                <option value="266">PERUIBE - ETEC DE PERUÍBE - OP 266</option>
                                <option value="203">PIEDADE - ETEC DE PIEDADE - OP 203</option>
                                <option value="68">PINDAMONHANGABA - ETEC JOÃO GOMES DE ARAÚJO - OP 68</option>
                                <option value="56">PIRACICABA - ETEC CEL. FERNANDO FEBELIANO DA COSTA - OP 56</option>
                                <option value="193">PIRACICABA - ETEC DEPUTADO ARY DE CAMARGO PEDROSO - OP 193</option>
                                <option value="162">PIRAJU - ETEC WALDYR DURON JUNIOR - OP 162</option>
                                <option value="139">PIRASSUNUNGA - ETEC TENENTE AVIADOR GUSTAVO KLUG - OP 139</option>
                                <option value="210">POA - ETEC DE POÁ - OP 210</option>
                                <option value="289">PORTO FELIZ - ETEC DE PORTO FELIZ - OP 289</option>
                                <option value="202">PORTO FERREIRA - ETEC PROF. JADYR SALLES - OP 202</option>
                                <option value="153">PRAIA GRANDE - ETEC DE PRAIA GRANDE - OP 153</option>
                                <option value="252">PRESIDENTE PRUDENTE - ETEC PROF. ADOLPHO ARRUDA MELLO - OP 252</option>
                                <option value="32">PRESIDENTE PRUDENTE - ETEC PROF. DR. ANTONIO EUFRASIO DE TOLEDO - OP 32</option>
                                <option value="99">PRESIDENTE VENCESLAU - ETEC PROF. MILTON GAZZETTI - OP 99</option>
                                <option value="80">QUATA - ETEC DR. LUIZ CESAR COUTO - OP 80</option>
                                <option value="58">RANCHARIA - ETEC DEP. FRANCISCO FRANCO (CHIQUITO) - OP 58</option>
                                <option value="239">REGISTRO - ETEC DE REGISTRO - OP 239</option>
                                <option value="141">RIBEIRAO PIRES - ETEC PROFESSORA MARIA CRISTINA MEDEIROS - OP 141</option>
                                <option value="74">RIBEIRAO PRETO - ETEC JOSÉ MARTIMIANO DA SILVA - OP 74</option>
                                <option value="36">RIO CLARO - ETEC PROF. ARMANDO BAYEUX DA SILVA - OP 36</option>
                                <option value="71">RIO DAS PEDRAS - ETEC DR. JOSÉ COURY - OP 71</option>
                                <option value="282">RIO GRANDE DA SERRA - ETEC DE RIO GRANDE DA SERRA - OP 282</option>
                                <option value="94">S JOAQUIM DA BARRA - ETEC PEDRO BADRAN - OP 94</option>
                                <option value="83">S RITA PASSA QUATRO - ETEC MANOEL DOS REIS ARAÚJO - OP 83</option>
                                <option value="10">S. BERNARDO DO CAMPO - ETEC LAURO GOMES - OP 10</option>
                                <option value="98">S. JOSE DO RIO PRETO - ETEC PHILADELPHO GOUVEIA NETTO - OP 98</option>
                                <option value="237">S. ROSA DE VITERBO - ETEC DE SANTA ROSA DO VITERBO - OP 237</option>
                                <option value="287">SANTA CRUZ DAS PALMEIRAS - ETEC JOÃO ELIAS MARGUTTI - OP 287</option>
                                <option value="84">SANTA CRUZ RIO PARDO - ETEC ORLANDO QUAGLIATO - OP 84</option>
                                <option value="277">SANTA FÉ DO SUL - ETEC DE SANTA FÉ DO SUL - OP 277</option>
                                <option value="219">SANTA ISABEL - ETEC SANTA ISABEL - OP 219</option>
                                <option value="262">SANTANA DE PARNAIBA - ETEC BARTOLOMEU BUENO DA SILVA - OP 262</option>
                                <option value="187">SANTANA DE PARNAIBA - ETEC PROFª ERMELINDA G. TEIXEIRA - OP 187</option>
                                <option value="14">SANTO ANDRE - ETEC JÚLIO DE MESQUITA - OP 14</option>
                                <option value="35">SANTOS - ETEC ARISTÓTELES FERREIRA - OP 35</option>
                                <option value="122">SANTOS - ETEC DONA ESCOLÁSTICA ROSA - OP 122</option>
                                <option value="11">SAO CAETANO DO SUL - ETEC JORGE STREET - OP 11</option>
                                <option value="91">SAO CARLOS - ETEC PAULINO BOTELHO - OP 91</option>
                                <option value="195">SÃO JOSÉ DOS CAMPOS - ETEC PROFESSORA ILZA NASCIMENTO PINTUS - OP 195</option>
                                <option value="150">SAO JOSE RIO PARDO - ETEC SÃO JOSÉ DO RIO PARDO - OP 150</option>
                                <option value="102">SAO MANUEL - ETEC DONA SEBASTIANA DE BARROS - OP 102</option>
                                <option value="224">SAO PAULO - ETEC ABDIAS DO NASCIMENTO - OP 224</option>
                                <option value="23">SAO PAULO - ETEC ALBERT EINSTEIN - OP 23</option>
                                <option value="45">SAO PAULO - ETEC CARLOS DE CAMPOS - OP 45</option>
                                <option value="223">SAO PAULO - ETEC CEPAM - OP 223</option>
                                <option value="211">SAO PAULO - ETEC DA ZONA LESTE - OP 211</option>
                                <option value="134">SAO PAULO - ETEC DA ZONA SUL - OP 134</option>
                                <option value="180">SAO PAULO - ETEC DE ARTES - OP 180</option>
                                <option value="199">SAO PAULO - ETEC DE CIDADE TIRADENTES - OP 199</option>
                                <option value="267">SAO PAULO - ETEC DE ESPORTES CURT WALTER OTTO BAUMGART - OP 267</option>
                                <option value="118">SÃO PAULO - ETEC DE GUAIANAZES - OP 118</option>
                                <option value="205">SAO PAULO - ETEC DE HELIOPOLIS - OP 205</option>
                                <option value="285">SÃO PAULO - ETEC DE ITAQUERA II - OP 285</option>
                                <option value="18">SAO PAULO - ETEC DE SÃO PAULO - OP 18</option>
                                <option value="172">SAO PAULO - ETEC DE SAPOPEMBA - OP 172</option>
                                <option value="400">SÃO PAULO - ETEC DE TESTE DA ADM CENTRAL - OP 400</option>
                                <option value="185">SAO PAULO - ETEC DE VILA FORMOSA - OP 185</option>
                                <option value="154">SAO PAULO - ETEC DRª MARIA AUGUSTA SARAIVA - OP 154</option>
                                <option value="13">SAO PAULO - ETEC GETULIO VARGAS - OP 13</option>
                                <option value="226">SAO PAULO - ETEC GILDO MARÇAL B. BRANDÃO - OP 226</option>
                                <option value="61">SAO PAULO - ETEC GUARACY SILVEIRA - OP 61</option>
                                <option value="238">SAO PAULO - ETEC IRMÃO AGOSTINA - OP 238</option>
                                <option value="169">SAO PAULO - ETEC ITAQUERA - OP 169</option>
                                <option value="228">SAO PAULO - ETEC JARAGUÁ - OP 228</option>
                                <option value="221">SAO PAULO - ETEC JARDIM ANGELA - OP 221</option>
                                <option value="253">SAO PAULO - ETEC JORNALISTA ROBERTO MARINHO - OP 253</option>
                                <option value="76">SAO PAULO - ETEC JOSÉ ROCHA MENDES - OP 76</option>
                                <option value="247">SAO PAULO - ETEC MANDAQUI - OP 247</option>
                                <option value="85">SAO PAULO - ETEC MARTIN LUTHER KING - OP 85</option>
                                <option value="220">SAO PAULO - ETEC PARQUE BELEM - OP 220</option>
                                <option value="159">SAO PAULO - ETEC PARQUE DA JUVENTUDE - OP 159</option>
                                <option value="229">SAO PAULO - ETEC PAULISTANO - OP 229</option>
                                <option value="34">SAO PAULO - ETEC PROF. APRIGIO GONZAGA - OP 34</option>
                                <option value="41">SAO PAULO - ETEC PROF. BASILIDES DE GODOY - OP 41</option>
                                <option value="64">SAO PAULO - ETEC PROF. HORÁCIO AUGUSTO DA SILVEIRA - OP 64</option>
                                <option value="207">SAO PAULO - ETEC PROFESSOR ADHEMAR BATISTA HEMÉRITAS - OP 207</option>
                                <option value="12">SAO PAULO - ETEC PROFESSOR CAMARGO ARANHA - OP 12</option>
                                <option value="254">SAO PAULO - ETEC PROFª DOROTI QUIOMI KANASHIRO TOYOHARA - OP 254</option>
                                <option value="225">SAO PAULO - ETEC RAPOSO TAVARES - OP 225</option>
                                <option value="260">SAO PAULO - ETEC SANTA IFIGÊNIA - OP 260</option>
                                <option value="227">SAO PAULO - ETEC SÃO MATEUS - OP 227</option>
                                <option value="273">SÃO PAULO - ETEC SEBRAE - OP 273</option>
                                <option value="200">SAO PAULO - ETEC TAKASHI MORITA - OP 200</option>
                                <option value="186">SAO PAULO - ETEC TEREZA APARECIDA CARDOSO NUNES DE OLIVEIRA - OP 186</option>
                                <option value="208">SAO PAULO - ETEC TIQUATIRA - OP 208</option>
                                <option value="230">SAO PAULO - ETEC UIRAPURU - OP 230</option>
                                <option value="236">SAO PEDRO - ETEC GUSTAVO TEIXEIRA - OP 236</option>
                                <option value="116">SAO ROQUE - ETEC DE SÃO ROQUE - OP 116</option>
                                <option value="188">SAO SEBASTIAO - ETEC DE SÃO SEBASTIÃO - OP 188</option>
                                <option value="57">SAO SIMAO - ETEC PROF. FRANCISCO DOS SANTOS - OP 57</option>
                                <option value="194">SAO VICENTE - ETEC &nbsp;DRª RUTH CARDOSO - OP 194</option>
                                <option value="214">SERRANA - ETEC ANGELO CAVALHEIRO - OP 214</option>
                                <option value="264">SOROCABA - ETEC ARMANDO PANNUNZIO - OP 264</option>
                                <option value="16">SOROCABA - ETEC FERNANDO PRESTES - OP 16</option>
                                <option value="17">SOROCABA - ETEC RUBENS DE FARIA E SOUZA - OP 17</option>
                                <option value="117">STA BARBARA D'OESTE - ETEC PROF. DR. JOSÉ DAGNONI - OP 117</option>
                                <option value="190">SUZANO - ETEC DE SUZANO - OP 190</option>
                                <option value="19">TAQUARITINGA - ETEC DR. ADAIL NUNES DA SILVA - OP 19</option>
                                <option value="140">TAQUARITUBA - ETEC PROFª TEREZINHA MONTEIRO DOS SANTOS - OP 140</option>
                                <option value="49">TAQUARIVAI - ETEC DR. DÁRIO PACHECO PEDROSO - OP 49</option>
                                <option value="101">TATUI - ETEC SALES GOMES - OP 101</option>
                                <option value="125">TAUBATE - ETEC DR. GERALDO JOSÉ RODRIGUES ALCKMIN - OP 125</option>
                                <option value="156">TEODORO SAMPAIO - ETEC PROFESSORA NAIR LUCCAS RIBEIRO - OP 156</option>
                                <option value="246">TIETE - ETEC DR. NELSON ALVES VIANNA - OP 246</option>
                                <option value="136">TUPA - ETEC PROF. MASSUYUKI KAWANO - OP 136</option>
                                <option value="179">VARGEM GRANDE DO SUL - ETEC VARGEM GRANDE DO SUL - OP 179</option>
                                <option value="92">VERA CRUZ - ETEC PAULO GUERREIRO FRANCO - OP 92</option>
                                <option value="197">VOTORANTIM - ETEC PROFESSOR ELIAS MIGUEL JUNIOR - OP 197</option>
                                <option value="37">VOTUPORANGA - ETEC FREI ARNALDO MARIA DE ITAPORANGA - OP 37</option>
                            </select>
                        </div>
                    </div>
                    <!--<button type="button" id="add_esc" class="btn btn-light btn-xs">+</button>-->
                    <!--<div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="img">Imagem</label>
                            {{ Form::file('imagem', ['class' => 'form-control required', 'id' => 'img']) }}
                        </div>
                    </div>-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button class="btn" type="submit"><i class="fa fa-paper-plane"></i> Enviar Projeto</button>
                            <button type="button" id="btn_add" class="btn btn-primary"> Inserir campo novo</button>
                        </div>
                    </div>
                </div>
                <!-- </form> -->
                {!! Form::close() !!}
            </div>
        </div>
        <!--END: Castrar Projeto Form-->
</section>
@endsection