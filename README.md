## Instruções

O teste foi desenvolvido conforme os requisitos, porém adicionei uma camada de autenticação do user “John Doe”, que neste exemplo é o nosso user admin.

*   Adicionei usuário, partindo do princípio que poderia ser consumido por um front, e que em um caso mais próximo do real, precisaria de ter autorização para atualizar todas as informações sobre DVD's, clientes e atualizar status do DVD, se está disponível, ou locado.

## 🚀 Como executar o projeto?

*   Primeiro, precisa ter o PHP 5.2 ou superior instalados, conforme exigências do Laravel 11, versão que escolhi para usar.
*   Configurar o .env com as credenciais do banco de dados MySQL.
*   Instalar via composer com o comando `composer install`
*   Executar o comando `php artisan migrate` para criar todas as tabelas no banco de dados
*   Para o usuário “John Doe”, execute o seguinte comando `php artisan db:seed --class=UserAdminSeeder`

| Dados do User admin para gerar o access token |
| --- |
| **nome de usuário:** John Doe |
| **email para login:** johndoe@example.com |
| **password padrao**: johndoe123 |

Shh! 🤫 Essas crdenciais são apenas as geradas pelo seeder, para nosso user admin exemplo.