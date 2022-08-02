<h1 align="center">
    DFMS
</h1>

<h3 align="center">Dairy Farm Management System</h3>

---

<p align="center"> 
    <br> 
</p>

## ☛ Installation Process

-   Open GitBash in the target folder
-   Copy and paste the below command

```
git clone https://github.com/srshubho/dfms.git
```

```
cd dfms
```

```
composer install
```

-   .env file missing

```
cp .env.example .env
```

-   To generate a key

```
php artisan key:generate
```

---

## ☛ Database Setup

-   Create a new DATABASE and edit .env file. Please make sure select `utf8_unicode_ci` before creating database.

```
DB_DATABASE=[created_database_name]
```

-   For Data seeding

```
php artisan migrate --seed
```

<h3 align="center">Bang!!! You are totally set to go just run bellow command</h3>

```
php artisan serve
```

-   copy the link and paste it on your browser. Your project is ready.

```
http://localhost:8000/
```

---

<h2 align="center">Once you follow the upper command you dont have to follow it again</h2>

## ☛ Git pull

-   Open gitbash from the project directory and run the bellow command

```
git pull
```

-   Everytime after pulling data run the below command [** যদি ইনান করতে বলে তবে **]

```
php artisan migrate:fresh --seed
```
