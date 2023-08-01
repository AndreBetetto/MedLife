const {Client} = require('pg');

const client = new Client({
    host: 'pgsql.projetoscti.com.br',
    port: 5432,
    user: 'projetoscti8',
    password: 'eq173b189',
    database: 'projetoscti8'
})

client.connect();

