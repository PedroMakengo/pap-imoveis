<?php
    if(isset($_POST['logarUsuario'])):
      $email = $_POST['email'] ;
      $senha = md5(md5($_POST['senha']));

      $parametros = [
        ":email" => $email,
        ":senha" => $senha
      ];

      $model = new Model();
      $buscarUsuarios = $model->EXE_QUERY("SELECT * FROM tb_admin WHERE email=:email AND senha=:senha", $parametros);
      if($buscarUsuarios):
        foreach($buscarUsuarios as $mostrar):
          $_SESSION['id']    = $mostrar['id_admin'];
          $_SESSION['nome']  = $mostrar['nome'];
          $_SESSION['email'] = $mostrar['email'];
          $_SESSION['senha'] = $mostrar['senha'];
          $_SESSION['foto']  = $mostrar['foto'];
        endforeach;
        echo "<script>location.href='admin/index.php?id=home'</script>";
      else:
        $buscandoCliente = $model->EXE_QUERY("SELECT * FROM tb_cliente WHERE email_cliente=:email AND senha_cliente=:senha", $parametros);
        if($buscandoCliente):
          foreach($buscandoCliente as $mostrar):
            $_SESSION['id']     = $mostrar['id_cliente'];
            $_SESSION['nome']   = $mostrar['nome_cliente'];
            $_SESSION['email']  = $mostrar['email_cliente'];
            $_SESSION['senha']  = $mostrar['senha_cliente'];
            $_SESSION['foto']   = $mostrar['foto_cliente'];
            $_SESSION['genero'] = $mostrar['genero_cliente'];
            $_SESSION['tel']    = $mostrar['tel_cliente'];
            $_SESSION['bi']     = $mostrar['bi_cliente'];
            $_SESSION['idade']  = $mostrar['idade_cliente'];
          endforeach;
          echo "<script>location.href='user/index.php?id=home'</script>";
        else:
          echo "<script>window.alert('Não existe usuário')</script>";
        endif;
      endif;
    endif;


    