# DataBasesProject2
Parte 2 do projeto de bases de dados - Gestão de Estágios (2025-2026)

Esta fase foca-se na eficiência, manuseamento e automação da base de dados, bem como na criação de um protótipo web-based.

> **NOTA IMPORTANTE:** Para esta parte deve ser utilizada a base de dados (modelo relacional) disponibilizada pela equipa docente, e não a versão desenvolvida na Parte 1.

# Links Úteis

- **Relatório P2:** https://docs.google.com/document/d/1Q9nS9DfwMJb0WWhF4Dng6ZDCNCBWoLNkoY9ikWcK8sU/edit?usp=sharing

# Checklist de Desenvolvimento

### 1. Automatismos (SQL)
*Triggers (T), Stored Procedures (P) e Funções (F)*

- [x] **T1:** Validar Classificação do Estagiário (1 a 5).
- [x] **T2:** Validar se `data_inicio` < `data_fim`.
- [x] **P1:** Registar estágio (verificar existências: aluno, estabelecimento, formador).
- [x] **P2:** Listar estágios que iniciam em X dias.
- [x] **F1:** Função média classificações de um estabelecimento por ano letivo.
- [x] **F2:** Função média ponderada da nota final do estágio.

### 2. Pesquisa de Dados (SQL)
*Queries (Q) e Views (V)*

- [x] **Q1:** Formadores e total de estágios supervisionados (>1).
- [x] **Q2:** Empresas e média de notas atribuídas (>=14).
- [x] **Q3:** Empresas e total de produtos comercializados (pelo menos 1).
- [x] **Q4:** Empresas e total de estágios (pelo menos 1).
- [x] **Q5:** Cursos com nº turmas superior à média geral.
- [x] **Q6:** Formadores "acima da média" (comparação individual vs global).
- [x] **V1:** View detalhes dos estágios por formador e médias.
- [x] **V2:** View média notas finais por empresa e curso.

### 3. Sistema Web-Based (PHP/HTML)
*Três portais distintos*

- [x] **Portal Administrador:**
    - [x] Gerir Estágios (Registar, Editar, Apagar).
    - [x] Adicionar Alunos.
- [x] **Portal Aluno:**
    - [x] Listar empresas (filtro por ramo/localidade).
    - [x] Consultar detalhes do estágio (transportes, responsável, etc.).
- [x] **Portal Formador:**
    - [x] Registar notas e finalizar estágio (cálculo automático).

# Entregas Finais

- [ ] Relatório P-P2 (.pdf/.doc)
- [ ] Backup da BD com automatismos (.sql)
- [ ] Protótipo Web (.zip ou .rar)
- [ ] Vídeo de apresentação (.mp4)

# Comentários para ter em atenção:

- **Base de Dados:** Usar estritamente o modelo fornecido pelos professores.
- **Backups:** Trabalhar com o ficheiro atual e transformar em zip com o nome da versão regularmente.
- **NÃO ELIMINAR BACKUPS:** Guardar sempre na pasta de arquivo.
- **Nota Mínima:** A média global (P1 + P2) tem de ser >= 8 valores.

# Cenas a fazer no final:

- **1. Automatismos:** Rever todos os pontos;
- **2. Comentarios:** Rever cometários nos códigos sql para não parecer tão AI
- **3. Exportar BD:** Ao importar a bd para o vosso xamp manter bd com o nome "siestagios2_v1"
