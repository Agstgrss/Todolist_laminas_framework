# Todolist Laminas Framework

This is a project that creates a todolist where you can generate a new task, view it, edit it, and delete it.

## Prerequisites

- **PHP** (version 8.1 or higher)
- **Composer**: The dependency manager for PHP


## Cloning the Repository

In the directory where you want to download the repository, open Git Bash and use:

*git clone https://github.com/Agstgrss/todolist_laminas_framework.git*

## Installing Dependencies

To do this, is needed to enable some extensions in php.ini

**php extension package**
- **extension=intl
- **extension=openssl
- **extension=pdo_mysql
- **extension=pdo_sqlite

After this you can use the command below in directory using cmd:

*composer install*

This command reads the composer.json file and installs all the libraries and dependencies required for the project.
if it is not enough, use:

*composer update*

## Running the Project

to use project data type:

*php data/load_db.php*

and after

*composer dump-autoload*


To start the development server, navigate to the project's public directory and use the following command:

*php -S 0.0.0.0:8080 -t public public/router.php*

You can see the application here: http://localhost:8080


