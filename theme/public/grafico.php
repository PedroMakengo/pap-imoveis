<?php

$mensal = new Model();

$janeiro = $mensal->EXE_QUERY("SELECT count(id_feedback) as janeiro FROM tb_feedback
WHERE month(data_registro_feedback	) = 1");
foreach($janeiro as $mostrar):
$janeiro = $mostrar['janeiro'];
endforeach;

$fevereiro = $mensal->EXE_QUERY("SELECT count(id_feedback) as fevereiro FROM tb_feedback
WHERE month(data_registro_feedback	) = 2");
foreach($fevereiro as $mostrar):
$fevereiro = $mostrar['fevereiro'];
endforeach;

$marco = $mensal->EXE_QUERY("SELECT count(id_feedback) as marco FROM tb_feedback
WHERE month(data_registro_feedback	) = 3");
foreach($marco as $mostrar):
$marco = $mostrar['marco'];
endforeach;

$abril = $mensal->EXE_QUERY("SELECT count(id_feedback) as abril FROM tb_feedback
WHERE month(data_registro_feedback	) = 4");
foreach($abril as $mostrar):
$abril = $mostrar['abril'];
endforeach;

$maio = $mensal->EXE_QUERY("SELECT count(id_feedback) as maio FROM tb_feedback
WHERE month(data_registro_feedback	) = 5");
foreach($maio as $mostrar):
$maio = $mostrar['maio'];
endforeach;

$junho = $mensal->EXE_QUERY("SELECT count(id_feedback) as junho FROM tb_feedback
WHERE month(data_registro_feedback	) = 6");
foreach($junho as $mostrar):
$junho = $mostrar['junho'];
endforeach;

$julho = $mensal->EXE_QUERY("SELECT count(id_feedback) as julho FROM tb_feedback
WHERE month(data_registro_feedback	) = 7");
foreach($julho as $mostrar):
$julho = $mostrar['julho'];
endforeach;

$agosto = $mensal->EXE_QUERY("SELECT count(id_feedback) as agosto FROM tb_feedback
WHERE month(data_registro_feedback	) = 8");
foreach($agosto as $mostrar):
$agosto = $mostrar['agosto'];
endforeach;

$setembro = $mensal->EXE_QUERY("SELECT count(id_feedback) as setembro FROM tb_feedback
WHERE month(data_registro_feedback	) = 9");
foreach($setembro as $mostrar):
$setembro = $mostrar['setembro'];
endforeach;

$outubro = $mensal->EXE_QUERY("SELECT count(id_feedback) as outubro FROM tb_feedback
WHERE month(data_registro_feedback	) = 10");
foreach($outubro as $mostrar):
$outubro = $mostrar['outubro'];
endforeach;

$novembro = $mensal->EXE_QUERY("SELECT count(id_feedback) as novembro FROM tb_feedback
WHERE month(data_registro_feedback	) = 11");
foreach($novembro as $mostrar):
$novembro = $mostrar['novembro'];
endforeach;

$dezembro = $mensal->EXE_QUERY("SELECT count(id_feedback) as dezembro FROM tb_feedback
WHERE month(data_registro_feedback	) = 12");
foreach($dezembro as $mostrar):
$dezembro = $mostrar['dezembro'];
endforeach;

$mensalFeedback[] = (int)$janeiro;
$mensalFeedback[] = (int)$fevereiro;
$mensalFeedback[] = (int)$marco;
$mensalFeedback[] = (int)$abril;
$mensalFeedback[] = (int)$maio;
$mensalFeedback[] = (int)$junho;
$mensalFeedback[] = (int)$julho;
$mensalFeedback[] = (int)$agosto;
$mensalFeedback[] = (int)$setembro;
$mensalFeedback[] = (int)$outubro;
$mensalFeedback[] = (int)$novembro;
$mensalFeedback[] = (int)$dezembro;



// ============================== BUSCANDO ARRENDADOR =================================== 
$janeiro1 = $mensal->EXE_QUERY("SELECT count(id_arrendador) as janeiro FROM tb_arrendador
WHERE month(data_registro_arrendador) = 1");
foreach($janeiro1 as $mostrar):
$janeiro1 = $mostrar['janeiro'];
endforeach;

$fevereiro1 = $mensal->EXE_QUERY("SELECT count(id_arrendador) as fevereiro FROM tb_arrendador
WHERE month(data_registro_arrendador) = 2");
foreach($fevereiro1 as $mostrar):
$fevereiro1 = $mostrar['fevereiro'];
endforeach;

$marco1 = $mensal->EXE_QUERY("SELECT count(id_arrendador) as marco FROM tb_arrendador
WHERE month(data_registro_arrendador) = 3");
foreach($marco1 as $mostrar):
$marco1 = $mostrar['marco'];
endforeach;

$abril1 = $mensal->EXE_QUERY("SELECT count(id_arrendador) as abril FROM tb_arrendador
WHERE month(data_registro_arrendador) = 4");
foreach($abril1 as $mostrar):
$abril1 = $mostrar['abril'];
endforeach;

$maio1 = $mensal->EXE_QUERY("SELECT count(id_arrendador) as maio FROM tb_arrendador
WHERE month(data_registro_arrendador) = 5");
foreach($maio1 as $mostrar):
$maio1 = $mostrar['maio'];
endforeach;

$junho1 = $mensal->EXE_QUERY("SELECT count(id_arrendador) as junho FROM tb_arrendador
WHERE month(data_registro_arrendador) = 6");
foreach($junho1 as $mostrar):
$junho1 = $mostrar['junho'];
endforeach;

$julho1 = $mensal->EXE_QUERY("SELECT count(id_arrendador) as julho FROM tb_arrendador
WHERE month(data_registro_arrendador) = 7");
foreach($julho1 as $mostrar):
$julho1 = $mostrar['julho'];
endforeach;

$agosto1 = $mensal->EXE_QUERY("SELECT count(id_arrendador) as agosto FROM tb_arrendador
WHERE month(data_registro_arrendador) = 8");
foreach($agosto1 as $mostrar):
$agosto1 = $mostrar['agosto'];
endforeach;

$setembro1 = $mensal->EXE_QUERY("SELECT count(id_arrendador) as setembro FROM tb_arrendador
WHERE month(data_registro_arrendador) = 9");
foreach($setembro1 as $mostrar):
$setembro1 = $mostrar['setembro'];
endforeach;

$outubro1 = $mensal->EXE_QUERY("SELECT count(id_arrendador) as outubro FROM tb_arrendador
WHERE month(data_registro_arrendador) = 10");
foreach($outubro1 as $mostrar):
$outubro1 = $mostrar['outubro'];
endforeach;

$novembro1 = $mensal->EXE_QUERY("SELECT count(id_arrendador) as novembro FROM tb_arrendador
WHERE month(data_registro_arrendador) = 11");
foreach($novembro1 as $mostrar):
$novembro1 = $mostrar['novembro'];
endforeach;

$dezembro1 = $mensal->EXE_QUERY("SELECT count(id_arrendador) as dezembro FROM tb_arrendador
WHERE month(data_registro_arrendador) = 12");
foreach($dezembro1 as $mostrar):
$dezembro1 = $mostrar['dezembro'];
endforeach;

$mensalArrendador[] = (int)$janeiro1;
$mensalArrendador[] = (int)$fevereiro1;
$mensalArrendador[] = (int)$marco1;
$mensalArrendador[] = (int)$abril1;
$mensalArrendador[] = (int)$maio1;
$mensalArrendador[] = (int)$junho1;
$mensalArrendador[] = (int)$julho1;
$mensalArrendador[] = (int)$agosto1;
$mensalArrendador[] = (int)$setembro1;
$mensalArrendador[] = (int)$outubro1;
$mensalArrendador[] = (int)$novembro1;
$mensalArrendador[] = (int)$dezembro1;


// ================================ REGISTRO DE RENDEIROS ======================================
$janeiro2 = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as janeiro FROM tb_rendeiro
WHERE month(data_registro_rendeiro) = 1");
foreach($janeiro2 as $mostrar):
$janeiro2 = $mostrar['janeiro'];
endforeach;

$fevereiro2 = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as fevereiro FROM tb_rendeiro
WHERE month(data_registro_rendeiro) = 2");
foreach($fevereiro2 as $mostrar):
$fevereiro2 = $mostrar['fevereiro'];
endforeach;

$marco2 = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as marco FROM tb_rendeiro
WHERE month(data_registro_rendeiro) = 3");
foreach($marco2 as $mostrar):
$marco2 = $mostrar['marco'];
endforeach;

$abril2 = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as abril FROM tb_rendeiro
WHERE month(data_registro_rendeiro) = 4");
foreach($abril2 as $mostrar):
$abril2 = $mostrar['abril'];
endforeach;

$maio2 = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as maio FROM tb_rendeiro
WHERE month(data_registro_rendeiro) = 5");
foreach($maio2 as $mostrar):
$maio2 = $mostrar['maio'];
endforeach;

$junho2 = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as junho FROM tb_rendeiro
WHERE month(data_registro_rendeiro) = 6");
foreach($junho2 as $mostrar):
$junho2 = $mostrar['junho'];
endforeach;

$julho2 = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as julho FROM tb_rendeiro
WHERE month(data_registro_rendeiro) = 7");
foreach($julho2 as $mostrar):
$julho2 = $mostrar['julho'];
endforeach;

$agosto2 = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as agosto FROM tb_rendeiro
WHERE month(data_registro_rendeiro) = 8");
foreach($agosto2 as $mostrar):
$agosto2 = $mostrar['agosto'];
endforeach;

$setembro2 = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as setembro FROM tb_rendeiro
WHERE month(data_registro_rendeiro) = 9");
foreach($setembro2 as $mostrar):
$setembro2 = $mostrar['setembro'];
endforeach;

$outubro2 = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as outubro FROM tb_rendeiro
WHERE month(data_registro_rendeiro) = 10");
foreach($outubro2 as $mostrar):
$outubro2 = $mostrar['outubro'];
endforeach;

$novembro2 = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as novembro FROM tb_rendeiro
WHERE month(data_registro_rendeiro) = 11");
foreach($novembro2 as $mostrar):
$novembro2 = $mostrar['novembro'];
endforeach;

$dezembro2 = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as dezembro FROM tb_rendeiro
WHERE month(data_registro_rendeiro) = 12");
foreach($dezembro2 as $mostrar):
$dezembro2 = $mostrar['dezembro'];
endforeach;

$mensalRendeiro[] = (int)$janeiro2;
$mensalRendeiro[] = (int)$fevereiro2;
$mensalRendeiro[] = (int)$marco2;
$mensalRendeiro[] = (int)$abril2;
$mensalRendeiro[] = (int)$maio2;
$mensalRendeiro[] = (int)$junho2;
$mensalRendeiro[] = (int)$julho2;
$mensalRendeiro[] = (int)$agosto2;
$mensalRendeiro[] = (int)$setembro2;
$mensalRendeiro[] = (int)$outubro2;
$mensalRendeiro[] = (int)$novembro2;
$mensalRendeiro[] = (int)$dezembro2;

// ================================ REGISTRO DE ARRENDADORES SEXO ======================================
$newMasculino = $mensal->EXE_QUERY("SELECT count(id_arrendador) as masculino FROM tb_arrendador
WHERE genero_arrendador='M'");
foreach($newMasculino as $mostrar):
$masculino = $mostrar['masculino'];
endforeach;

$newFemenino = $mensal->EXE_QUERY("SELECT count(id_arrendador) as femenino FROM tb_arrendador
WHERE genero_arrendador='F' ");
foreach($newFemenino as $mostrar):
$femenino = $mostrar['femenino'];
endforeach;

$dataArrendador[] = (int)$masculino;
$dataArrendador[] = (int)$femenino;

// ================================ REGISTRO DE RENDEIROS SEXO ======================================
$newMasculino = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as masculino FROM tb_rendeiro
WHERE genero_rendeiro='M'");
foreach($newMasculino as $mostrar):
$masculino1 = $mostrar['masculino'];
endforeach;

$newFemenino = $mensal->EXE_QUERY("SELECT count(id_rendeiro) as femenino FROM tb_rendeiro
WHERE genero_rendeiro='F'");
foreach($newFemenino as $mostrar):
$femenino1 = $mostrar['femenino'];
endforeach;

$dataRendeiro[] = (int)$masculino1;
$dataRendeiro[] = (int)$femenino1;


$imovelArrenda = $mensal->EXE_QUERY("SELECT count(id_imovel) as contaArrenda FROM tb_imovel
WHERE acao_imovel='arrenda'");
foreach($imovelArrenda as $mostrar):
$imovelRenda = $mostrar['contaArrenda'];
endforeach;

$imovelAvenda = $mensal->EXE_QUERY("SELECT count(id_imovel) as contaVenda FROM tb_imovel
WHERE acao_imovel='venda'");
foreach($imovelAvenda as $mostrar):
$imovelVenda = $mostrar['contaVenda'];
endforeach;

$dataImovel[] = (int)$imovelRenda;
$dataImovel[] = (int)$imovelVenda;