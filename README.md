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
- 
## Telas do Sistema
- **Login**
![image](https://github.com/user-attachments/assets/91d29fa6-86ff-442f-8fb0-98c92413aeb4)

- **Livros**
![image](https://github.com/user-attachments/assets/92fc52cf-3aaa-43fb-8b98-c9e35a69f802)

 **Cadastro de Livros**
![image](https://github.com/user-attachments/assets/88a30abf-411a-4b82-b8d1-1f2f48b33831)

 **Autores**
![image](https://github.com/user-attachments/assets/f2bb71dd-cf0e-4e74-b8a0-445e84f0eeda)

 **Assuntos**
![image](https://github.com/user-attachments/assets/7f3b625b-e1c2-493b-8e3e-d73dd5442628)

**Exportação para Excel**
![image](https://github.com/user-attachments/assets/1fbc0454-6330-492d-82f4-beece27044fc)

## Tecnologias

- Laravel 12
- PHP 8+
- Bootstrap 5
- MySQL

