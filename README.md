
# 📦 Despliegue de Aplicación Laravel (Sin Base de Datos)

Este documento describe los pasos necesarios para **desplegar una aplicación Laravel** que **no utiliza base de datos**.

---

## 📋 Requisitos del Servidor

- **PHP >= 8.1**
- **Composer**
- **Servidor Web**: Apache o Nginx
- **Extensiones PHP** requeridas:
  - OpenSSL
  - Mbstring
  - Tokenizer
  - XML
  - Ctype
  - JSON
  - BCMath
  - Fileinfo

---

## 🚀 Pasos para el Despliegue

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/tu-repo.git
cd tu-repo
```

### 2. Instalar dependencias

```bash
composer install --optimize-autoloader --no-dev
```

### 3. Configurar el entorno

Copia el archivo `.env.example` a `.env` y edítalo:

```bash
cp .env.example .env
nano .env
```

Modifica las siguientes variables según tu entorno:

```
APP_NAME=Laravel
APP_ENV=production
APP_KEY=
APP_URL=https://tudominio.com
```

> No es necesario configurar variables de base de datos.

### 4. Generar la clave de la aplicación

```bash
php artisan key:generate
```

### 5. Establecer permisos

```bash
sudo chown -R www-data:www-data .
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
```

### 6. Configurar el servidor web

#### Apache (Virtual Host)

```apache
<VirtualHost *:80>
    ServerName tudominio.com
    DocumentRoot /ruta/a/tu-repo/public

    <Directory /ruta/a/tu-repo/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

> Asegúrate de activar `mod_rewrite`:
>
> ```bash
> sudo a2enmod rewrite
> sudo systemctl restart apache2
> ```

#### Nginx

```nginx
server {
    listen 80;
    server_name tudominio.com;

    root /ruta/a/tu-repo/public;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

### 7. Cachear configuración

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🧪 Comprobaciones

Accede en el navegador:

```
http://tudominio.com
```

Verifica el funcionamiento y revisa los logs si hay errores:

```bash
tail -f storage/logs/laravel.log
```
