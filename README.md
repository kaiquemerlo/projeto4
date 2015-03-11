O sistema de login foi adicionado, por ele é possível
manipular o conteudo das paginas do site.

O usuário e as páginas exemplo encontram-se na fixture.php,
acesse o arquivo para criar e utilizar o painel.

O acesso ao sistema de login é garatindo apenas aqueles que 
estão registrados no banco de dados e a validação da senha
é feita de forma segura, utilizando a função password_hash
para gerar a senha e password_verify() para verificar se a 
senha passada equivale ao hash gerado anteriormente com a função.

