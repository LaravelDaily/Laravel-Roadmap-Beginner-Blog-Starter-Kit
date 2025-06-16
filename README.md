# Laravel Roadmap: Beginner Personal Blog with LaravelDaily Starter Kit

This is an example demo project that implements majority of the topics required in [Laravel Roadmap Beginner Level](https://laraveldaily.com/roadmap-learning-path):

**Routing and Controllers: Basics**

- Callback Functions and Route::view()
- Routing to a Single Controller Method
- Route Parameters
- Route Naming
- Route Groups

**Blade Basics**

- Displaying Variables in Blade
- Blade If-Else and Loop Structures
- Blade Loops
- Layout: @include, @extends, @section, @yield
- Blade Components

**Auth Basics**

- Starter Kits: [Laravel Daily Starter Kit](https://github.com/LaravelDaily/starter-kit) (Tailwind, Blade)
- Default Auth Model and Access its Fields from Anywhere
- Check Auth in Controller / Blade
- Auth Middleware

**Database Basics**

- Database Migrations
- Basic Eloquent Model and MVC: Controller -> Model -> View
- Eloquent Relationships: belongsTo / hasMany / belongsToMany
- Eager Loading and N+1 Query Problem

**Full Simple CRUD**

- Route Resource and Resourceful Controllers
- Forms, Validation and Form Requests
- File Uploads and Storage Folder Basics
- Table Pagination

This demo project is using [LaravelDaily Starter Kit](https://github.com/LaravelDaily/starter-kit) (Tailwind CSS) as an Auth Starter Kit.

---

## Images

![](https://laraveldaily.com/uploads/2025/06/roadmap-starter-kit-homepage.png)

![](https://laraveldaily.com/uploads/2025/06/roadmap-starter-kit-post.png)

![](https://laraveldaily.com/uploads/2025/06/roadmap-starter-kit-dashboard.png)

![](https://laraveldaily.com/uploads/2025/06/roadmap-starter-kit-posts-list.png)

---

## How to use

- Clone the repository with **git clone**
- Copy **.env.example** file to **.env** and edit database credentials there
- Run **composer install**
- Run **npm install**
- Run **npm run build**
- Run **php artisan key:generate**
- Run **php artisan migrate --seed** (it has some seeded data for your testing)
- That's it: launch the main URL.
- You can login to manage articles with default credentials __test@example.com__ - **password**

## License

Basically, feel free to use and re-use any way you want.

---

## More from our LaravelDaily Team

- Subscribe to our [YouTube channel Laravel Daily](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA)
- Enroll in our [Laravel Online Courses](https://laraveldaily.com/)
