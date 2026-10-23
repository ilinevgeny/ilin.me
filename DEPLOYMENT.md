# Статическая сборка ilin.me

Production-образ содержит nginx и файлы сайта. При сборке два вызова PHP `filemtime` в `index.php` заменяются стабильной версией CSS/JS, результат сохраняется как `index.html`. По умолчанию версия вычисляется из содержимого CSS и JS. Остальной текст страницы сохраняется.

## Запуск локально

1. Перейти в repository:

   ```sh
   cd ~/petprojects/ilin.me
   ```

2. Собрать образ и запустить контейнер:

   ```sh
   docker compose -f docker-compose.production.yml up -d --build
   ```

3. Проверить страницу, CSS и PDF:

   ```sh
   curl -fsS http://127.0.0.1:18083/ -o /tmp/ilin-static.html
   curl -fsSI http://127.0.0.1:18083/css/style.css
   curl -fsSI http://127.0.0.1:18083/Evgeny_Ilin_CV_PHP_Backend_Developer.pdf
   docker compose -f docker-compose.production.yml ps
   ```

   Ожидается HTTP 200 и состояние `healthy`. В `/tmp/ilin-static.html` ссылки на CSS/JS содержат одинаковую версию; PHP-блоков нет. Также доступны изображения, favicon и `/summary-card.html`. Старый адрес `/index.php` перенаправляется на `/`.

4. Остановить локальный контейнер:

   ```sh
   docker compose -f docker-compose.production.yml down
   ```

## Версия образа

При необходимости версию файлов и тег образа можно связать с коммитом:

```sh
BUILD_VERSION="$(git rev-parse --short=12 HEAD)" ILIN_TAG="$(git rev-parse --short=12 HEAD)" \
  docker compose -f docker-compose.production.yml build
```

Контейнер работает от пользователя `nginx` с файловой системой только для чтения; временные файлы размещаются в `tmpfs`. Память ограничена 64 МБ, CPU 0.25, число процессов 64. Для журналов хранятся три файла по 10 МБ. PHP, MySQL и постоянные тома не нужны.

Порт опубликован только на `127.0.0.1:18083`. Общая сеть `proxy` не подключается. Подключение к Caddy на сервере TME нужно настроить отдельно при переносе. Локальная разработка использует прежний `docker-compose.yml`.
