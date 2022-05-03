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
        // ARRENDADOR
        $arrendador = $model->EXE_QUERY("SELECT * FROM tb_arrendador WHERE email_arrendador =:email AND senha_arrendador=:senha", $parametros);
        if($arrendador):
          foreach($arrendador as $mostrar):
            $_SESSION['nome']    = $mostrar['nome_arrendador'];
            $_SESSION['email']   = $mostrar['email_arrendador'];
            $_SESSION['senha']   = $mostrar['senha_arrendador'];
            $_SESSION['foto']    = $mostrar['foto_arrendador'];
            $_SESSION['foto']    = $mostrar['bi_arrendador'];
            $_SESSION['idade']   = $mostrar['idade_arrendador'];
            $_SESSION['genero']  = $mostrar['genero_arrendador'];
            $_SESSION['tel']     = $mostrar['tel_arrendador'];
            $_SESSION['morada']  = $mostrar['morada_arrendador'];
          endforeach;
          echo "<script>location.href='admin/index.php?id=home'</script>";
        else:
          echo "<script>window.alert('Usuário não encontrado !!!')</script>";
        endif;
      endif;
    endif;


    