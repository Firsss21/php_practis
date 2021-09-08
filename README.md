### **Название:**

Практика PHP

-----

### **Описание:**

Практика работы с PHP:
  
  • Работа с массивами
  
  • Циклы
  
  • Работа с ссылками
  
  • Обработка текста
  
  • Изучение HTML-элементов
  
  • Чтение, изменение, создание файлов
  
  • Сортировки данных
  
  • Построение CRUD форм
  
  • Создание различных таблиц
  
  • Работа с базой данных, создание, изменение, удаление, чтение
  
-----

### **Технологии:**

  •   Бд sqlite3
  
  •   nginx
  
  •   php7-fpm
  
  •   bootstrap (js/css)

-----

### **Разворачивание:**

Развернуто все на локальной машине, с помощью простого nginx конфига, php-fpm и драйвера sqlite для него.

Конфиг сервера для nginx
    server {
      listen 80;
      server_name phpract.com;
       charset utf-8;
      root /var/www/php_practis/;
      index index.php index.html index.htm;

      location / {
          try_files $uri $uri/ =404;
      }

      error_page 404 /404.html;
      error_page 500 502 503 504 /50x.html;
      location = /50x.html {
          root /usr/share/nginx/html;
      }

      location ~ \.php$ {
          try_files $uri =404;
          fastcgi_split_path_info ^(.+\.php)(/.+)$;
          fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
          fastcgi_index index.php;
          fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
          include fastcgi_params;
      }

    }

SQLite3 запускается в один клик.
Запускаем его и открываем файл базы

    buchi@buchi-desktop:/var/www/php_practis$ ./sqlite3 
    SQLite version 3.36.0 2021-06-18 18:36:39
    Enter ".help" for usage hints.
    Connected to a transient in-memory database.
    Use ".open FILENAME" to reopen on a persistent database.
    sqlite> .open db.db
    sqlite> 

Установить драйвер sqlite для php можно с помощью

     apt install sqlite php-sqlite3 

И добавляем в хосты новый домен

     sudo echo -e "127.0.0.1 phpract.com" >> /etc/hosts

-----

### **Примеры:**

![](https://i.imgur.com/mPv3dn5.png)

![](https://i.imgur.com/BzSRfGb.png)

