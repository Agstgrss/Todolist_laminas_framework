# Todolist Laminas Framework

This is a project that creates a todolist where you can generate a new task, view it, edit it, and delete it.

## Prerequisites

- **PHP** (version 7.4 or higher)
- **Composer**: The dependency manager for PHP

## Cloning the Repository

In the directory where you want to download the repository, open Git Bash and use:

```bash
git clone https://github.com/Agstgrss/todolist_laminas_framework.git
Installing Dependencies
You can use the command below in cmd:

bash
Copy code
composer install
This command reads the composer.json file and installs all the libraries and dependencies required for the project.

Environment Configuration
If your project depends on environment variables, you should configure them appropriately. If there is an .env.example file in the repository, copy it to .env and modify the values as needed:

bash
Copy code
cp .env.example .env
Edit the .env file and insert the appropriate values for your development environment.

Running the Project
To start the development server, navigate to the project's public directory and use the following command:

bash
Copy code
php -S 0.0.0.0:8080 -t public public/router.php
You can see the application here: http://localhost:8080

License
This project is licensed under the MIT License - see the LICENSE.md file for details.
