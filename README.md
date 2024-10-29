## LenderHomePage Blog App

```
Welcome to LenderHomePage Blogging Platform, a full-featured web application that enables writers to publish blog posts and readers to follow their favorite authors. Built using Laravel, Vue 3, and Inertia.js, our platform offers a seamless user experience with modern web technologies.
```

#### Starter Kit

_I have used the [starter kit](https://laravel.com/docs/11.x/starter-kits#breeze-and-inertia) to bootstrap this project._

#### Features

-   User Authentication: Secure user registration and login.
-   Post Management: Create, edit, and delete blog posts effortlessly.
-   Follower System: Allow users to follow their favorite authors.
-   Email Notifications: Notify followers when a new post is published.
-   Responsive Design: Optimized for all devices with a responsive layout.

#### Tech Stack

-   Backend: Laravel(v10)
-   Frontend: Vue 3, Inertia.js
-   Database: MySQL
-   Other Tools: Tailwind CSS for styling

#### Getting Started

##### 1. Prerequests

    Ensure you have the following installed:

-   PHP 8.x
-   Composer
-   Node.js & npm
-   MySQL or your preferred database system

##### 2. Installation

-   Clone the Repository:

    ```
    git clone git@github.com:hardcommitoneself/lenderhomepage-blog.git

    cd lenderhomepage-blog
    ```

-   Install Backend Dependencies:
    ```
    composer install
    ```
-   Install Frontend Dependencies:
    ```
    npm install
    ```
-   Set Up Environment Variables:

    Copy `.env.example` to .env and update the database credentials and other configurations as necessary.

    I have used [mailtrap](https://mailtrap.io/) as a mailer, so please create an account on mailtrap and set the proper env values to make mailer working. If you are not faimilar with it, please follow this [blog](https://www.itsolutionstuff.com/post/laravel-send-mail-using-mailtrap-exampleexample.html)

-   Generate Application Key:
    ```
    php artisan key:generate
    ```
-   Run Migrations and Seed Database:

    _I have created a factory to create dummy users and posts_

    ```
    php artisan migrate --seed
    ```

-   Build Frontend Assets:
    ```
    npm run dev
    ```
-   Start the Development Server:
    ```
    php artisan serve
    ```
-   Visit http://localhost:8000 to view the application.

##### 3. Usage

-   User Registration: Register for an account to start publishing and following posts.
-   Creating Posts: Once logged in, navigate to the dashboard to publish new blog posts.
-   Following Authors: Browse each blog post and follow authors to receive notifications for new posts.

##### 4. Queue Configuration

_Ensure the queue worker is running for the email notifications:_

```
php artisan queue:work
```

##### 5. Test mail notification

Once you have an account on mailtrap and set proper env values on the project, then you might get notifications when a user you are following post a new blog. You can check [here](https://mailtrap.io/inboxes)

Thanks for taking your time to check this project! :)
