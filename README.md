
# **API Bodegón y algo más**

API para un sistema de inventario básico para la asignatura de Ingeniería del Software. UNET 2023.

## **Clonar el proyecto**

vía SSH / HTTPS / GitHub CLI:

```
    git clone git@github.com:rebecam24/inventory_api.git
    git clone https://github.com/rebecam24/inventory_api.git
    gh repo clone rebecam24/inventory_api
```

## **Requerimientos**

- Tener [docker](https://docs.docker.com/) en su sistema operativo.

- Cree o reemplace el archivo .env por el contenido del archivo **.env.example**

### **Para crear e inicializar los contenedores de docker**

```
sudo docker compose up
```

### **Para acceder al contenedor de php (cont-php) y utilizar los comandos de laravel**

```
docker exec cont-php composer install
docker exec cont-php php artisan key:generate
docker exec cont-php php artisan storage:link
docker exec cont-php php artisan migrate
docker exec cont-php php artisan db:seed
```

### **Si presenta problemas de permisos para storage**

```
sudo chmod -R 777 ./
```

- *Para acceder a phpmyadmin: <http://localhost:8081/>*
- *Para acceder al proyecto: <http://localhost>*
