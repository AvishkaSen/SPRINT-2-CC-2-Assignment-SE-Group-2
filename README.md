# [SPRINT 2] CC-2 FUTURESEEKERS Group Assignment 
## (SE_GROUP-02)

Sprint 2 roles: 

- Mohammed Yahya -> SCRUM MASTER
- Dilki Delgoda -> QUALITY ASSURANCE
- Siduja Perera -> BUSINESS ANALYST
- Avishka Senanayake -> DEVELOPER


Methods of use:

- Go to your htdocs folder and create a file called 'futureseekers'
- And in that folder, pull this repository 
- Start XAMPP Apache and MySQL service models 

In the search bar the file directory, type 'cmd' (or powershell)
and type:

```
php spark migrate (to create all db tables automatically)
php spark db:seed AdminSeeder (add admin login data to database)

php spark migrate:rollback (if you want to drop all tables)
```

To go to the webpage, type in your browser address bar :
```
http://localhost/futureseekers/public/
```

Admin logins from seeder file are:

    - admin123@admin.com
    - admin123


*This assignment was for the Commercial Computing 2 AGILE Assignment*
