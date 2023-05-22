Setup process
1.Download folder,place folder inside wamp/www 
2.Create database named "real_time_commenting"
3.Run migration 
    Open CMD run "php artisan migrate"
4.Run seeder file to create first user
    Open CMD run "php artisan db:seed --class=AdminUserSeeder"
5.Run "php artisan serve"
