drop table if exists alunos_estagios ;
drop table if exists empresas_ramos ;
drop table if exists estabelecimentos_produtos ;
drop table if exists newname_409682840 ;
drop table if exists estagio_formador ;
drop table if exists zonas_transportes ;
drop table if exists Aluno ;
drop table if exists Curso ;
drop table if exists Turmas ;
drop table if exists Empresas ;
drop table if exists Estabelecimentos ;
drop table if exists Responsaveis ;
drop table if exists Estagios ;
drop table if exists Utilizadores ;
drop table if exists Formador ;
drop table if exists Administrativo ;
drop table if exists Transporte ;
drop table if exists Produto ;
drop table if exists Zona ;
drop table if exists Ramo_de_atividade ;
drop table if exists Estagio_Ano_Letivo ;
 
create table alunos_estagios
(
   Aluno_Numero_   Int(11)   not null,
   Estagios_Estagios_ID_   integer   not null,
 
   constraint PK_alunos_estagios primary key (Aluno_Numero_, Estagios_Estagios_ID_)
);
 
create table empresas_ramos
(
   Empresas_n_de_contribuinte_   int(50)   not null,
   Ramo_de_atividade_Ramo_de_atividade_ID_   integer   not null,
 
   constraint PK_empresas_ramos primary key (Empresas_n_de_contribuinte_, Ramo_de_atividade_Ramo_de_atividade_ID_)
);
 
create table estabelecimentos_produtos
(
   Estabelecimentos_Empresas_n_de_contribuinte_   int(50)   not null,
   Estabelecimentos_Estabelecimentos_ID_   integer   not null,
   Produto_Produto_ID_   integer   not null,
 
   constraint PK_estabelecimentos_produtos primary key (Estabelecimentos_Empresas_n_de_contribuinte_, Estabelecimentos_Estabelecimentos_ID_, Produto_Produto_ID_)
);
 
create table newname_409682840
(
   Estabelecimentos_Empresas_n_de_contribuinte_   int(50)   not null,
   Estabelecimentos_Estabelecimentos_ID_   integer   not null,
   Estagio_Ano_Letivo_Estagio_Ano_Letivo_ID_   integer   not null,
 
   constraint PK_newname_409682840 primary key (Estabelecimentos_Empresas_n_de_contribuinte_, Estabelecimentos_Estabelecimentos_ID_, Estagio_Ano_Letivo_Estagio_Ano_Letivo_ID_)
);
 
create table estagio_formador
(
   Estagios_Estagios_ID_   integer   not null,
   Formador_Utilizadores_Utilizadores_ID_   integer   not null,
 
   constraint PK_estagio_formador primary key (Estagios_Estagios_ID_, Formador_Utilizadores_Utilizadores_ID_)
);
 
create table zonas_transportes
(
   Transporte_Transporte_ID_   integer   not null,
   Zona_Zona_ID_   integer   not null,
 
   constraint PK_zonas_transportes primary key (Transporte_Transporte_ID_, Zona_Zona_ID_)
);
 
create table Aluno
(
   Turmas_Turmas_ID   integer   not null,
   Turmas_Turmas_ID   integer   not null,
   Utilizadores_Utilizadores_ID   integer   not null,
   Numero   Int(11)   not null,
   observacoes   varchar(100)   null,
 
   constraint PK_Aluno primary key (Numero)
);
 
create table Curso
(
   Turmas_Turmas_ID   integer   not null,
   codigo   varchar(100)   not null,
   designacao   varchar(100)   null,
 
   constraint PK_Curso primary key (codigo)
);
 
create table Turmas
(
   Turmas_ID   integer   not null,
   Sigla   varchar(100)   null,
   Ano   varchar(100)   null,
   capacidade   int(11)   null,
 
   constraint PK_Turmas primary key (Turmas_ID)
);
 
create table Empresas
(
   n_de_contribuinte   int(50)   not null,
   morada   varchar(100)   null,
   localidade   varchar(100)   null,
   codigo_postal   varchar(100)   null,
   telefone   int(50)   null,
   email   varchar(100)   null,
   website   varchar(100)   null,
   observacoes   varchar(100)   null,
   firma   varchar(100)   null,
   disponibilidade_estagio   Boolean   null,
 
   constraint PK_Empresas primary key (n_de_contribuinte)
);
 
create table Estabelecimentos
(
   Empresas_n_de_contribuinte   int(50)   not null,
   Zona_Zona_ID   integer   not null,
   Estabelecimentos_ID   integer   not null,
   nome_comercial   varchar(100)   null,
   morada   varchar(100)   null,
   telefone   varchar(100)   null,
   foto   integer   null,
   horario   varchar(100)   null,
   data_fundacao   varchar(100)   null,
   aceitacao_de_estagios   Boolean   null,
   produtos   varchar(100)   null,
   localidade   varchar(100)   null,
   codigo_postal   varchar(100)   null,
   id_estabelecimento   int(11)   null,
   numero_max_estagiarios   int(11)   null,
 
   constraint PK_Estabelecimentos primary key (Empresas_n_de_contribuinte, Estabelecimentos_ID)
);
 
