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
      endif;
    endif;


    