# laravel-vue-pusher-chat
Это два клиента, один чат(chat3), второй для админов(client), после распаковки в каждый нужно:

1. в директории chat3:

- в файле .env настроить подключение к базе данных в полях:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

- запустить cmd, установить npm(npm install),
- затем php artisan migrate, 
- затем php artisan serve,
- после через отдельный cmd npm run watch-poll, 
- Зайти на страницу в браузере http://127.0.0.1:8000/, либо ту, которая будет указана в cmd

![2022-01-18_16-14-06](https://user-images.githubusercontent.com/77277774/149950708-baf1e943-3ecf-4ccc-b868-6c6c2f6a3ffa.png)

- и зарегистрироваться 

![2022-01-18_16-09-24](https://user-images.githubusercontent.com/77277774/149950743-8c33d393-cdcd-4509-88a4-84c119ddc056.png)

2. в директории client:

- запустить cmd, установить npm(npm install),
- затем npm run serve,
- и перейти на страницу браузера http://localhost:8080/, либо ту, которая будет указана в cmd 


![2022-01-18_16-15-04](https://user-images.githubusercontent.com/77277774/149950771-1c033652-4cd9-483d-b31f-be088542e8ec.png)

- далее будет список из пользователей с возможностью редактирования


![2022-01-18_16-11-57](https://user-images.githubusercontent.com/77277774/149950785-995c00cb-11bd-4700-9dfc-36cf33e2b186.png)
