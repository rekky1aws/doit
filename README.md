# DoIt

Productivity web app done in Symfony. A custom todo list with extra steps to summarize.

## Index
 + [Setup](#Setup)

---

## Setup
### 1. Requirements
 + PHP
 + MariaDB
 + Composer
 + Symfony

### 2. Clone the repo
```bash
git clone https://github.com/rekky1aws/doit.git
cd doit
```

### 3. .env file
Copy `.env.template` to `.env`.
Adapt line 34 with the user, password, db_name and MariaDB version corresponding to your project :
```
DATABASE_URL="mysql://user:password@127.0.0.1:3306/db_name?serverVersion=12.0.2-MariaDB&charset=utf8mb4"
```

### 4. Install dependencies
```bash
composer install
```

### 5. Run
```bash
symfony server:start
```