create table Responsaveis
(
   Estabelecimentos_Empresas_n_de_contribuinte   int(50)   not null,
   Estabelecimentos_Estabelecimentos_ID   integer   not null,
   Estagios_Estagios_ID   integer   not null,
   Responsaveis_ID   integer   not null,
   nome   varchar(100)   null,
   titulo   varchar(100)   null,
   cargo   varchar(100)   null,
   telefone_direto   int(100)   null,
   observacoes   varchar(100)   null,
   telemovel   int(100)   null,
   email   varchar(100)   null,
 
   constraint PK_Responsaveis primary key (Responsaveis_ID)
);
 
create table Estagios
(
   Estabelecimentos_Empresas_n_de_contribuinte   int(50)   not null,
   Estabelecimentos_Estabelecimentos_ID   integer   not null,
   Responsaveis_Responsaveis_ID   integer   not null,
   Estagios_ID   integer   not null,
   data_de_inicio   varchar(100)   null,
   nota_dada_empresa   int(11)   null,
   data_de_fim   varchar(100)   null,
   nota_dada_escola   int(11)   null,
   nota_procura_estagio   int(11)   null,
   nota_relatorio_estagio   int(11)   null,
   nota_estagio_final_media   int(11)   null,
   classificacao_aluno_estagio   int(11)   null,
 
   constraint PK_Estagios primary key (Estagios_ID)
);
 
create table Utilizadores
(
   Utilizadores_ID   integer   not null,
   id_utilizador   int(11)   null,
   nome   varchar(100)   null,
   login   varchar(100)   null,
   password   varchar(100)   null,
 
   constraint PK_Utilizadores primary key (Utilizadores_ID)
);
 
create table Formador
(
   Utilizadores_Utilizadores_ID   integer   not null,
   n_formador   int(11)   null,
   disciplina   varchar(100)   null,
 
   constraint PK_Formador primary key (Utilizadores_Utilizadores_ID)
);
 
create table Administrativo
(
   Utilizadores_Utilizadores_ID   integer   not null,
   id_admin   int(11)   null,
 
   constraint PK_Administrativo primary key (Utilizadores_Utilizadores_ID)
);
 
create table Transporte
(
   Transporte_ID   integer   not null,
   tipo_de_transporte   varchar(100)   null,
   linha   varchar(100)   null,
   observacoes   varchar(100)   null,
 
   constraint PK_Transporte primary key (Transporte_ID)
);
 
create table Produto
(
   Produto_ID   integer   not null,
   nome   varchar(100)   null,
   marca   varchar(100)   null,
 
   constraint PK_Produto primary key (Produto_ID)
);
 
create table Zona
(
   Zona_ID   integer   not null,
   designacao   varchar(100)   null,
   localidade   varchar(100)   null,
   mapa   integer   null,
   transportes   varchar(100)   null,
 
   constraint PK_Zona primary key (Zona_ID)
);
 
create table Ramo_de_atividade
(
   Ramo_de_atividade_ID   integer   not null,
   codigoCAE   varchar(100)   null,
   descricao   varchar(100)   null,
 
   constraint PK_Ramo_de_atividade primary key (Ramo_de_atividade_ID)
);
 
create table Estagio_Ano_Letivo
(
   Estagio_Ano_Letivo_ID   integer   not null,
   ano_letivo   int(11)   null,
   media_classificacao   int(11)   null,
 
   constraint PK_Estagio_Ano_Letivo primary key (Estagio_Ano_Letivo_ID)
);
 
alter table alunos_estagios
   add constraint FK_Aluno_alunos_estagios_Estagios_ foreign key (Aluno_Numero_)
   references Aluno(Numero)
   on delete cascade
   on update cascade
; 
alter table alunos_estagios
   add constraint FK_Estagios_alunos_estagios_Aluno_ foreign key (Estagios_Estagios_ID_)
   references Estagios(Estagios_ID)
   on delete cascade
   on update cascade
;
 
alter table empresas_ramos
   add constraint FK_Empresas_empresas_ramos_Ramo_de_atividade_ foreign key (Empresas_n_de_contribuinte_)
   references Empresas(n_de_contribuinte)
   on delete cascade
   on update cascade
; 
alter table empresas_ramos
   add constraint FK_Ramo_de_atividade_empresas_ramos_Empresas_ foreign key (Ramo_de_atividade_Ramo_de_atividade_ID_)
   references Ramo_de_atividade(Ramo_de_atividade_ID)
   on delete cascade
   on update cascade
;
 
alter table estabelecimentos_produtos
   add constraint FK_Estabelecimentos_estabelecimentos_produtos_Produto_ foreign key (Estabelecimentos_Empresas_n_de_contribuinte_, Estabelecimentos_Estabelecimentos_ID_)
   references Estabelecimentos(Empresas_n_de_contribuinte, Estabelecimentos_ID)
   on delete cascade
   on update cascade
