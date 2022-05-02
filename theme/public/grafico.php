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