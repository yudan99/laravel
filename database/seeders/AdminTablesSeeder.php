<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // base tables
        \Encore\Admin\Auth\Database\Menu::truncate();
        \Encore\Admin\Auth\Database\Menu::insert(
            [
                [
                    "parent_id" => 0,
                    "order" => 13,
                    "title" => "Dashboard",
                    "icon" => "fa-bar-chart",
                    "uri" => "/",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 14,
                    "title" => "Admin",
                    "icon" => "fa-tasks",
                    "uri" => "",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 15,
                    "title" => "Users",
                    "icon" => "fa-users",
                    "uri" => "auth/users",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 16,
                    "title" => "Roles",
                    "icon" => "fa-user",
                    "uri" => "auth/roles",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 17,
                    "title" => "Permission",
                    "icon" => "fa-ban",
                    "uri" => "auth/permissions",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 18,
                    "title" => "Menu",
                    "icon" => "fa-bars",
                    "uri" => "auth/menu",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 19,
                    "title" => "Operation log",
                    "icon" => "fa-history",
                    "uri" => "auth/logs",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 18,
                    "order" => 12,
                    "title" => "领域分类管理",
                    "icon" => "fa-bars",
                    "uri" => "/fiels",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 18,
                    "order" => 11,
                    "title" => "文件分享管理（付费）",
                    "icon" => "fa-bars",
                    "uri" => "/file-shares",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 14,
                    "order" => 6,
                    "title" => "创建教程",
                    "icon" => "fa-bars",
                    "uri" => "/courses",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 14,
                    "order" => 7,
                    "title" => "教程版本管理",
                    "icon" => "fa-bars",
                    "uri" => "/editions",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 14,
                    "order" => 8,
                    "title" => "章节管理",
                    "icon" => "fa-bars",
                    "uri" => "/chapters",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 14,
                    "order" => 9,
                    "title" => "小节管理",
                    "icon" => "fa-bars",
                    "uri" => "/sections",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 5,
                    "title" => "教程",
                    "icon" => "fa-arrows",
                    "uri" => NULL,
                    "permission" => NULL
                ],
                [
                    "parent_id" => 17,
                    "order" => 3,
                    "title" => "订单支付管理",
                    "icon" => "fa-bars",
                    "uri" => "/orders",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 17,
                    "order" => 2,
                    "title" => "订单商品管理",
                    "icon" => "fa-bars",
                    "uri" => "/order-items",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 1,
                    "title" => "订单",
                    "icon" => "fa-jpy",
                    "uri" => NULL,
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 10,
                    "title" => "文件",
                    "icon" => "fa-files-o",
                    "uri" => NULL,
                    "permission" => NULL
                ],
                [
                    "parent_id" => 17,
                    "order" => 4,
                    "title" => "优惠码管理",
                    "icon" => "fa-bars",
                    "uri" => "/coupon-codes",
                    "permission" => NULL
                ]
            ]
        );

        \Encore\Admin\Auth\Database\Permission::truncate();
        \Encore\Admin\Auth\Database\Permission::insert(
            [
                [
                    "name" => "All permission",
                    "slug" => "*",
                    "http_method" => "",
                    "http_path" => "*"
                ],
                [
                    "name" => "Dashboard",
                    "slug" => "dashboard",
                    "http_method" => "GET",
                    "http_path" => "/"
                ],
                [
                    "name" => "Login",
                    "slug" => "auth.login",
                    "http_method" => "",
                    "http_path" => "/auth/login\r\n/auth/logout"
                ],
                [
                    "name" => "User setting",
                    "slug" => "auth.setting",
                    "http_method" => "GET,PUT",
                    "http_path" => "/auth/setting"
                ],
                [
                    "name" => "Auth management",
                    "slug" => "auth.management",
                    "http_method" => "",
                    "http_path" => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs"
                ]
            ]
        );

        \Encore\Admin\Auth\Database\Role::truncate();
        \Encore\Admin\Auth\Database\Role::insert(
            [
                [
                    "name" => "Administrator",
                    "slug" => "administrator"
                ]
            ]
        );

        // pivot tables
        DB::table('admin_role_menu')->truncate();
        DB::table('admin_role_menu')->insert(
            [
                [
                    "role_id" => 1,
                    "menu_id" => 2
                ]
            ]
        );

        DB::table('admin_role_permissions')->truncate();
        DB::table('admin_role_permissions')->insert(
            [
                [
                    "role_id" => 1,
                    "permission_id" => 1
                ]
            ]
        );

        // finish
    }
}
