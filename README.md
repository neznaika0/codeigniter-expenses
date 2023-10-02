# CodeIgniter Expenses

## Project for an example of CodeIgniter 4

Created specifically to show some development techniques. You can study the code to understand "how does it work?". Probably a basic tutorial will appear later.

## Functional

* Show home page
* Authentication for one administrator
* Logout
* Navigate per pages in the list
* Creating an expense record
* Deleting an expense record
* View monthly expense statistics
* Translation (en, ru)
* Bootstrap 5 template
* and other framework features

## Installation

* Clone the repository.
* Install dependencies
* Create a database.
* Configure the file `.env` by sample `env_expenses`. Uncomment the necessary settings.

    You need to create a password hash. To do this, run:
    ```
    php -r "echo password_hash('YOUR_PASSWORD', PASSWORD_BCRYPT) . PHP_EOL;"
    ```

    Default password: **123456**
* Publish assets:
    ```
    php spark publish
    ```
* Run migrations and fill tables:
    ```
    php spark migrate
    php spark db:seed ExpenseSeeder
    ```

* Start server:
    ```
    php spark serve
    ```

For detailed configuration, see the manual https://codeigniter4.github.io/userguide/installation/index.html
