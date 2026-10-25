# Dota 2 Heroes API Parser

Скрипт на чистом PHP, который забирает список героев из OpenDota API, сохраняет их в базу MySQL и выводит в виде HTML-таблицы.

## Локальный запуск
```bash
composer install
docker compose up -d
  
Откройте в браузере:http:
http://localhost:8001/html.php