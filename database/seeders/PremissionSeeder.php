<?php

namespace Database\Seeders;

use App\Models\Premission;
use Illuminate\Database\Seeder;

class PremissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //categories permissions
        Premission::query()->insert([[
            'title' => 'read-category',
            'lable' =>'مشاهده دسته بندی'
        ],[
            'title' => 'update-category',
            'lable' => 'ویرایش دسته بندی'
        ],[
            'title' => 'create-category',
            'lable' => 'ایجاد دسته بندی'
        ],[
            'title' => 'delete-category',
            'lable' =>'حذف دسته بندی'
        ]]
       );
       //brands permissions
       Premission::query()->insert([[
        'title' => 'read-brand',
        'lable' => 'مشاهده برند'
        ],[
            'title' => 'update-brand',
            'lable' => 'ویرایش برند'
        ],[
            'title' => 'create-brand',
            'lable' => 'ایجاد برند'
        ],[
            'title' => 'delete-brand',
            'lable' => 'حذف برند'
        ]]
        );

        //products permissions
         Premission::query()->insert([[
        'title' => 'read-product',
        'lable' => 'مشاهده محصول'
        ],[
            'title' => 'update-product',
            'lable' => 'ویرایش محصول'
        ],[
            'title' => 'create-product',
            'lable' => 'ایجاد محصول'
        ],[
            'title' => 'delete-product',
            'lable' => 'حذف  محصول'
        ]]
        );
        //discounts permissions
        Premission::query()->insert([[
            'title' => 'read-discount',
            'lable' => 'مشاهده تخفیف'
            ],[
                'title' => 'update-discount',
                'lable' => 'ویرایش تخفیف'
            ],[
                'title' => 'create-discount',
                'lable' => 'ایجاد تخفیف'
            ],[
                'title' => 'delete-discount',
                'lable' => 'حذف تخفیف'
            ]]
        );
        //pictures permissions
        Premission::query()->insert([[
            'title' => 'read-picture',
            'lable' => 'مشاهده گالری'
            ],[
                'title' => 'update-picture',
                'lable' => 'ویرایش گالری'
            ],[
                'title' => 'create-picture',
                'lable' => 'ایجاد گالری'
            ],[
                'title' => 'delete-picture',
                'lable' => 'حذف گالری'
            ]]
        );
        //offers permissions
        Premission::query()->insert([[
            'title' => 'read-offer',
            'lable' => 'مشاهده کد تخفیف'
            ],[
                'title' => 'update-offer',
                'lable' => 'ویرایش کد تخفیف'
            ],[
                'title' => 'create-offer',
                'lable' => 'ایجاد کد تخفیف'
            ],[
                'title' => 'delete-offer',
                'lable' => 'حذف کد تخفیف'
            ]]
        );
        //roles permissions
        Premission::query()->insert([[
            'title' => 'read-role',
            'lable' => 'مشاهده نقش'
            ],[
                'title' => 'update-role',
                'lable' => 'ویرایش نقش'
            ],[
                'title' => 'create-role',
                'lable' => 'ایجاد نقش'
            ],[
                'title' => 'delete-role',
                'lable' => 'حذف نقش'
            ]]
        );
        //view-dashbord permissions
        Premission::query()->insert([
            'title' => 'view-dashbord',
            'lable' => 'مشاهده داشبورد'
            ]
        );
    }
}
