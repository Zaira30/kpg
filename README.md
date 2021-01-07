Teste Prático Programador(a) PHP – Laravel

DevOps
 - Versão do =>  PHP 7.3
 - Framework => Laravel Framework 8.21.0
 - Framework => Tailwind CSS
 - Framework => Livewire
 - Banco => Mysql
 
 - Possui as tabelas em Migrations
 - Possui Seed para popular as tabela Users
 
Funcionalidades:
 - Autenticação,
 - CRUD de usuários
 - CRUD de produtos
 *Todos os CRUDs devem possuir listagem  e paginação de 20 items, criação, atualização e deleção
 
 
 

API Rest de produtos com listagem, criação, atualização e deleção

#Listar todos os Produtos
GET {url}/api/v1/products
    - Retorno: {
                   "products": [
                       {
                           "id": 1,
                           "name": "Teste",
                           "price": "100.00",
                           "description": "teste",
                           "user": "Ms. Cleora Collier"
                       },
                       {
                           "id": 2,
                           "name": "hhhhhhhh",
                           "price": "20.00",
                           "description": "fdslflsdflsd",
                           "user": "Ms. Cleora Collier"
                       },
                       {
                           "id": 3,
                           "name": "mesa",
                           "price": "50.00",
                           "description": "fgdfghtht",
                           "user": "Ludie Dicki"
                       },
                       {
                           "id": 4,
                           "name": "rrrrrrrrrr",
                           "price": "80.00",
                           "description": "fmlfmmflkmowir",
                           "user": "Dr. Howard Parker"
                       },
                       {
                           "id": 5,
                           "name": "Fogão",
                           "price": "50.00",
                           "description": "fnjfnjnjfng",
                           "user": "Ludie Dicki"
                       },
                       {
                           "id": 9,
                           "name": "Geladeira",
                           "price": "50.00",
                           "description": "fnjfnjnjfng",
                           "user": "Ludie Dicki"
                       }
                   ],
                   "message": "Produtos retornados com sucesso"
               }
 
#Adicionar  Um Produto
#Enviar um Json todos os campos são obrigatórios
 POST {url}/api/v1/products/create
 Exemplo:
    Envio: 
    {
        "name":"Mouse",
        "price":15.00,
        "description": "isso é um teste",
        "user_id" : 13
    }
    Retorno: {
                 "product": [
                     {
                         "id": 12,
                         "name": "Mouse",
                         "price": 15,
                         "description": "isso é um teste",
                         "user": "Zaira Mendonça Amorim"
                     }
                 ],
                 "message": "Create sucess"
             }
             
#Alterar um Produto 
#Enviar um Json todos os campos são obrigatórios            
PATCH {url}/api/v1/product/{ID}
    Exemlo: 
    Envio:
    {
        "name":"Mouse",
        "price":15.00,
        "description": "Mouse Dell",
        "user_id" : 13
    }
    Retorno: {
        "product": [
            {
                "id": 12,
                "name": "Mouse",
                "price": 15,
                "description": "Mouse Dell",
                "user": "Zaira Mendonça Amorim"
            }
        ],
        "message": "Product Updated Success"
    }


#Excluir um Produto        
DELETE {url}/api/v1/product/{ID}

Retorno: {
             "message": "Product Deleted Success"
         }