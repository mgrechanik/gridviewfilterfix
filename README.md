# Fix for Yii2 GridView filter functionality to work properly with Bootstrap 4 and Bootstrap 5

## What is it about? <span id="demo"></span>

When you are using Yii2 default GridView you might meet a problem that validation errors for filter model are not displayed properly, like this:

![Fix for Yii2 GridView DataColumn for filter validational errors to be properly shown with bootstrap 4 and 5](https://raw.githubusercontent.com/mgrechanik/gridviewfilterfix/refs/heads/main/docs/yii2-gridview-filter-fix-for-bootstrap4-and-5.png "Fix for Yii2 GridView DataColumn for filter validational errors to be properly shown with bootstrap 4 and 5")

## Installing <span id="installing"></span>

#### Installing through composer::

The preferred way to install this library is through composer.

Either run
```
composer require --prefer-dist mgrechanik/gridviewfilterfix
```

or add
```
"mgrechanik/gridviewfilterfix" : "~1.0.0"
```
to the require section of your `composer.json`.

## How to use  <span id="use"></span> 

Add the following lines of code to your main configuration file:
1) For Bootstrap 4
```php
    'container' => [
        'definitions' => [
            \yii\grid\GridView::class => [
                'dataColumnClass' => \mgrechanik\gridviewfilterfix\Bs4DataColumn::class
            ]
        ]
    ],
```


2) For Bootstrap 5
```php
    'container' => [
        'definitions' => [
            \yii\grid\GridView::class => [
                'dataColumnClass' => \mgrechanik\gridviewfilterfix\Bs5DataColumn::class
            ]
        ]
    ],
```


## Similar problems with GridView and Bootstrap 4 / 5

#### Paginator does not look good  <span id="paginator problem"></span>

Solution:

```php
    'container' => [
        'definitions' => [
            \yii\widgets\LinkPager::class => \yii\bootstrap5\LinkPager::class,
        ],
    ],
```

#### Error block under field is now shown, after failed validation, since this block is not at the same level with input.is-invalid

There is a [library](https://github.com/mgrechanik/yii2-activefield-additional-error "Solve problem when invalid-feedback block is not visible for bootstrap in Yii2") to solve this problem

