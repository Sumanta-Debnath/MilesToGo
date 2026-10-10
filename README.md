# Miles To Go!

A travel website for exploring India: hill stations, beaches, wildlife and pilgrimage destinations, each with tour plans and packages.

## Features

- Destination categories with plan and package pages
- Responsive layout for desktop and mobile
- Sign up, login and contact form (PHP + MySQL)
- Admin pages to view users and contact messages
- FAQs and invoice pages

## Tech Stack

HTML, CSS, JavaScript, Bootstrap 3, jQuery, PHP, MySQL

## Project Structure

```
index.html      Landing page
pages/          Site pages (plans/ and packages/ inside)
php/            Login, signup, contact and admin pages
assets/         CSS, JS, images, videos
```

## Run Locally

1. Install [XAMPP](https://www.apachefriends.org/) (or any PHP + MySQL setup).
2. Copy this folder into `htdocs`.
3. Create a MySQL database named `registration` with `signup`, `admin` and `contactus` tables.
4. Check the database settings in `php/config.php`.
5. Start Apache and MySQL, then open `http://localhost/milestogo/`.