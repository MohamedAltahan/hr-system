<?php

return [
    [
        'name' => ['ar' => 'النظام المحاسبي', 'en' => 'Accountant System'],
        'slug' => 'accountant_system',
        'route' => '/accountant-system',
        'icon' => 'accountant_system',
        'order' => 1,
        'children' => [
            [
                'name' => ['ar' => 'الدليل المحاسبي', 'en' => 'Accounts Tree'],
                'slug' => 'accounts_tree',
                'route' => '/accounts-tree',
                'icon' => 'accounts_tree',
                'order' => 1,
            ],
            [
                'name' => ['ar' => 'روابط الحسابات', 'en' => 'Accounts Links'],
                'slug' => 'accounts_links',
                'route' => '/accounts-links',
                'icon' => 'accounts_links',
                'order' => 2,
            ],
            [
                'name' => ['ar' => 'ربط الحسابات', 'en' => 'Accounts To Links'],
                'slug' => 'accounts_to_link',

                'route' => '/accounts-to-link',
                'icon' => 'accounts_to_link',
                'order' => 3,
            ],
            [
                'name' => ['ar' => 'أنواع الحسابات', 'en' => 'Accounts Type'],
                'slug' => 'accounts_type',

                'route' => '/accounts-type',
                'icon' => 'accounts_type',
                'order' => 4,
            ],
            [
                'name' => ['ar' => 'رصيد الحسابات الأولى', 'en' => 'Accounting Initial Balance'],
                'slug' => 'accounting_initial_balance',

                'route' => '/accounting_initial_balance',
                'icon' => 'accounting_initial_balance',
                'order' => 5,
            ],
            [
                'name' => ['ar' => 'القيود المحاسبيه', 'en' => 'Accounting Restriction'],
                'slug' => 'accounting_restriction',

                'route' => '/accounting-restrictions',
                'icon' => 'accounting_restriction',
                'order' => 6,
            ],
            [
                'name' => ['ar' => 'السندات', 'en' => 'Vouchers'],
                'slug' => 'vouchers',
                'route' => '/vouchers',
                'icon' => 'vouchers',
                'order' => 7,
            ],
            [
                'name' => ['ar' => 'أقسام القوائم المالية', 'en' => 'Financial Lists Sections'],
                'slug' => 'financial_statements_settings',
                'route' => '/financial-list-sections',
                'icon' => 'financial_statements_settings',
                'order' => 6, // already an integer in your data, left as-is
            ],
            [
                'name' => ['ar' => 'المعادلات المالية', 'en' => 'Financial Equation'],
                'slug' => 'financial_equation',

                'route' => '/financial-equations',
                'icon' => 'financial_equation',
                'order' => 2,
            ],
            [
                'name' => ['ar' => 'السنوات المالية', 'en' => 'Financial Years'],
                'slug' => 'financial_year',

                'route' => '/financial-financial_years',
                'icon' => 'financial_year',
                'order' => 8,
            ],
        ],
    ],
    [
        'name' => ['ar' => 'نظام المخازن', 'en' => 'Warehouses System'],
        'slug' => 'warehouses_system',
        'route' => '/accountant-system',
        'icon' => 'accountant_system',
        'order' => 2,
        'children' => [
            [
                'name' => ['ar' => 'رصيد المخزون الأولى', 'en' => 'Stock Initial Balance'],
                'slug' => 'stock_initial_balance',

                'route' => '/stock_initial_balance',
                'icon' => 'stock_initial_balance',
                'order' => 1,
            ],
            [
                'name' => ['ar' => 'المخازن', 'en' => 'Inventories'],
                'slug' => 'inventories',

                'route' => '/inventories',
                'icon' => 'inventories',
                'order' => 2,
            ],
            [
                'name' => ['ar' => 'أقسام المنتجات', 'en' => 'Categories'],
                'slug' => 'categories',

                'route' => '/categories',
                'icon' => 'categories',
                'order' => 3,
            ],
            [
                'name' => ['ar' => 'المنتجات', 'en' => 'Products'],
                'slug' => 'products',

                'route' => '/products',
                'icon' => 'products',
                'order' => 4,
            ],
            [
                'name' => ['ar' => 'وحدات المنتجات', 'en' => 'Product Units'],
                'slug' => 'product_units',

                'route' => '/product-units',
                'icon' => 'product_units',
                'order' => 5,
            ],
            [
                'name' => ['ar' => 'الطاولات', 'en' => 'Tables'],
                'slug' => 'tables',

                'route' => '/tables',
                'icon' => 'tables',
                'order' => 6,
            ],
            [
                'name' => ['ar' => 'طلبات التحويل', 'en' => 'Inventory Transfer Requests'],
                'slug' => 'inventory_transfer_requests',

                'route' => '/inventory-transfer-requests',
                'icon' => 'inventory_transfer_requests',
                'order' => 7,
            ],
            [
                'name' => ['ar' => 'طلبات تحويل المخزون الخاصه بى', 'en' => 'My Transfer Requests'],
                'slug' => 'my_inventory_transfer_requests',

                'route' => '/my-inventory-transfer-requests',
                'icon' => 'my_inventory_transfer_requests',
                'order' => 8,
            ],
            [
                'name' => ['ar' => 'تحويلات المخازن', 'en' => 'Inventory Transfer'],
                'slug' => 'inventory_transfers',

                'route' => '/inventory-transfers',
                'icon' => 'inventory_transfers',
                'order' => 9,
            ],
            [
                'name' => ['ar' => 'سجل المخزون', 'en' => 'Stock History'],
                'slug' => 'stock_history',

                'route' => '/stock-history',
                'icon' => 'stock_history',
                'order' => 10,
            ],
            [
                'name' => ['ar' => 'السندات المخزنية', 'en' => 'Inventory Vouchers'],
                'slug' => 'inventory_vouchers',

                'route' => '/inventory-vouchers',
                'icon' => 'inventory_vouchers',
                'order' => 11,
            ],
        ],
    ],
    [
        'name' => ['ar' => 'نظام المبيعات', 'en' => 'Sales System'],
        'slug' => 'sales_system',
        'route' => '/accountant-system',
        'icon' => 'accountant_system',
        'order' => 3,
        'children' => [
            [
                'name' => ['ar' => 'فواتير المبيعات', 'en' => 'Sales Invoices'],
                'slug' => 'sales',

                'route' => '/sales',
                'icon' => 'sales',
                'order' => 1,
            ],
            [
                'name' => ['ar' => 'مرتجع المبيعات', 'en' => 'Refund Sales'],
                'slug' => 'refund_sales',

                'route' => '/refund-sales',
                'icon' => 'refund_sales',
                'order' => 2,
            ],
        ],
    ],
    [
        'name' => ['ar' => 'نظام العملاء', 'en' => 'Customers System'],
        'slug' => 'customers_system',
        'route' => '/accountant-system',
        'icon' => 'accountant_system',
        'order' => 4,
        'children' => [
            [
                'name' => ['ar' => 'العملاء', 'en' => 'Customers'],
                'slug' => 'customers',

                'route' => '/customers',
                'icon' => 'customers',
                'order' => 1,
            ],
        ],
    ],
    [
        'name' => ['ar' => 'نظام المشتريات', 'en' => 'Purchases System'],
        'slug' => 'purchases_system',
        'route' => '/accountant-system',
        'icon' => 'accountant_system',
        'order' => 5,
        'children' => [
            [
                'name' => ['ar' => 'فواتير المشتريات', 'en' => 'Purchases Invoices'],
                'slug' => 'purchases',

                'route' => '/purchases',
                'icon' => 'purchases',
                'order' => 1,
            ],
            [
                'name' => ['ar' => 'مرتجع المشتريات', 'en' => 'Refund Purchase'],
                'slug' => 'refund_purchases',

                'route' => '/refund-purchases',
                'icon' => 'purchases',
                'order' => 2,
            ],
        ],
    ],
    [
        'name' => ['ar' => 'نظام الموردين', 'en' => 'Providers System'],
        'slug' => 'providers_system',
        'route' => '/accountant-system',
        'icon' => 'accountant_system',
        'order' => 6,
        'children' => [
            [
                'name' => ['ar' => 'الموردين', 'en' => 'Providers'],
                'slug' => 'providers',

                'route' => '/providers',
                'icon' => 'providers',
                'order' => 1,
            ],
        ],
    ],
    [
        'name' => ['ar' => 'نظام التقارير', 'en' => 'Reporting System'],
        'slug' => 'reporting_system',
        'route' => '/accountant-system',
        'icon' => 'accountant_system',
        'order' => 7,
        'children' => [
            [
                'name' => ['ar' => 'تقارير الحسابات', 'en' => 'Accounts Reports'],
                'slug' => 'accounts_reports',

                'route' => '/accounts-reports',
                'icon' => 'accounts_reports',
                'order' => 1,
            ],
            [
                'name' => ['ar' => 'التقارير الضريبية', 'en' => 'Taxes Reports'],
                'slug' => 'taxes_reports',

                'route' => '/taxes-reports',
                'icon' => 'taxes_reports',
                'order' => 2,
            ],
            [
                'name' => ['ar' => 'التقارير العامة', 'en' => 'General Reports'],
                'slug' => 'general_reports',

                'route' => '/general-reports',
                'icon' => 'general_reports',
                'order' => 2,
            ],
            [
                'name' => ['ar' => 'قائمة الدخل', 'en' => 'Income List'],
                'slug' => 'income_list',

                'route' => '/income-list',
                'icon' => 'income_list',
                'order' => 2,
            ],
            [
                'name' => ['ar' => 'قائمة المركز المالي', 'en' => 'Statement of Financial Position'],
                'slug' => 'statement_of_financial_position',

                'route' => '/statement-of-financial-position',
                'icon' => 'statement_of_financial_position',
                'order' => 5,
            ],
        ],
    ],
    [
        'name' => ['ar' => 'الإعدادات', 'en' => 'Settings'],
        'slug' => 'settings',
        'route' => '/accountant-system',
        'icon' => 'accountant_system',
        'order' => 8,
        'children' => [
            [
                'name' => ['ar' => 'مراكز التكلفة', 'en' => 'Cost Centers'],
                'slug' => 'cost_centers',

                'route' => '/cost-centers',
                'icon' => 'cost_center',
                'order' => 9,
            ],
            [
                'name' => ['ar' => 'القائمة الجانبية', 'en' => 'Sidebar'],
                'slug' => 'sidebar',

                'route' => '/sidebar',
                'icon' => 'sidebar',
                'order' => 2,
            ],
            [
                'name' => ['ar' => 'ادوار المستخدمين', 'en' => 'Roles'],
                'slug' => 'roles',

                'route' => '/roles',
                'icon' => 'roles',
                'order' => 4,
            ],
            [
                'name' => ['ar' => 'المستخدمين', 'en' => 'Users'],
                'slug' => 'users',

                'route' => '/users',
                'icon' => 'users',
                'order' => 5,
            ],
            [
                'name' => ['ar' => 'أنشطة المستخدمين', 'en' => 'Users Activities'],
                'slug' => 'action-event',

                'route' => '/action-event',
                'icon' => 'user-activity',
                'order' => 5,
            ],
            [
                'name' => ['ar' => 'إدارة الضرائب', 'en' => 'Tax Management'],
                'slug' => 'taxes',

                'route' => '/taxes',
                'icon' => 'taxes',
                'order' => 5,
            ],
            [
                'name' => ['ar' => 'الخصومات', 'en' => 'Discounts'],
                'slug' => 'discounts',
                'route' => '/discounts',
                'icon' => 'discounts',
                'order' => 8,
            ],
            [
                'name' => ['ar' => 'التطبيقات', 'en' => 'Applications'],
                'slug' => 'applications',
                'route' => '/applications',
                'icon' => 'applications',
                'order' => 8,
            ],
        ],
    ],
];
