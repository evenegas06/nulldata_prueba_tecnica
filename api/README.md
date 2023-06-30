# Employee API

## Configuration 
* Create a database with name **employee_nulldata**
* Run `composer install`.
* Create `.env` file and add the environment variable `DB_DATABASE=employee_nulldata`.
* Run `php artisan migrate`
* Run `php artisan serve` and use the API on http://localhost:8000/api/employees

## Create new employee
Send the following json at **/api/employees** endpoint, method POST.

```json
{
    "name": "Eduardo Venegas Rivera",
    "email": "evr@mail.com",
    "position": "Developer",
    "birthdate": "06/06/1995",
    "address": "Texcoco, Estado de México",
    "skills": [
        {
            "name": "PHP",
            "score": 4
        },
        {
            "name": "JavaScript",
            "score": 3
        }
    ]
}
```