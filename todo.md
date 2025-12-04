📌 Funcionalidades obrigatórias
1. Autenticação (Breeze)

Login

Cadastro

Logout

Proteção de rotas com auth

Perfil do usuário (editar nome e senha)

2. CRUD de Clientes

Tabela: clients

nome

telefone

observações

belongsTo(User)

CRUD completo:

listar

criar

editar

deletar

validação

3. CRUD de Serviços

Tabela: services

nome

duração (minutos)

preço

belongsTo(User)

4. Agendamentos

Tabela: appointments

client_id

service_id

user_id

data/hora (start_time)

end_time (calculado automaticamente pelo duration do service)

status (scheduled, done, canceled)

Regras:

Não pode agendar se houver conflito entre start_time e end_time

Não pode agendar no passado

Ao editar, validar de novo

5. Dashboard

Exibir:

Total de clientes

Total de serviços

Agendamentos do dia

Próximos 5 agendamentos

Status dos agendamentos com badges

6. Agenda do dia

Página mostrando:

| Hora | Cliente | Serviço | Status |

Com três cores:

Azul → Agendado

Verde → Concluído

Vermelho → Cancelado

📚 O que você vai provar dominando isso

Migrations

Models

Eloquent (relacionamentos)

Controllers REST

Middleware

Policies básicas (opcional)

Validação (FormRequest)

Blade components

Layouts

Flash messages

Query avançada (conflitos de horário)

Arquitetura mínima limpa e organizada

Esse é o tipo de sistema que paga boletos na vida real, então se você faz isso tranquilo → você tá apto pra começar qualquer projeto Laravel.

🎯 Entrega opcional (pra elevar o nível)

Se quiser provar que tá realmente fino:

🔸 Paginação nas listas
🔸 Filtro por nome e data
🔸 Buscar clientes por telefone
🔸 Marcar agendamento como “feito” com 1 clique
🔸 Exibir agenda semanal em grid
🔸 Exportar agenda do dia em PDF
