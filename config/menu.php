<?php

return [
    [
        'label' => 'Dashboard',
        'route' => 'admin.layout.dashboard',
        'icon' => 'fa-home'
    ],
    [
        'label' => 'Category Manager',
        'route' => 'category.index',
        'icon' => 'fa fa-calendar   ',
        'items' => [
            [
                'label' => 'All Category',
                'route' => 'category.index',
            ],
            [
                'label' => 'Add Category',
                'route' => 'category.create',
            ],
        ]
    ],
    [
        'label' => 'Product Manager',
        'route' => 'product.index',
        'icon' => 'fa fa-heart',
        'items' => [
            [
                'label' => 'All Product',
                'route' => 'product.index',
            ],
            [
                'label' => 'Add Product',
                'route' => 'product.create',
            ],
        ]
    ],
    [
        'label' => 'Order Manager',
        'route' => 'order.index',
        'icon' => 'fa fa-cart-plus',
        'items' => [
            [
                'label' => 'All Order',
                'route' => 'order.index',
            ],

        ]
    ],

    [
        'label' => 'OrderDetail Manager',
        'route' => 'orderdetail.index',
        'icon' => 'fa-shopping-cart',
        'items' => [
            [
                'label' => 'All Orderdetail',
                'route' => 'orderdetail.index',
            ],

        ]
    ],

    [
        'label' => 'News Manager',
        'route' => 'news.index',
        'icon' => 'fa fa-book',
        'items' => [
            [
                'label' => 'All News',
                'route' => 'news.index',
            ],
            [
                'label' => 'Add News',
                'route' => 'news.create',
            ],
        ]
    ],
    [
        'label' => 'User Manager',
        'route' => 'user.index',
        'icon' => 'fa fa-user',
        'items' => [
            [
                'label' => 'All User',
                'route' => 'user.index',
            ],
            [
                'label' => 'Add User',
                'route' => 'user.create',
            ],
        ]
    ],
    [
        'label' => 'Comment Manager',
        'route' => 'comment.index',
        'icon' => 'fa fa-user',
        'items' => [
            [
                'label' => 'All Comment',
                'route' => 'comment.index',
            ],
        ]
    ],

    [
        'label' => 'List Roles Manager',
        'route' => 'role.index',
        'icon' => 'fa fa-list',
        'items' => [
            [
                'label' => 'All Roles',
                'route' => 'role.index',
            ],
            [
                'label' => 'Add Roles',
                'route' => 'role.create',
            ],
        ]
    ],
    [
        'label' => 'Tạo dữ liệu Permission',
        'route' => 'permission.index',
        'icon' => 'fa-shopping-cart',
        'items' => [

            [
                'label' => 'Add Permission',
                'route' => 'permission.create',
            ],
        ]
    ],


];
