## Including Technologies
- Php 8 & Laravel 8
- mysql
- docker


## Installation
1. Go to the project folder
2. Run "composer install" on the command line
3. Up docker-containers with command "docker-compose up --build -d"
4. Run "docker exec m_php8 php artisan migrate" for creating tables
5. Run "docker exec m_php8 php artisan db:seed" for seeding tables

* For testing
    - Run Run "docker exec m_php8 php artisan test" command 

