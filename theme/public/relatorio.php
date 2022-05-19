<?php
    include '../../source/model/Config.php';
    include '../../source/model/Model.php';
    include '../assets/mpdf-6.1/mpdf.php';

    switch ($_GET['id']):

      case 'arrendador':
        // Instanciando
          $usuario = new Model();
          $sql = $usuario->EXE_QUERY("SELECT * FROM tb_arrendador");

          $html = "
                <html>
                  <head>
                      <style type='text/css'>
                          body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                          .container {margin: 100px auto !important;}
                          .nav-header {margin: 0px auto;text-align: center;}
                          .mk-title {font-weight: 100;font-size: 18px;}
                          .mk-title-lg {font-weight: 100;font-size: 18px}
                          img {width: 200px}

                          table { width: 100%; border-spacing: 0 0.5rem; }
                          table th {
                            background: #0193F9;
                            font-weight: 400;
                            padding: 1rem 2rem;
                            text-align: left;
                            line-height: 1.5rem;
                          }
                          table td {
                            padding: 1rem 2rem;
                            border: 0;
                            background: #f7f7f7;
                            color: #000 !important;
                          }
                      </style>
                  </head>
                  <body>
                      <div class='container'>
                          <div class='row'>
                              <div class='nav-header'>
                                  <img src='../assets/images/icon/logo-blue.png'>
                                  <h2 class='text-center h5 mk-title'>Sistema de Gestão de Imóveis</h2>
                                  <p class='mt-2'>Relatório de Arrendadores</p>
                              </div>
                          </div>
                          <div class='body-mk mt-4'>
                              <div class='table'>
                                  <table>
                                      <thead>
                                          <tr>
                                              <th style='color: white'>Id</th>
                                              <th style='color: white'>Nome Completo</th>
                                              <th style='color: white'>Idade</th>
                                              <th style='color: white'>Telefone</th>
                                              <th style='color: white'>Genero</th>
                                          </tr>
                                      </thead>
                                      <tbody>
              ";
              foreach ($sql as $mostrar) :
                $genero = $mostrar['generado_arrendador'] === 'M' ? "Masculino": "Femenino";
                $html = $html ."
                                          <tr>
                                            <td>{$mostrar["id_arrendador"] }</td>
                                            <td>{$mostrar["nome_arrendador"] }</td>
                                            <td>{$mostrar["idade_arrendador"] }</td>
                                            <td>{$mostrar["tel_arrendador"] }</td>
                                            <td>{$genero }</td>
                                          </tr>
                ";
                      endforeach;
                      $html = $html."
                                      </tbody>
                                  </table>
                              </div>
                          </div>
              </div>
              ";

          $multa = "index.php";
          $mpdf = new mPDF();
          $mpdf->SetDisplayMode("fullpage");
          $mpdf->WriteHTML($html);
          $mpdf->Output($multa, 'I');
          exit();
      break;

      case 'rendeiro':
        // Instanciando
        $usuario = new Model();
        $sql = $usuario->EXE_QUERY("SELECT * FROM tb_rendeiro");

        $html = "
              <html>
                <head>
                  <style type='text/css'>
                      body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                      .container {margin: 100px auto !important;}
                      .nav-header {margin: 0px auto;text-align: center;}
                      .mk-title {font-weight: 100;font-size: 18px;}
                      .mk-title-lg {font-weight: 100;font-size: 18px}
                      img {width: 200px}

                      table { width: 100%; border-spacing: 0 0.5rem; }
                      table th {
                          background: #0193F9;
                          font-weight: 400;
                          padding: 1rem 2rem;
                          text-align: left;
                          line-height: 1.5rem;
                      }
                      table td {
                          padding: 1rem 2rem;
                          border: 0;
                          background: #f7f7f7;
                          color: #000 !important;
                      }
                  </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='row'>
                            <div class='nav-header'>
                                <img src='../assets/images/icon/logo-blue.png'>
                                <h2 class='text-center h5 mk-title'>Sistema de Gestão de Imóveis</h2>
                                <p class='mt-2'>Relatório de Rendeiros</p>
                            </div>
                        </div>
                        <div class='body-mk mt-4'>
                            <div class='table'>
                                <table>
                                    <thead>
                                        <tr>
                                            <th style='color: white'>Id</th>
                                            <th style='color: white'>Nome Rendeiro</th>
                                            <th style='color: white'>E-mail</th>
                                            <th style='color: white'>B.I</th>
                                            <th style='color: white'>Idade</th>
                                            <th style='color: white'>Genero</th>
                                        </tr>
                                    </thead>
                                    <tbody>
            ";
            foreach ($sql as $mostrar) :
              $genero = $mostrar['genero_rendeiro'] === 'M' ? "Masculino": "Femenino";
              $html = $html ."
                                      <tr>
                                          <td>{$mostrar["id_rendeiro"] }</td>
                                          <td>{$mostrar["nome_rendeiro"] }</td>
                                          <td>{$mostrar["email_rendeiro"] }</td>
                                          <td>{$mostrar["bi_rendeiro"] }</td>
                                          <td>{$mostrar["idade_rendeiro"] }</td>
                                          <td>{$mostrar["tel_cliente"] }</td>
                                      </tr>
              ";
                    endforeach;
                    $html = $html."
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
            ";

        $multa = "index.php";
        $mpdf = new mPDF();
        $mpdf->SetDisplayMode("fullpage");
        $mpdf->WriteHTML($html);
        $mpdf->Output($multa, 'I');
        exit();
      break;

      case 'imovel':
        // Instanciando
        $usuario = new Model();
        $sql = $usuario->EXE_QUERY("SELECT * FROM tb_imovel
        INNER JOIN tb_rendeiro ON tb_imovel.id_rendeiro = tb_rendeiro.id_rendeiro");
        $html = "
              <html>
                <head>
                  <style type='text/css'>
                      body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                      .container {margin: 100px auto !important;}
                      .nav-header {margin: 0px auto;text-align: center;}
                      .mk-title {font-weight: 100;font-size: 18px;}
                      .mk-title-lg {font-weight: 100;font-size: 18px}
                      img {width: 200px}

                      table { width: 100%; border-spacing: 0 0.5rem; }
                      table th {
                          background: #0193F9;
                          font-weight: 400;
                          padding: 1rem 2rem;
                          text-align: left;
                          line-height: 1.5rem;
                      }
                      table td {
                          padding: 1rem 2rem;
                          border: 0;
                          background: #f7f7f7;
                          color: #000 !important;
                      }
                  </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='row'>
                            <div class='nav-header'>
                                <img src='../assets/images/icon/logo-blue.png'>
                                <h2 class='text-center h5 mk-title'>Sistema de Gestão de Imóveis</h2>
                                <p class='mt-2'>Relatório de Imóveis</p>
                            </div>
                        </div>
                        <div class='body-mk mt-4'>
                            <div class='table'>
                                <table>
                                    <thead>
                                        <tr>
                                            <th style='color: white'>Id</th>
                                            <th style='color: white'>Dono Imóvel</th>
                                            <th style='color: white'>Ação</th>
                                            <th style='color: white'>Tipo</th>
                                            <th style='color: white'>Preço</th>
                                            <th style='color: white'>Contacto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
            ";
            foreach ($sql as $mostrar) :
              $html = $html ."
                                        <tr>
                                            <td>{$mostrar["id_imovel"] }</td>
                                            <td>{$mostrar["nome_rendeiro"] }</td>
                                            <td>{$mostrar["acao_imovel"] }</td>
                                            <td>{$mostrar["tipo_imovel"] }</td>
                                            <td>{$mostrar["preco_imovel"] }</td>
                                            <td>{$mostrar["contacto_imovel"] }</td>
                                        </tr>
              ";
                    endforeach;
                    $html = $html."
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
            ";

        $multa = "index.php";
        $mpdf = new mPDF();
        $mpdf->SetDisplayMode("fullpage");
        $mpdf->WriteHTML($html);
        $mpdf->Output($multa, 'I');
        exit();
      break;
      
      case 'feedback':
        // Instanciando
        $usuario = new Model();
        $sql = $usuario->EXE_QUERY("SELECT * FROM tb_feedback");

        $html = "
              <html>
                <head>
                  <style type='text/css'>
                      body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                      .container {margin: 100px auto !important;}
                      .nav-header {margin: 0px auto;text-align: center;}
                      .mk-title {font-weight: 100;font-size: 18px;}
                      .mk-title-lg {font-weight: 100;font-size: 18px}
                      img {width: 200px}

                      table { width: 100%; border-spacing: 0 0.5rem; }
                      table th {
                          background: #0193F9;
                          font-weight: 400;
                          padding: 1rem 2rem;
                          text-align: left;
                          line-height: 1.5rem;
                      }
                      table td {
                          padding: 1rem 2rem;
                          border: 0;
                          background: #f7f7f7;
                          color: #000 !important;
                      }
                  </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='row'>
                            <div class='nav-header'>
                                <img src='../assets/images/icon/logo-blue.png'>
                                <h2 class='text-center h5 mk-title'>Sistema de Gestão de Imóveis</h2>
                                <p class='mt-2'>Relatório de Feedback</p>
                            </div>
                        </div>
                        <div class='body-mk mt-4'>
                            <div class='table'>
                                <table>
                                    <thead>
                                        <tr>
                                            <th style='color: white'>Id</th>
                                            <th style='color: white'>Nome Completo</th>
                                            <th style='color: white'>Contacto</th>
                                            <th style='color: white'>Descrição</th>
                                            <th style='color: white'>Data de registro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
            ";
            foreach ($sql as $mostrar) :
              $html = $html ."
                                        <tr>
                                            <td>{$mostrar["id_feedback"] }</td>
                                            <td>{$mostrar["nome_feedback"] }</td>
                                            <td>{$mostrar["contacto"] }</td>
                                            <td>{$mostrar["descricao_feedback"] }</td>
                                            <td>{$mostrar["data_registro_feedback"] }</td>
                                        </tr>
              ";
                    endforeach;
                    $html = $html."
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
            ";

        $multa = "index.php";
        $mpdf = new mPDF();
        $mpdf->SetDisplayMode("fullpage");
        $mpdf->WriteHTML($html);
        $mpdf->Output($multa, 'I');
        exit();
      break;

      case 'fatura-compra':
        // Instanciando
        $parametros = [
          ":id_imovel" => $_GET['idArrenda'],
        ];
        $usuario = new Model();
        $sql = $usuario->EXE_QUERY("SELECT * FROM tb_compra_renda
        INNER JOIN tb_arrendador ON tb_compra_renda.id_arrendador=tb_arrendador.id_arrendador
        INNER JOIN tb_imovel ON tb_compra_renda.id_imovel=tb_imovel.id_imovel
        INNER JOIN tb_rendeiro ON tb_imovel.id_rendeiro=tb_rendeiro.id_rendeiro
        WHERE tb_compra_renda.id_imovel=:id_imovel", $parametros);
        $html = "
            <html>
                <head>
                    <style type='text/css'>
                        .borda {
                            height: 150vh;
                            padding: 20px;
                        }
                        
                        p {
                            color: #000 !important;
                            font-family: Poppins;
                        }

                        .header {
                            text-align: center;
                            font-weight:bold;
                            background: #0193F9;
                            color: #fff;
                        }

                        .header h1 {
                            font-size: 18px;
                        }

                        .footer {
                            text-align: center;
                            font-weight:bold;
                        }
                        .text-warning {
                            color: yellow;
                        }
                        .text-success {
                            color: green;
                        }

                        p {
                            display: block;
                            background: #f1f1f1;
                            padding: 6px;
                        }

                        .caixa {
                            width: 300px;
                            height: 60px;
                            text-align: center;
                            border-bottom: 1px solid #000;
                        }
                        .caixa1 {
                            width: 300px;
                            height: 60px;
                            text-align: center;
                            margin-top: -60px;
                            float: right;
                            margin-right: -10px;
                            border-bottom: 1px solid #000;
                        } 
                        .caixa-geral{
                            margin-top: 20px;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='body-mk mt-4'>
                            <div class='borda'>";
                            foreach ($sql as $mostrar) :
                            $html = $html ."
                            <div class='flex-paragrafo'>
                            <div style='margin: 0 auto; text-align: center;'>
                            <img src='../assets/images/icon/logo-blue.png' style='width: 200px'>
                            </div>
                            <div class='header'>
                                <h1>CONTRATO DE COMPRA DE IMÓVEL</h1>
                            </div>
                            <div>
                                <p>Nome Completo do Arrendador : <strong>{$mostrar['nome_arrendador'] }</strong> </p>
                            </div>
                            <div>
                                <p>Telefone : <strong>{$mostrar['tel_arrendador'] }</strong> </p>
                            </div>
                            <div>
                                <p>Nº do B.I : <strong>{$mostrar['bi_arrendador'] }</strong> </p>
                            </div>
                            <div>
                                <p>Imóvel em Aquisição : <strong>{$mostrar['tipo_imovel'] }</strong> </p>
                            </div>
                            <div>
                                <p>Tipo de Aquisição : <strong>{$mostrar['acao_imovel'] }</strong> </p>
                            </div>

                        

                            <hr />
                            <div>
                                <p>Nome do Rendeiro : <strong>{$mostrar['nome_rendeiro'] } </strong> </p>
                            </div>
                            <div>
                                <p>Contacto : <strong>{$mostrar['tel_rendeiro'] } </strong> </p>
                            </div>
                            <div>
                                <p>Contacto : <strong>{$mostrar['bi_rendeiro'] } </strong> </p>
                            </div>
                            <div>
                            <p>Localização : <strong>{$mostrar['morada_rendeiro'] } </strong> </p>
                            </div>

                            <hr />

                            <div>
                            <p>As partes acima identificadas têm, entre si, justas e acertadas o 
                            presente Contrato de Compra e Venda de Bem Imóvel entre pessoas Físicas, que se 
                            regerá pelas cláusulas seguintes e pelas condições descritas no presente.</p>
                            </div>

                            <div>
                            <h4 style='text-align: center'>OBJECTIVO</h4>
                            <p>O presente contrato tem como Objectivo a renda de um imóvel no valor de <strong>{$mostrar['preco_imovel'] }</strong> kz situado na 
                                <strong>{$mostrar['local_imovel'] }</strong> de propriedade do Rendeiro
                            </p>
                            </div>

                            <div>
                                <h4 style='text-align: center'>CONTRATO DE COMPRA DE BEM IMÓVEL</h4>
                                <p>Incidam sobre imóvel até a entrega das chaves, momento em que esta obrigação passar à ao Arrendador.<br />

                                O ARRENDADOR se responsabilizará pelas despesas com a transcrição do imóvel, a ser realizada quando da quitação do valor acertado neste instrumento. <br />
                                
                                As chaves do imóvel deverão ser entregues,pelo VENDEDOR ao Arrendador, após o pagamento do valor de entrada acertado neste contrato, 
                                quando da entrega das chaves, o VENDEDOR deverá disponibilizar o imóvel ao COMPRADOR livre de pessoas ou coisas.<br />
                                </p>
                            </div>

                            <div>
                                <h4 style='text-align: center'>MULTA</h4>
                                <p>A parte que der causa a qualquer procedimento judicial, ficar[a sujeita ao pagamento de uma multa de 10,00%
                                (dez por cento) sobre o valor presente contrato, além das custas, honorários advocatícios e outras despesas legais afinal verificadas, o VENDEDOR 
                                se reserva no direito de reter do valor pago pelo imóvel, o valor necessário para a quitação de prestações em atraso, bem como quaisquer
                                despesas ou danos causados indevidamente pelo COMPRADOR, abrangência não só os contratantes mas também aos seus herdeiros e sucessores.
                                </p>
                            </div>
                            
                        

                            <div class='caixa-geral'>
                            <div class='caixa'>
                                <div class='assinatura'></div>
                                <small>Assinatura Vendedor</small>
                            </div>
                            <div class='caixa1'>
                                <div class='assinatura'></div>
                                <small>Assinatura Comprador</small>
                            </div>
                            </div>
                        </div>";
                    endforeach;
                    $html = $html."
                            </div>
                        </div>
                    </div>
                </body>
            ";

        $multa = "index.php";
        $mpdf = new mPDF();
        $mpdf->SetDisplayMode("fullpage");
        $mpdf->WriteHTML($html);
        $mpdf->Output($multa, 'I');
        exit();
      break;

      case 'fatura-renda':
        // Instanciando
        $parametros = [
            ":id_imovel" => $_GET['idArrenda'],
        ];
        $usuario = new Model();
        $sql = $usuario->EXE_QUERY("SELECT * FROM tb_compra_renda
         INNER JOIN tb_arrendador ON tb_compra_renda.id_arrendador=tb_arrendador.id_arrendador
         INNER JOIN tb_imovel ON tb_compra_renda.id_imovel=tb_imovel.id_imovel
         INNER JOIN tb_rendeiro ON tb_imovel.id_rendeiro=tb_rendeiro.id_rendeiro
         WHERE tb_compra_renda.id_imovel=:id_imovel", $parametros);
        $html = "
            <html>
                <head>
                    <style type='text/css'>
                        .borda {
                            height: 150vh;
                            padding: 20px;
                        }
                        
                        p {
                            color: #000 !important;
                            font-family: Poppins;
                        }

                        .header {
                            text-align: center;
                            font-weight:bold;
                            background: #0193F9;
                            color: #fff;
                        }

                        .header h1 {
                            font-size: 18px;
                        }

                        .footer {
                            text-align: center;
                            font-weight:bold;
                        }
                        .text-warning {
                            color: yellow;
                        }
                        .text-success {
                            color: green;
                        }

                        p {
                          display: block;
                        }

                        .caixa {
                          width: 300px;
                          height: 60px;
                          text-align: center;
                          border-bottom: 1px solid #000;
                        }
                        .caixa1 {
                          width: 300px;
                          height: 60px;
                          text-align: center;
                          margin-top: -60px;
                          float: right;
                          margin-right: -10px;
                          border-bottom: 1px solid #000;
                        } 
                        .caixa-geral{
                          margin-top: 20px;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='body-mk mt-4'>
                            <div class='borda'>";
            foreach ($sql as $mostrar) :
            $html = $html ."
                        <div class='flex-paragrafo'>
                            <div style='margin: 0 auto; text-align: center;'>
                              <img src='../assets/images/icon/logo-blue.png' style='width: 200px'>
                            </div>
                            <div class='header'>
                                <h1>CONTRATO DE ARRENDAMENTO</h1>
                            </div>
                            <div>
                                <p>Nome Completo do Arrendador : <strong>{$mostrar['nome_arrendador'] }</strong> </p>
                            </div>
                            <div>
                                <p>Telefone : <strong>{$mostrar['tel_arrendador'] }</strong> </p>
                            </div>
                            <div>
                                <p>Nº do B.I : <strong>{$mostrar['bi_arrendador'] }</strong> </p>
                            </div>
                            <div>
                                <p>Imóvel em Aquisição : <strong>{$mostrar['tipo_imovel'] }</strong> </p>
                            </div>
                            <div>
                                <p>Tipo de Aquisição : <strong>{$mostrar['acao_imovel'] } </strong> </p>
                            </div>
                            <div>
                                <p>Tempo de aquisição : <strong>{$mostrar['tempo_renda'] } meses</strong> </p>
                            </div>

                           

                            <hr />
                            <div>
                                <p>Nome do Rendeiro : <strong>{$mostrar['nome_rendeiro'] } </strong> </p>
                            </div>
                            <div>
                                <p>Contacto : <strong>{$mostrar['tel_rendeiro'] } </strong> </p>
                            </div>
                            <div>
                                <p>Contacto : <strong>{$mostrar['bi_rendeiro'] } </strong> </p>
                            </div>
                            <div>
                              <p>Localização : <strong>{$mostrar['morada_rendeiro'] } </strong> </p>
                            </div>

                            <hr />

                            <div>
                              <p>As partes acima identificadas têm, entre si, justas e acertadas o 
                              presente Contrato de Compra e Venda de Bem Imóvel entre pessoas Físicas, que se 
                              regerá pelas cláusulas seguintes e pelas condições descritas no presente.</p>
                            </div>

                            <div>
                              <h4 style='text-align: center'>OBJECTIVO</h4>
                              <p>O presente contrato tem como Objectivo a renda de um imóvel no valor de <strong>{$mostrar['preco_imovel'] }</strong> kz situado na 
                                <strong>{$mostrar['local_imovel'] } de propriedade do Rendeiro</strong>
                              </p>
                            </div>

                            <div>
                                <h4 style='text-align: center'>CONTRATO DE ARRENDA DE BEM IMÓVEL</h4>
                                <p>Incidam sobre imóvel até a entrega das chaves, momento em que esta obrigação passar à ao Arrendador.<br />

                                O ARRENDADOR se responsabilizará pelas despesas com a transcrição do imóvel, a ser realizada quando da quitação do valor acertado neste instrumento. <br />
                                
                                As chaves do imóvel deverão ser entregues,pelo Rendeiro ao Arrendador, após o pagamento do valor de entrada acertado neste contrato, 
                                quando da entrega das chaves, o RENDEIRO deverá disponibilizar o imóvel ao ARRENDADOR livre de pessoas ou coisas.<br />
                                </p>
                            </div>

                            <div>
                                <h4 style='text-align: center'>MULTA</h4>
                                <p>A parte que der causa a qualquer procedimento judicial, ficar[a sujeita ao pagamento de uma multa de 10,00%
                                (dez por cento) sobre o valor presente contrato, além das custas, honorários advocatícios e outras despesas legais afinal verificadas, o RENDEIRO 
                                se reserva no direito de reter do valor pago pelo imóvel, o valor necessário para a quitação de prestações em atraso, bem como quaisquer
                                despesas ou danos causados indevidamente pelo ARRENDADOR, abrangência não só os contratantes mas também aos seus herdeiros e sucessores.
                                </p>
                            </div>
                            
                           

                            <div class='caixa-geral'>
                              <div class='caixa'>
                                <div class='assinatura'></div>
                                <small>Assinatura Rendeiro</small>
                              </div>
                              <div class='caixa1'>
                                <div class='assinatura'></div>
                                <small>Assinatura Arrendador</small>
                              </div>
                            </div>
                        </div>";
                    endforeach;
                    $html = $html."
                            </div>
                        </div>
                    </div>
                </body>
            ";

        $multa = "index.php";
        $mpdf = new mPDF();
        $mpdf->SetDisplayMode("fullpage");
        $mpdf->WriteHTML($html);
        $mpdf->Output($multa, 'I');
        exit();
      break;
      
      default:
      break;
    endswitch;
?>