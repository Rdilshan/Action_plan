# Laravel Docker Setup and Database Migration

This guide explains how to set up a Laravel project using Docker, reset migrations, and seed the database. Follow the steps below:

---

## Step 1: Build and Start the Docker Container

Run the following command to build the Docker container and start the image:
```bash
docker-compose up --build
```
This will:
- Build the Docker images specified in the `docker-compose.yml` file.
- Start the necessary services (e.g., web server, database, etc.).

---

## Step 2: Access the Web Container

Once the containers are up, access the Laravel application container (commonly named `web`) by running:
```bash
docker-compose exec web bash
```
This command opens a terminal inside the `web` container.

---

## Step 3: Run Laravel Migrations and Seed the Database

Inside the `web` container, execute the following command to reset migrations, rebuild the database schema, and seed the database with initial data:
```bash
php artisan migrate:fresh --seed
```
This command will:
1. Drop all existing tables in the database.
2. Run all migrations to create the database schema.
3. Populate the database with seed data defined in your seeder classes.

---

## Step 4: Access the Application

Once the database setup is complete, open your browser and navigate to:
```
http://localhost:8000
```
You should now see your Laravel application running.

---

## Additional Notes

- Ensure your `docker-compose.yml` file is correctly configured for Laravel, including services for `web` and `db`.
- Confirm that `DatabaseSeeder` in `database/seeders/DatabaseSeeder.php` is properly configured to call the necessary seeders.
- If there are issues, check the container logs for debugging:
  ```bash
  docker-compose logs
  ```

