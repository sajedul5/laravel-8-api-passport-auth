<h2>1st step </h2>
composer require laravel/passport

<h2>2nd Step</h2>
php artisan migrate 

<h2>3rd Step</h2>
php artisan passport:install 
<h2>4th Step</h2>
(Go to user model User->models and add to (use Laravel\Passport\HasApiTokens)) 
<h2>5th Step</h2>
Go to provider floder edit to authproviderfile (provider->AuthProvider (Laravel\Passport\Passport;))
<h2>6th Step</h2>
(config->file(driver->passport))
