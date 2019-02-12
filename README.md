# mini-crm-supplium

Task Description
Admin panel to manage companies

Basically, a project to manage companies and their employees. Mini-CRM.

   Basic Laravel Auth: ability to log in as administrator
   Use database seeds to create first user with email admin@admin.com and password “password”
   CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.
   Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website
   Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone
   Use database migrations to create those schemas above
   Store companies logos in storage/app/public folder and make them accessible from public
   Use basic Laravel resource controllers with default methods – index, create, store etc.
   Use Laravel’s validation function, using Request classes
   Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page
   Use Laravel make: auth as default Bootstrap-based design theme, but remove the ability to register
   Email notification: send an email whenever a new company is entered (use Mailgun or Mailtrap)
   Make the project multi-language (using resources/lang folder)
   
   
   **The steps to run the project:**
   
run migration. (#command: php artisan migrate)

run seeder. (#command: php artisan db:seed)

login using inputs (email, password) by (admin@admin.com, password).

you can change the lang from admin panel(i started with two langs put can add more).

when add company the email message will send to my email (you can config from .env file).

   **The demo of the project run on:**
   
http://fekra-web.com/demo/supplium/
