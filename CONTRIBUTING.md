# 🤝 Contribuindo para o PROFA.AI

Obrigado por considerar contribuir para o **PROFA.AI**! Este é um projeto educacional de código aberto e toda ajuda é bem-vinda.

## 🎯 Como Contribuir

### 🐛 Reportando Bugs

Se você encontrou um bug, por favor:

1. **Verifique** se o bug já não foi reportado nas [Issues](https://github.com/seu-usuario/profa-ai/issues)
2. **Crie uma nova issue** com:
   - **Título claro** e descritivo
   - **Descrição detalhada** do problema
   - **Passos para reproduzir** o bug
   - **Comportamento esperado** vs **comportamento atual**
   - **Screenshots** se aplicável
   - **Informações do ambiente** (SO, versão do PHP, navegador, etc.)

### ✨ Sugerindo Melhorias

Para sugerir uma nova funcionalidade:

1. **Verifique** se a sugestão já não existe nas issues
2. **Crie uma issue** com a tag `enhancement`
3. **Descreva detalhadamente**:
   - O problema que a funcionalidade resolve
   - Como deveria funcionar
   - Por que seria útil para professores

### 🔧 Contribuindo com Código

#### Configuração do Ambiente

1. **Fork** o repositório
2. **Clone** seu fork:
```bash
git clone https://github.com/seu-usuario/profa-ai.git
cd profa-ai
```

3. **Configure o ambiente**:
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```

4. **Crie uma branch** para sua feature:
```bash
git checkout -b feature/nome-da-feature
```

#### Padrões de Desenvolvimento

- **Laravel**: Siga as convenções do framework
- **PSR-12**: Use o padrão de código PHP
- **Blade**: Para templates, use a sintaxe Blade
- **Migrations**: Para mudanças no banco, sempre crie migrations
- **Seeders**: Para dados de exemplo
- **Comentários**: Documente código complexo

#### Estrutura de Commits

Use mensagens de commit claras seguindo o padrão:

```
tipo(escopo): descrição

[corpo da mensagem]

[rodapé]
```

**Tipos:**
- `feat`: Nova funcionalidade
- `fix`: Correção de bug
- `docs`: Documentação
- `style`: Formatação, pontos e vírgulas, etc
- `refactor`: Refatoração de código
- `test`: Adição de testes
- `chore`: Manutenção

**Exemplos:**
```
feat(auth): adicionar sistema de recuperação de senha
fix(admin): corrigir erro ao editar usuário
docs(readme): atualizar instruções de instalação
```

#### Processo de Pull Request

1. **Garanta** que o código está funcionando
2. **Execute** os testes (se houver)
3. **Atualize** a documentação se necessário
4. **Crie** o Pull Request com:
   - **Título claro** descrevendo a mudança
   - **Descrição detalhada** do que foi alterado
   - **Referência** à issue relacionada (se houver)
   - **Screenshots** para mudanças visuais

#### Checklist do PR

- [ ] O código segue os padrões do projeto
- [ ] As mudanças foram testadas localmente
- [ ] A documentação foi atualizada (se necessário)
- [ ] Não há conflitos com a branch main
- [ ] O commit tem mensagem descritiva

### 🧪 Testes

Ao contribuir, considere:

- **Teste manualmente** todas as funcionalidades afetadas
- **Verifique** diferentes navegadores (se aplicável)
- **Teste** com diferentes tipos de usuário (user, admin, superadmin)
- **Valide** formulários e validações

### 📁 Estrutura do Projeto

```
profa-ai/
├── app/
│   ├── Http/Controllers/     # Controllers
│   ├── Models/              # Models Eloquent
│   └── ...
├── resources/
│   ├── views/               # Templates Blade
│   └── ...
├── database/
│   ├── migrations/          # Migrações
│   └── seeders/            # Seeders
├── routes/
│   └── web.php             # Rotas web
└── ...
```

### 🎨 Funcionalidades em Desenvolvimento

Áreas que precisam de contribuição:

- [ ] **Integração com IA** (OpenAI, ChatGPT)
- [ ] **Geração de planos de aula**
- [ ] **Sistema de atividades**
- [ ] **Export para PDF**
- [ ] **Templates educacionais**
- [ ] **Sistema de tags/categorias**
- [ ] **Dashboard com analytics**
- [ ] **API REST**
- [ ] **Testes automatizados**
- [ ] **Documentação da API**

### 💡 Dicas para Contribuidores

#### Para Iniciantes
- Procure issues com a tag `good first issue`
- Comece com correções pequenas ou melhorias na documentação
- Não hesite em fazer perguntas nas issues

#### Para Desenvolvedores Experientes
- Ajude na arquitetura de novas funcionalidades
- Revise Pull Requests de outros contribuidores
- Implemente funcionalidades complexas como integração com IA

### 📞 Comunicação

- **Issues**: Para bugs e sugestões
- **Discussions**: Para discussões gerais
- **Email**: [seu-email@exemplo.com] para questões sensíveis

### 🏷️ Labels das Issues

- `bug` - Problemas no código
- `enhancement` - Novas funcionalidades
- `documentation` - Melhorias na documentação
- `good first issue` - Bom para iniciantes
- `help wanted` - Precisamos de ajuda
- `priority: high` - Alta prioridade
- `priority: low` - Baixa prioridade

### 📋 Roadmap

Veja nosso [projeto no GitHub](https://github.com/seu-usuario/profa-ai/projects) para acompanhar o desenvolvimento das funcionalidades.

---

## 🙏 Agradecimentos

Toda contribuição, por menor que seja, é valiosa para o projeto! Juntos, vamos criar uma ferramenta que realmente faça a diferença na educação brasileira.

**Obrigado por contribuir! 🚀📚** 