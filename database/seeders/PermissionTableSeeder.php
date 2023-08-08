<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // 'role-list',
            // 'role-create',
            // 'role-edit',
            // 'role-delete',
            // 'product-list',
            // 'product-create',
            // 'product-edit',
            // 'product-delete',
            // 'category-list',
            // 'category-create',
            // 'category-edit',
            // 'category-delete',
            // 'admin-list',
            // 'admin-create',
            // 'admin-edit',
            // 'admin-delete',
            // 'user-list',
            // 'user-create',
            // 'user-edit',
            // 'user-delete',
            // 'Admin Mangement',
            // 'User Mangement',
            // 'Products Mangement',
            // 'Categories Mangement',
            // 'Coupon Mangement',
            'coupon-list',
            'coupon-create',
            'coupon-edit',
            'coupon-delete',
            'Slider Mangement',
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',
            'Blog Mangement',
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
            'Contact Mangement',
            'Contact-list',
            'Contact-create',
            'Contact-edit',
            'Contact-delete',


        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
