-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Out-2025 às 11:42
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `siestagios_v5`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrativo`
--

CREATE TABLE `administrativo` (
  `Utilizadores_Utilizadores_ID` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `Turmas_Sigla` varchar(100) NOT NULL,
  `Utilizadores_Utilizadores_ID` int(11) NOT NULL,
  `Numero` int(11) NOT NULL,
  `observacoes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_estagios`
--

CREATE TABLE `alunos_estagios` (
  `Aluno_Numero_` int(11) NOT NULL,
  `Estagios_Estagios_ID_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ano_letivo`
--

CREATE TABLE `ano_letivo` (
  `Ano_Letivo_ID` int(11) NOT NULL,
  `ano_letivo` int(11) DEFAULT NULL,
  `media_classificacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `codigo` varchar(100) NOT NULL,
  `designacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `n_de_contribuinte` int(50) NOT NULL,
  `morada` varchar(100) DEFAULT NULL,
  `localidade` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(11) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `observacoes` varchar(100) DEFAULT NULL,
  `firma` varchar(100) DEFAULT NULL,
  `disponibilidade_estagio` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas_ramos`
--

CREATE TABLE `empresas_ramos` (
  `Empresas_n_de_contribuinte_` int(50) NOT NULL,
  `Ramo_de_atividade_Ramo_de_atividade_ID_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimentos`
--

CREATE TABLE `estabelecimentos` (
  `Empresas_n_de_contribuinte` int(50) NOT NULL,
  `Responsaveis_Responsaveis_ID` int(11) NOT NULL,
  `Zona_Zona_ID` int(11) NOT NULL,
  `Ano_Letivo_Ano_Letivo_ID` int(11) NOT NULL,
  `Estabelecimentos_ID` int(11) NOT NULL,
  `nome_comercial` varchar(100) DEFAULT NULL,
  `morada` varchar(100) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `foto` blob DEFAULT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `data_fundacao` date DEFAULT NULL,
  `aceitacao_de_estagios` tinyint(1) DEFAULT NULL,
  `localidade` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(100) DEFAULT NULL,
  `numero_max_estagiarios` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimentos_produtos`
--

CREATE TABLE `estabelecimentos_produtos` (
  `Estabelecimentos_Empresas_n_de_contribuinte_` int(50) NOT NULL,
  `Estabelecimentos_Estabelecimentos_ID_` int(11) NOT NULL,
  `Produto_Produto_ID_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estagios`
--

CREATE TABLE `estagios` (
  `Estabelecimentos_Empresas_n_de_contribuinte` int(50) NOT NULL,
  `Estabelecimentos_Estabelecimentos_ID` int(11) NOT NULL,
  `Responsaveis_Responsaveis_ID` int(11) NOT NULL,
  `Ano_Letivo_Ano_Letivo_ID` int(11) NOT NULL,
  `Estagios_ID` int(11) NOT NULL,
  `data_de_inicio` date DEFAULT NULL,
  `nota_dada_empresa` int(5) DEFAULT NULL,
  `data_de_fim` date DEFAULT NULL,
  `nota_dada_escola` int(5) DEFAULT NULL,
  `nota_procura_estagio` int(5) DEFAULT NULL,
  `nota_relatorio_estagio` int(5) DEFAULT NULL,
  `nota_estagio_final_media` int(5) DEFAULT NULL,
  `classificacao_aluno_estagio` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estagio_formador`
--

CREATE TABLE `estagio_formador` (
  `Estagios_Estagios_ID_` int(11) NOT NULL,
  `Formador_n_formador_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formador`
--

CREATE TABLE `formador` (
  `Utilizadores_Utilizadores_ID` int(11) NOT NULL,
  `n_formador` int(11) NOT NULL,
  `disciplina` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `Produto_ID` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ramo_de_atividade`
--

CREATE TABLE `ramo_de_atividade` (
  `Ramo_de_atividade_ID` int(11) NOT NULL,
  `codigoCAE` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsaveis`
--

CREATE TABLE `responsaveis` (
  `Estabelecimentos_Empresas_n_de_contribuinte` int(50) NOT NULL,
  `Estabelecimentos_Estabelecimentos_ID` int(11) NOT NULL,
  `Estagios_Estagios_ID` int(11) NOT NULL,
  `Responsaveis_ID` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `telefone_direto` int(11) DEFAULT NULL,
  `observacoes` varchar(100) DEFAULT NULL,
  `telemovel` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transporte`
--

CREATE TABLE `transporte` (
  `Transporte_ID` int(11) NOT NULL,
  `tipo_de_transporte` varchar(100) DEFAULT NULL,
  `linha` varchar(100) DEFAULT NULL,
  `observacoes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `Curso_codigo` varchar(100) NOT NULL,
  `Sigla` varchar(100) NOT NULL,
  `Ano` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `Utilizadores_ID` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `zona`
--

CREATE TABLE `zona` (
  `Zona_ID` int(11) NOT NULL,
  `designacao` varchar(100) DEFAULT NULL,
  `localidade` varchar(100) DEFAULT NULL,
  `mapa` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `zonas_transportes`
--

CREATE TABLE `zonas_transportes` (
  `Transporte_Transporte_ID_` int(11) NOT NULL,
  `Zona_Zona_ID_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrativo`
--
ALTER TABLE `administrativo`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `FK_Administrativo_Utilizadores` (`Utilizadores_Utilizadores_ID`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `FK_Aluno_turma_aluno_Turmas` (`Turmas_Sigla`),
  ADD KEY `FK_Aluno_Utilizadores` (`Utilizadores_Utilizadores_ID`);

--
-- Índices para tabela `alunos_estagios`
--
ALTER TABLE `alunos_estagios`
  ADD PRIMARY KEY (`Aluno_Numero_`,`Estagios_Estagios_ID_`),
  ADD KEY `FK_Estagios_alunos_estagios_Aluno_` (`Estagios_Estagios_ID_`);

--
-- Índices para tabela `ano_letivo`
--
ALTER TABLE `ano_letivo`
  ADD PRIMARY KEY (`Ano_Letivo_ID`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`n_de_contribuinte`);

--
-- Índices para tabela `empresas_ramos`
--
ALTER TABLE `empresas_ramos`
  ADD PRIMARY KEY (`Empresas_n_de_contribuinte_`,`Ramo_de_atividade_Ramo_de_atividade_ID_`),
  ADD KEY `FK_Ramo_de_atividade_empresas_ramos_Empresas_` (`Ramo_de_atividade_Ramo_de_atividade_ID_`);

--
-- Índices para tabela `estabelecimentos`
--
ALTER TABLE `estabelecimentos`
  ADD PRIMARY KEY (`Empresas_n_de_contribuinte`,`Estabelecimentos_ID`),
  ADD KEY `FK_Estabelecimentos_estabelecimento_responsaveis_Responsaveis` (`Responsaveis_Responsaveis_ID`),
  ADD KEY `FK_Estabelecimentos_estabelecimento_zona_Zona` (`Zona_Zona_ID`),
  ADD KEY `FK_Estabelecimentos_noname_Ano_Letivo` (`Ano_Letivo_Ano_Letivo_ID`);

--
-- Índices para tabela `estabelecimentos_produtos`
--
ALTER TABLE `estabelecimentos_produtos`
  ADD PRIMARY KEY (`Estabelecimentos_Empresas_n_de_contribuinte_`,`Estabelecimentos_Estabelecimentos_ID_`,`Produto_Produto_ID_`),
  ADD KEY `FK_Produto_estabelecimentos_produtos_Estabelecimentos_` (`Produto_Produto_ID_`);

--
-- Índices para tabela `estagios`
--
ALTER TABLE `estagios`
  ADD PRIMARY KEY (`Estagios_ID`),
  ADD KEY `FK_Estagios_estabelecimento_estagios_Estabelecimentos` (`Estabelecimentos_Empresas_n_de_contribuinte`,`Estabelecimentos_Estabelecimentos_ID`),
  ADD KEY `FK_Estagios_estagio_responsavel_Responsaveis` (`Responsaveis_Responsaveis_ID`),
  ADD KEY `FK_Estagios_noname_Ano_Letivo` (`Ano_Letivo_Ano_Letivo_ID`);

--
-- Índices para tabela `estagio_formador`
--
ALTER TABLE `estagio_formador`
  ADD PRIMARY KEY (`Estagios_Estagios_ID_`,`Formador_n_formador_`),
  ADD KEY `FK_Formador_estagio_formador_Estagios_` (`Formador_n_formador_`);

--
-- Índices para tabela `formador`
--
ALTER TABLE `formador`
  ADD PRIMARY KEY (`n_formador`),
  ADD KEY `FK_Formador_Utilizadores` (`Utilizadores_Utilizadores_ID`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`Produto_ID`);

--
-- Índices para tabela `ramo_de_atividade`
--
ALTER TABLE `ramo_de_atividade`
  ADD PRIMARY KEY (`Ramo_de_atividade_ID`);

--
-- Índices para tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  ADD PRIMARY KEY (`Responsaveis_ID`),
  ADD KEY `FK_Responsaveis_estabelecimento_responsaveis_Estabelecimentos` (`Estabelecimentos_Empresas_n_de_contribuinte`,`Estabelecimentos_Estabelecimentos_ID`),
  ADD KEY `FK_Responsaveis_estagio_responsavel_Estagios` (`Estagios_Estagios_ID`);

--
-- Índices para tabela `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`Transporte_ID`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`Sigla`),
  ADD KEY `FK_Turmas_curso_turma_Curso` (`Curso_codigo`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`Utilizadores_ID`);

--
-- Índices para tabela `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`Zona_ID`);

--
-- Índices para tabela `zonas_transportes`
--
ALTER TABLE `zonas_transportes`
  ADD PRIMARY KEY (`Transporte_Transporte_ID_`,`Zona_Zona_ID_`),
  ADD KEY `FK_Zona_zonas_transportes_Transporte_` (`Zona_Zona_ID_`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrativo`
--
ALTER TABLE `administrativo`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ano_letivo`
--
ALTER TABLE `ano_letivo`
  MODIFY `Ano_Letivo_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estagios`
--
ALTER TABLE `estagios`
  MODIFY `Estagios_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `formador`
--
ALTER TABLE `formador`
  MODIFY `n_formador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `Produto_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ramo_de_atividade`
--
ALTER TABLE `ramo_de_atividade`
  MODIFY `Ramo_de_atividade_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  MODIFY `Responsaveis_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transporte`
--
ALTER TABLE `transporte`
  MODIFY `Transporte_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `Utilizadores_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `zona`
--
ALTER TABLE `zona`
  MODIFY `Zona_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `administrativo`
--
ALTER TABLE `administrativo`
  ADD CONSTRAINT `FK_Administrativo_Utilizadores` FOREIGN KEY (`Utilizadores_Utilizadores_ID`) REFERENCES `utilizadores` (`Utilizadores_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `FK_Aluno_Utilizadores` FOREIGN KEY (`Utilizadores_Utilizadores_ID`) REFERENCES `utilizadores` (`Utilizadores_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Aluno_aluno_turma_Turmas` FOREIGN KEY (`Turmas_Sigla`) REFERENCES `turmas` (`Sigla`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Aluno_turma_aluno_Turmas` FOREIGN KEY (`Turmas_Sigla`) REFERENCES `turmas` (`Sigla`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `alunos_estagios`
--
ALTER TABLE `alunos_estagios`
  ADD CONSTRAINT `FK_Aluno_alunos_estagios_Estagios_` FOREIGN KEY (`Aluno_Numero_`) REFERENCES `aluno` (`Numero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Estagios_alunos_estagios_Aluno_` FOREIGN KEY (`Estagios_Estagios_ID_`) REFERENCES `estagios` (`Estagios_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `empresas_ramos`
--
ALTER TABLE `empresas_ramos`
  ADD CONSTRAINT `FK_Empresas_empresas_ramos_Ramo_de_atividade_` FOREIGN KEY (`Empresas_n_de_contribuinte_`) REFERENCES `empresas` (`n_de_contribuinte`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Ramo_de_atividade_empresas_ramos_Empresas_` FOREIGN KEY (`Ramo_de_atividade_Ramo_de_atividade_ID_`) REFERENCES `ramo_de_atividade` (`Ramo_de_atividade_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `estabelecimentos`
--
ALTER TABLE `estabelecimentos`
  ADD CONSTRAINT `FK_Estabelecimentos_empresas_estabelecimentos_Empresas` FOREIGN KEY (`Empresas_n_de_contribuinte`) REFERENCES `empresas` (`n_de_contribuinte`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Estabelecimentos_estabelecimento_responsaveis_Responsaveis` FOREIGN KEY (`Responsaveis_Responsaveis_ID`) REFERENCES `responsaveis` (`Responsaveis_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Estabelecimentos_estabelecimento_zona_Zona` FOREIGN KEY (`Zona_Zona_ID`) REFERENCES `zona` (`Zona_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Estabelecimentos_noname_Ano_Letivo` FOREIGN KEY (`Ano_Letivo_Ano_Letivo_ID`) REFERENCES `ano_letivo` (`Ano_Letivo_ID`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `estabelecimentos_produtos`
--
ALTER TABLE `estabelecimentos_produtos`
  ADD CONSTRAINT `FK_Estabelecimentos_estabelecimentos_produtos_Produto_` FOREIGN KEY (`Estabelecimentos_Empresas_n_de_contribuinte_`,`Estabelecimentos_Estabelecimentos_ID_`) REFERENCES `estabelecimentos` (`Empresas_n_de_contribuinte`, `Estabelecimentos_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Produto_estabelecimentos_produtos_Estabelecimentos_` FOREIGN KEY (`Produto_Produto_ID_`) REFERENCES `produto` (`Produto_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `estagios`
--
ALTER TABLE `estagios`
  ADD CONSTRAINT `FK_Estagios_estabelecimento_estagios_Estabelecimentos` FOREIGN KEY (`Estabelecimentos_Empresas_n_de_contribuinte`,`Estabelecimentos_Estabelecimentos_ID`) REFERENCES `estabelecimentos` (`Empresas_n_de_contribuinte`, `Estabelecimentos_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Estagios_estagio_responsavel_Responsaveis` FOREIGN KEY (`Responsaveis_Responsaveis_ID`) REFERENCES `responsaveis` (`Responsaveis_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Estagios_noname_Ano_Letivo` FOREIGN KEY (`Ano_Letivo_Ano_Letivo_ID`) REFERENCES `ano_letivo` (`Ano_Letivo_ID`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `estagio_formador`
--
ALTER TABLE `estagio_formador`
  ADD CONSTRAINT `FK_Estagios_estagio_formador_Formador_` FOREIGN KEY (`Estagios_Estagios_ID_`) REFERENCES `estagios` (`Estagios_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Formador_estagio_formador_Estagios_` FOREIGN KEY (`Formador_n_formador_`) REFERENCES `formador` (`n_formador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `formador`
--
ALTER TABLE `formador`
  ADD CONSTRAINT `FK_Formador_Utilizadores` FOREIGN KEY (`Utilizadores_Utilizadores_ID`) REFERENCES `utilizadores` (`Utilizadores_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  ADD CONSTRAINT `FK_Responsaveis_estabelecimento_responsaveis_Estabelecimentos` FOREIGN KEY (`Estabelecimentos_Empresas_n_de_contribuinte`,`Estabelecimentos_Estabelecimentos_ID`) REFERENCES `estabelecimentos` (`Empresas_n_de_contribuinte`, `Estabelecimentos_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Responsaveis_estagio_responsavel_Estagios` FOREIGN KEY (`Estagios_Estagios_ID`) REFERENCES `estagios` (`Estagios_ID`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `FK_Turmas_curso_turma_Curso` FOREIGN KEY (`Curso_codigo`) REFERENCES `curso` (`codigo`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `zonas_transportes`
--
ALTER TABLE `zonas_transportes`
  ADD CONSTRAINT `FK_Transporte_zonas_transportes_Zona_` FOREIGN KEY (`Transporte_Transporte_ID_`) REFERENCES `transporte` (`Transporte_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Zona_zonas_transportes_Transporte_` FOREIGN KEY (`Zona_Zona_ID_`) REFERENCES `zona` (`Zona_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
