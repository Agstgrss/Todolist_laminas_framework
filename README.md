# Todolist Laminas Framework

This is a project that creates a todolist where you can generate a new task, view it, edit it, and delete it.

## Prerequisites

- **PHP** (version 7.4 or higher)
- **Composer**: The dependency manager for PHP


## Cloning the Repository

In the directory where you want to download the repository, open Git Bash and use:

*git clone https://github.com/Agstgrss/todolist_laminas_framework.git*

## Installing Dependencies

You can use the command below in cmd:

*composer install*

This command reads the composer.json file and installs all the libraries and dependencies required for the project.

## Running the Project

to use project data type:

*php data/load_db.php*

and after

*composer dump-autoload*


To start the development server, navigate to the project's public directory and use the following command:

*php -S 0.0.0.0:8080 -t public public/router.php*

You can see the application here: http://localhost:8080
