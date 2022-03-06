<?php 
    return[
        [
            'label' => 'Product Manager',
            'route' => 'product.index'
        ],
        [
            'label' => 'Banner Manager',
            'route' => 'banner.index',
            'items' => [
                [
                    'label' => 'All banner',
                    'route' => 'banner.index',
                ],
                [
                    'label' => 'Add banner',
                    'route' => 'banner.create',
                ]
            ]            
        ],
        [
            'label' => 'Category Manager',
            'route' => 'blog.index',
            'items' => [
                [
                    'label' => 'All category',
                    'route' => 'category.index',
                ],
                [
                    'label' => 'Add category',
                    'route' => 'category.create',
                ]
            ]            
        ],
        [
            'label' => 'Blog Manager',
            'route' => 'blog.index',
            'items' => [
                [
                    'label' => 'All blog',
                    'route' => 'blog.index',
                ],
                [
                    'label' => 'Add blog',
                    'route' => 'blog.create',
                ]
            ]            
        ],
        [
            'label' => 'Order Manager',
            'route' => 'order.index',
            'items' => [
                [
                    'label' => 'All order',
                    'route' => 'order.index',
                ]
            ]            
        ],
        [
            'label' => 'Account Manager',
            'route' => 'account.index',
            'items' => [
                [
                    'label' => 'All account',
                    'route' => 'account.index',
                ]
            ]            
        ]

    ]
?>