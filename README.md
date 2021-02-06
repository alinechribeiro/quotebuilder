# PHP Project to create a Quote Builder
The project is built with Laravel 8 framework, artisan, MySQL, Bootstrap 4 and data manipulation with CRUD (create, read, update, delete) for products.

## Instructions

1. Clone the project 

2. Go to the project directory and enter the command line to start the server on port 7777: 

```bash
$ php -S localhost:7777 -t .
```

## Database
1. Create database.
2. Add the database informations to the .env file on the following fields:

DB_DATABASE=CHANGE HERE

DB_USERNAME=CHANGE HERE

DB_PASSWORD=CHANGE HERE

3. Run the command to create the tables:
```bash
$ php artisan migrate
```

## Mailtrap.io
The project sends email to the customer with the list of products and quotation.
Please add your mailtrap.io account details on .env file

MAIL_USERNAME=CHANGE HERE

MAIL_PASSWORD=CHANGE HERE


## Structure of the Project
We have four Product views, one Email view,Product and Mail Models in the following structure:

### Product Views:
1. index.blade.php: displays the homepage with products, customer details.
2. create.blad.php: creates the product instantiating the class ProductController create and later the store method to persist on the database.
3. edit.blade.php: update product received by the request with product id through method post.
4. show.blade.php: displays the product form page to udpate it.

### Mail View:
1. test.blade.php: sends the email. It is present on resources\views\email\test.blade.php.
### Controller

### Product Controller:
On app\Http\Controllers\ProductController.php we have the methods instantiated by the view resources\views\products\index.blade.php.

### Email COntroller:
On app\Mail\NewMail.php we have the methods construct and build to send the email through mailtrap.io.

### Model: 
On app\Models\Product.php we can check the attributes of class Product.

### Access the project on http://localhost:7777/products
