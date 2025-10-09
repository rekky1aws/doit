# DoIt

Productivity web app done in Symfony. A custom todo list with extra steps to summarize.

## Index
 + [Setup](#Setup)

---

## Setup
### 1. Requirements
Required :
 + [PHP](https://www.php.net/docs.php)
 + [MariaDB](https://mariadb.org)
 + [Composer](https://getcomposer.org)
 + [Symfony](https://symfony.com)

Optionnal :
 + [phpMyAdmin](https://www.phpmyadmin.net)

### 2. Clone the repo
```bash
git clone https://github.com/rekky1aws/doit.git
cd doit
```

### 3. Database setup
To run, this web app only needs to have an empty db with access rights. It's recommended to create a dedicated user with the same name of the database that will have all permissions on its database but none on anything else.

### 4. .env file
Copy `.env.template` to `.env`.
Adapt line 34 with the user, password, db_name and MariaDB version corresponding to your project :
```
DATABASE_URL="mysql://user:password@127.0.0.1:3306/db_name?serverVersion=12.0.2-MariaDB&charset=utf8mb4"
```

### 5. Install dependencies
```bash
composer install
```

### 6. Database initialization
Create the layout of the tables from the last updated migration file
```bash
php bin/console doctrine:migration:migrate
# or
php bin/console do:mi:mi
```

Insert the fixtures (test data)
```bash
php  bin/console doctrine:fixtures:load
#or
pgp  bin/console  do:fi:lo
```

### 7. Run the server (dev mode)
```bash
symfony server:start
```