# Newletter App
Create a simple subscription platform (only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it. (no authentication of any kind is required)

- Use PHP 7. or 8. 
- Write migrations for the required tables.
- Endpoint to create a "post" for a "particular website".
- Endpoint to make a user subscribe to a "particular website" with all the tiny validations included in it.
- Use of command to send email to the subscribers (command must check all websites and send all new posts to subscribers which haven't been sent yet).
- Use of queues to schedule sending in background.
- No duplicate stories should get sent to subscribers.

# Configuration Steps
- Composer Update
- Update env File
- Add SMTP details
- Run Migrations
- Run Seeder

# Check Postman
https://www.getpostman.com/collections/bd327b54089015a2a1fe



