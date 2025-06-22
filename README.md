# Book Manager

Book Manager é um sistema web desenvolvido em Laravel para cadastro, gerenciamento e consulta de livros, autores e assuntos.

## Funcionalidades
- Autenticação de usuários
- Cadastro, edição e exclusão de livros
- Cadastro, edição e exclusão de autores
- Cadastro, edição e exclusão de assuntos
- Associação de múltiplos autores e assuntos a cada livro
- Relatório de livros com exportação para Excel
- Interface responsiva com Bootstrap

## Instalação

1. Clone o repositório:
   ```sh
   git clone https://github.com/w-bonfim/book-manager.git
   cd book-manager
   ```

2. Instale as dependências:
   ```sh
   composer install
   ```

3. Configure o arquivo `.env`:
   - Copie `.env.example` para `.env`
   - Configure as variáveis de banco de dados

4. Gere a chave da aplicação:
   ```sh
   php artisan key:generate
   ```

5. Rode as migrations:
   ```sh
   php artisan migrate
   ```

6. **Popule o banco com seeders obrigatoriamente para acessar o sistema:**
   ```sh
   php artisan db:seed
   ```

   > **Importante:** Para acessar o sistema, é necessário rodar o comando acima para criar o usuário administrador padrão.

7. Inicie o servidor:
   ```sh
   php artisan serve
   ```

## Testes

Para rodar os testes automatizados do projeto, utilize:

```sh
php artisan test
```

## Acesso ao sistema

- **Login:** admin@bookmanager.com
- **Senha:** 123

## Tecnologias

- Laravel 12
- PHP 8+
- Bootstrap 5
- MySQL

