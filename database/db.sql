CREATE TABLE tb_admin(
  id_admin int(11) PRIMARY KEY AUTO_INCREMENT,
  nome_admin varchar(50),
  email_admin varchar(50),
  senha_admin varchar(50),
  foto_admin varchar(500)
);

INSERT INTO tb_admin (id_admin, nome_admin, email_admin,  senha_admin, foto_admin) 
VALUES (1, "Reis ITEL", "reis2022@gmail.com", md5(md5(123)), "reis.jpg");

CREATE TABLE tb_rendeiro(
  id_rendeiro int(11) PRIMARY KEY AUTO_INCREMENT,
  nome_rendeiro varchar(50),
  email_rendeiro varchar(50),
  senha_rendeiro varchar(50),
  foto_rendeiro varchar(500),
  estado_rendeiro int(2),
  bi_rendeiro varchar(20),
  idade_rendeiro int(2),
  genero_rendeiro varchar(50),
  tel_rendeiro int(9),
  morada_rendeiro varchar(50),
  nif_rendeiro varchar(50)
  data_registro_rendeiro datetime
);

CREATE TABLE tb_arrendador(
  id_arrendador int(11) PRIMARY KEY AUTO_INCREMENT,
  nome_arrendador varchar(50),
  email_arrendador varchar(50),
);

CREATE TABLE tb_imovel(
  id_imovel int(11) PRIMARY KEY AUTO_INCREMENT,
  id_rendeiro int(11),
  acao_imovel varchar(20), // Arrenda ou venda//
  provincia_imovel varchar(50),
  municipio_imovel varchar(50),
  preco_imovel int(4),
  foto_primario varchar(500),
  foto_secundario varchar(500),
  foto_terceiro varchar(500),
  contacto_imovel int(9),
  descricao_imovel text,
  estado_imovel int(1),
  data_registro_imovel datetime,
  FOREIGN KEY (id_rendeiro) REFERENCES tb_rendeiro(id_rendeiro)
);

CREATE TABLE tb_compra_renda(
  id_compra_renda int(11) PRIMARY KEY AUTO_INCREMENT,
  id_imovel int(11),
  id_arrendador int(11),
  tipo_compra_renda varchar(20), // Tipo vai ser renda ou compra
  estado_compra_renda int(2),
  data_registro_compra datetime,
  FOREIGN KEY (id_imovel) REFERENCES tb_imovel(id_imovel),
  FOREIGN KEY (id_arrendador) REFERENCES tb_arrendador(id_arrendador)
);

CREATE TABLE tb_feedback(
  id_feedback int(11) PRIMARY KEY AUTO_INCREMENT,
  nome_feedback varchar(50),
  contacto_feedback int(9),
  descricao_feedback text,
  estado_feedback int(2),
  data_registro_feedback datetime
);
