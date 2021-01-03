
## Stock Management, RESTful API


#### Technologies used
- Php
- Mysql
- Laravel
- [Download Postman collection](https://github.com/edonaHajredinaj/StockManagement-API/blob/master/StockManagement.postman_collection.json)
    

#### Database Tables
All tables have a created_at and updated_at timestamp

| sales      |  |
| ----------- | ----------- |
| id (increment)       | int(10) unsigned |
| total_price    | double(8,2)        |

| products      |  |
| ----------- | ----------- |
| id (increment)       | int(10) unsigned |
| name    | varchar(255)       |
| type    | varchar(255)       |
| price    | double(8,2)       |


| sale_product      |  |
| ----------- | ----------- |
| id (increment)       | int(10) unsigned |
| sale_id    | int(11)       |
| product_id    | int(11)      |
| quantity    | int(11)       |

| stocks     |  |
| ----------- | ----------- |
| id (increment)       | int(10) unsigned |
| product_id    | int(11)       |
| quantity    | int(11)       |

#### Controllers CRUD operations
- ProductController 
- SaleController 
- StockController 
	
	
## REST API Routes/Endpoints

### Products API

- `GET products` returns all products
- `GET products/{id}` returns a product by id
- `POST products` saves a product, the body of the request:
	
```
{
  "name": "coca cola",
  "type": "e kuqe",
  "price": "44.00"
}
```
		
- `PUT products/{id}` updates a product, the body of the request can contain any of the fields:

```
{
  "name": "coca cola", (optional)
  "type": "e kuqe", (optional)
  "price": "44.00" (optional)
}
```
		
- `DELETE products/{id}` deletes a product by id

### Sales API

- `GET sales` returns a sale with the sold products and quanitity of the products sold

```
[
  {
    "id": 1,
    "total_price": 27,
    "created_at": "2021-01-03T20:37:47.000000Z",
    "updated_at": "2021-01-03T20:37:47.000000Z",
    "products": [
      {
        "id": 1,
        "name": "Dardha",
        "type": "TeButa",
        "price": 12,
        "created_at": "2021-01-03T20:37:47.000000Z",
        "updated_at": "2021-01-03T20:37:47.000000Z",
        "pivot": {
          "sale_id": 1,
          "product_id": 1,
          "quantity": 35
        }
      },
    ]
  }
]
```

- `Get sales/{id}` returns a sale with the sold products and quanitity of the products sold

- `POST sales` saves a sale with the total price. A sale has a list of products that are sold. for each product a SaleProduct record is created with the quantity of products. After the sale is done the quantity of stock per product sold is subtracted accordingly.
The requests body:

```
{
    "total_price": 90,
    "products": [
        {
          "id": 1,
          "quantity": 8
        },
        {
          "id": 3,
          "quantity": 19
        }
    ]
}
```

- `PUT sales` updates a sale, and sale products and the stock quanitity per sold products. This API endpoint will reset the stock quantity and subtract the quanitity from the value sent in the request body.
    Request body:
    
```
{
    "total_price": 90,
    "products": [
        {
          "id": 1,
          "quantity": 8
        },
        {
          "id": 3,
          "quantity": 19
        }
    ]
}
```

- `DELETE sales` deletes a sale by id, and all sale products, sets the quantity back to the initial value.

### Stock API

- `GET stocks` returns all stocks

- `GET stocks/{id}` returns stock by id

- `POST stocks` saves a new stock by the product id and quantity

- `PUT stocks` updates the stock with the new quantity

- `DELETE stocks` deletes stock by id
    
    
## The Code Challenge

Create a REST API for Product stock and sales management.

Create a database with the following tables:

- Stock

- Products

- Sales

Create table using migrations.

Fill Product table with data beforehand (2 random products) while using Seeds.

Create table columns in such a way that it seems reasonable to you to contain each table.

Stock contains data for all the products and quantity for that product.

Products contain data for the products such as: id of the product, name, type etc.

In Sales data is stored for the sold products.

When a product is sold, the stock for that product should be reduced.

You are not limited in these tables, you can create other helper tables, if you need.

Create Endpoints for CRUD operations for each table,

`GET api/stock`: returns all products from Stock

`POST api/stock` : creates data in Stock

`PUT api/stock`: updates Stock

`DELETE api/stock`: removes data from Stock

The same CRUD counts for `Products` and for `Stock`.

The project should be done in Laravel 8.

To test the REST-API you may use POSTMAN, INSOMNIA etc.

At the end explain in a .txt file the way you technically did the project and for how long did it took you to finish.

The final project is sent as .rar or you can put it in a public repository and send us the link for access.
