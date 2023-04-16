# laravel-advanced-filter

A sample of filtering strategy using Laravel and PHP.

## Setup

### Clone this project.

```bash
$ git clone git@github.com:wheesnoza/laravel-advanced-filter.git
```

### Init

In the project root directory execute `make init` command.

```
$ make init
```

## How use

### Using curl

Fetch all products.

```bash
$ curl -X GET 'http://localhost/api/products'
```

### Using web

Access to `http://localhost/products`

### Examples

You can view the results on the web using the same url without the `/api` route.

- Filter by name.

```bash
$ curl -X GET 'http://localhost/api/products?filter[name]=スラックス'
```

- Filter by price. Lower than equal filter.

```bash
$ curl -X GET 'http://localhost/api/products?filter[price:lte]=30000'
```

- Filter by price. Greater than equal filter.

```bash
$ curl -X GET 'http://localhost/api/products?filter[price:gte]=30000'
```

- Filter by price range.

```bash
$ curl -X GET 'http://localhost/api/products?filter[price:gte]=5000&filter[price:lte]=20000'
```

And many others filter options.

- Brand
- Raiting
- Size range
- Free shipping
