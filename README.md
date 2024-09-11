McDonald's Catalonia - Laravel Project

Este proyecto en Laravel 11 mantiene una lista actualizada de restaurantes McDonald's en Cataluña utilizando la API pública de OpenStreetMap a través de Overpass API.

Características
    Actualización de la lista de restaurantes McDonald's en Cataluña.
    Consulta y visualización de la lista de restaurantes.
    Obtención de detalles específicos de un restaurante.
    Eliminación de todos los registros de restaurantes.

**Instalación
Clonar el repositorio:
    git clone https://github.com/tu_usuario/tu_repositorio.git
    cd tu_repositorio

Instalar las dependencias:
    composer install
    Configurar el archivo .env:

Copia el archivo .env.example a .env:
    cp .env.example .env
    Configura los detalles de tu base de datos en el archivo .env.

Generar la clave de aplicación:
    php artisan key:generate

Migrar la base de datos:
    php artisan migrate


**Uso
Actualizar la lista de restaurantes
Primera instalación: Ejecuta el siguiente comando para cargar los datos iniciales:
    php artisan restaurants:update-list

Actualizar manualmente: Puedes actualizar la lista de restaurantes manualmente accediendo a la ruta:
    http://127.0.0.1:8000/update-list
    
**Rutas disponibles
/: Muestra la lista de todos los restaurantes con osm_id, latitud y longitud.
/get/{id}: Muestra los detalles del restaurante con el ID de OpenStreetMap especificado.
/update-list: Actualiza la lista de restaurantes desde la API de Overpass.
/delete-all: Elimina todos los registros de la tabla restaurants.

**Configuración de la API
La API de Overpass se utiliza para obtener la lista de restaurantes McDonald's en Cataluña. La consulta se realiza a:
    https://overpass-api.de/api/interpreter

**Comandos Artisan
Actualizar la lista de restaurantes: Ejecuta el comando para actualizar la base de datos.
    php artisan restaurants:update-list

//Problemas conocidos
Error 404 Not Found: Asegúrate de que la ruta es correcta y que el ID de restaurante existe en la base de datos.