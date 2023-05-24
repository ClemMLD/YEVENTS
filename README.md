# YEvent

This Laravel project with Blade templating engine is designed for managing events, allowing students to create events, like events, join events, and discuss events via a chat feature.

## Project Features
- Event Creation: Students can create events by providing event details such as title, description, date, time, and location. 

- Event Listing: Events are listed on the homepage, showcasing upcoming events with their details. Students can browse through the events and view event details.

- Event Like and Join: Students can like events to show their interest and join events they are interested in attending.

- Chat Feature: Students can discuss events via a chat feature.

- User Authentication: The project includes user authentication features using Laravel's built-in authentication scaffolding, allowing students to register, login, and manage their events and discussions.

## Project Setup
1. Clone the project to your local machine.
```bash
git clone https://github.com/ClemMLD/YEVENTS.git
```
2. Install Composer dependencies.
```bash
composer install
```
3. Copy the .env.example file to .env and update the database configuration settings.

4. Create a new database and update the database configuration settings in the .env file.
```sql
CREATE DATABASE YEVENTS;
```
5. Make the database migration.
```bash
php artisan migrate
```
6. Start the development server by running php artisan serve and access the application in your web browser at http://localhost:8000.

## Usage
Once the project is set up, students can register, login, and start creating, liking, and joining events. They can also participate in discussions via the chat feature. Students can manage their events and view the events they have liked or joined. The project includes pre-configured routes and controllers for handling these actions, as well as examples of how to use Laravel's Blade templating engine to render views and display event information. You can further customize the project to suit your specific requirements, add additional features, and enhance the user experience as needed.


