## Требования

- PHP >= 8.2
- MySQL >= 8.0
- Composer >= 2.x

## Установка

1. Клонировать репозиторий:

```
git clone https://github.com/avlad96/aft.git
```

2. Установить зависимости:

```
composer install
```

3. Создать `.env` файл и настроить параметры окружения:

```
cp .env.example .env
```

4. Сгенерировать ключ приложения:

```
php artisan key:generate
```

5. Запустить миграции:

```
php artisan migrate
```
