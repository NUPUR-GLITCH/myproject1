# NGO Management System

This is a PHP-based project. Below you’ll find instructions to set up and run the project, as well as information about the SQL files provided.

## How to Run

1. **Clone the repository**
    ```sh
    git clone https://github.com/NUPUR-GLITCH/myproject1.git
    cd myproject1
    ```

2. **Set up your web server**
    - Use [XAMPP](https://www.apachefriends.org/) or [WAMP](https://www.wampserver.com/) for a local environment.
    - Copy the project files into the web server's document root (`htdocs` for XAMPP).

3. **Create the database**
    - Open phpMyAdmin or your preferred MySQL client.
    - Import the SQL files located in the `sql` folder to create the necessary tables:
        - `sql/donation 1 sql.txt`
        - `sql/donation sql.txt`
        - `sql/survey sql.txt`
        - `sql/sponsor database.txt`
    - (Import any additional `.sql` or `.txt` files in `sql/` as needed.)

4. **Configure database connection**
    - Edit `db_connect.php` and set your MySQL username, password, and database name.

5. **Run the application**
    - Open your browser and go to `http://localhost/myproject1/index.php`

## SQL Files

All database schema and sample data files are now located in the [`sql`](./sql) folder. Please import them before using the application.

## Project Structure

```
/
├── about.php
├── admin.php
├── apply_sponsorship.php
├── contact.php
├── db_connect.php
├── donate.php
├── index.php
├── login.php
├── logout.php
├── sponsor_child.php
├── support_us.php
├── survey.php
├── volunteer.php
├── volunteer_dashboard.php
├── volunteer_signin.php
├── sql/
│   ├── donation 1 sql.txt
│   ├── donation sql.txt
│   ├── survey sql.txt
│   └── sponsor database.txt
└── ... other files ...
```

## Notes

- Make sure your PHP version matches the requirements of this project.
- For more details on each SQL file, see comments inside the respective files.

---

**To view the full file list and confirm all SQL files, [see the project on GitHub](https://github.com/NUPUR-GLITCH/myproject1/contents/).**