; 
alter table estabelecimentos_produtos
   add constraint FK_Produto_estabelecimentos_produtos_Estabelecimentos_ foreign key (Produto_Produto_ID_)
   references Produto(Produto_ID)
   on delete cascade
   on update cascade
;
 
alter table newname_409682840
   add constraint FK_Estabelecimentos_newname_409682840_Estagio_Ano_Letivo_ foreign key (Estabelecimentos_Empresas_n_de_contribuinte_, Estabelecimentos_Estabelecimentos_ID_)
   references Estabelecimentos(Empresas_n_de_contribuinte, Estabelecimentos_ID)
   on delete cascade
   on update cascade
; 
alter table newname_409682840
   add constraint FK_Estagio_Ano_Letivo_newname_409682840_Estabelecimentos_ foreign key (Estagio_Ano_Letivo_Estagio_Ano_Letivo_ID_)
   references Estagio_Ano_Letivo(Estagio_Ano_Letivo_ID)
   on delete cascade
   on update cascade
;
 
alter table estagio_formador
   add constraint FK_Estagios_estagio_formador_Formador_ foreign key (Estagios_Estagios_ID_)
   references Estagios(Estagios_ID)
   on delete cascade
   on update cascade
; 
alter table estagio_formador
   add constraint FK_Formador_estagio_formador_Estagios_ foreign key (Formador_Utilizadores_Utilizadores_ID_)
   references Formador(Utilizadores_Utilizadores_ID)
   on delete cascade
   on update cascade
;
 
alter table zonas_transportes
   add constraint FK_Transporte_zonas_transportes_Zona_ foreign key (Transporte_Transporte_ID_)
   references Transporte(Transporte_ID)
   on delete cascade
   on update cascade
; 
alter table zonas_transportes
   add constraint FK_Zona_zonas_transportes_Transporte_ foreign key (Zona_Zona_ID_)
   references Zona(Zona_ID)
   on delete cascade
   on update cascade
;
 
alter table Aluno
   add constraint FK_Aluno_aluno_turma_Turmas foreign key (Turmas_Turmas_ID)
   references Turmas(Turmas_ID)
   on delete restrict
   on update cascade
; 
alter table Aluno
   add constraint FK_Aluno_turma_aluno_Turmas foreign key (Turmas_Turmas_ID)
   references Turmas(Turmas_ID)
   on delete restrict
   on update cascade
; 
alter table Aluno
   add constraint FK_Aluno_Utilizadores foreign key (Utilizadores_Utilizadores_ID)
   references Utilizadores(Utilizadores_ID)
   on delete cascade
   on update cascade
;
 
alter table Curso
   add constraint FK_Curso_curso_turma_Turmas foreign key (Turmas_Turmas_ID)
   references Turmas(Turmas_ID)
   on delete restrict
   on update cascade
;
 
 
 
alter table Estabelecimentos
   add constraint FK_Estabelecimentos_empresas_estabelecimentos_Empresas foreign key (Empresas_n_de_contribuinte)
   references Empresas(n_de_contribuinte)
   on delete cascade
   on update cascade
; 
alter table Estabelecimentos
   add constraint FK_Estabelecimentos_estabelecimento_zona_Zona foreign key (Zona_Zona_ID)
   references Zona(Zona_ID)
   on delete restrict
   on update cascade
;
 
alter table Responsaveis
   add constraint FK_Responsaveis_estabelecimento_responsaveis_Estabelecimentos foreign key (Estabelecimentos_Empresas_n_de_contribuinte, Estabelecimentos_Estabelecimentos_ID)
   references Estabelecimentos(Empresas_n_de_contribuinte, Estabelecimentos_ID)
   on delete restrict
   on update cascade
; 
alter table Responsaveis
   add constraint FK_Responsaveis_estagio_responsavel_Estagios foreign key (Estagios_Estagios_ID)
   references Estagios(Estagios_ID)
   on delete restrict
   on update cascade
;
 
alter table Estagios
   add constraint FK_Estagios_estabelecimento_estagios_Estabelecimentos foreign key (Estabelecimentos_Empresas_n_de_contribuinte, Estabelecimentos_Estabelecimentos_ID)
   references Estabelecimentos(Empresas_n_de_contribuinte, Estabelecimentos_ID)
   on delete restrict
   on update cascade
; 
alter table Estagios
   add constraint FK_Estagios_estagio_responsavel_Responsaveis foreign key (Responsaveis_Responsaveis_ID)
   references Responsaveis(Responsaveis_ID)
   on delete restrict
   on update cascade
;
 
 
alter table Formador
   add constraint FK_Formador_Utilizadores foreign key (Utilizadores_Utilizadores_ID)
   references Utilizadores(Utilizadores_ID)
   on delete cascade
   on update cascade
;
 
alter table Administrativo
   add constraint FK_Administrativo_Utilizadores foreign key (Utilizadores_Utilizadores_ID)
   references Utilizadores(Utilizadores_ID)
   on delete cascade
   on update cascade
;
 
 
 
 
 
 
