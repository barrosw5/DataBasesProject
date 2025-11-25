# DataBasesProject2
Parte 2 do projeto de bases de dados - Gestão de Estágios (2025-2026)

Esta fase foca-se na eficiência, manuseamento e automação da base de dados, bem como na criação de um protótipo web-based.

> **NOTA IMPORTANTE:** Para esta parte deve ser utilizada a base de dados (modelo relacional) disponibilizada pela equipa docente, e não a versão desenvolvida na Parte 1.

# Links Úteis

- **Relatório P2:** https://docs.google.com/document/d/1Q9nS9DfwMJb0WWhF4Dng6ZDCNCBWoLNkoY9ikWcK8sU/edit?usp=sharing

# Checklist de Desenvolvimento

### 1. Automatismos (SQL)
*Triggers (T), Stored Procedures (P) e Funções (F)*

- [ ] **T1:** Validar Classificação do Estagiário (1 a 5).
- [ ] **T2:** Validar se `data_inicio` < `data_fim`.
- [ ] **P1:** Registar estágio (verificar existências: aluno, estabelecimento, formador).
- [ ] **P2:** Listar estágios que iniciam em X dias.
- [ ] **F1:** Função média classificações de um estabelecimento por ano letivo.
- [ ] **F2:** Função média ponderada da nota final do estágio.

### 2. Pesquisa de Dados (SQL)
*Queries (Q) e Views (V)*

- [ ] **Q1:** Formadores e total de estágios supervisionados (>1).
- [ ] **Q2:** Empresas e média de notas atribuídas (>=14).
- [ ] **Q3:** Empresas e total de produtos comercializados (pelo menos 1).
- [ ] **Q4:** Empresas e total de estágios (pelo menos 1).
- [ ] **Q5:** Cursos com nº turmas superior à média geral.
- [ ] **Q6:** Formadores "acima da média" (comparação individual vs global).
- [ ] **V1:** View detalhes dos estágios por formador e médias.
- [ ] **V2:** View média notas finais por empresa e curso.

### 3. Sistema Web-Based (PHP/HTML)
*Três portais distintos*

- [ ] **Portal Administrador:**
    - [ ] Gerir Estágios (Registar, Editar, Apagar).
    - [ ] Adicionar Alunos.
- [ ] **Portal Aluno:**
    - [ ] Listar empresas (filtro por ramo/localidade).
    - [ ] Consultar detalhes do estágio (transportes, responsável, etc.).
- [ ] **Portal Formador:**
    - [ ] Registar notas e finalizar estágio (cálculo automático).

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
