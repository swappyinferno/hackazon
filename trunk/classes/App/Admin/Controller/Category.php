<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nikolay Chervyakov 
 * Date: 28.08.2014
 * Time: 20:02
 */


namespace App\Admin\Controller;


use App\Admin\CRUDController;

class Category extends CRUDController
{
    public $modelNamePlural = 'Categories';

    protected function getListFields()
    {
        return [
            'categoryID' => [
                'title' => 'Id',
                'column_classes' => 'dt-id-column',
            ],
            'name' => [
                'max_length' => 64,
                'type' => 'link'
            ],
            'parentCategory.name' => [
                'is_link' => true,
                'template' => '/admin/category/%parentCategory.categoryID%',
                'title' => 'Parent'
            ],
            'enabled' => [
                'type' => 'boolean',
                'column_classes' => 'dt-flag-column',
                'title' => '+'
            ]

//            'category.name' => [
//                'title' => 'Category',
//                'type' => 'link',
//                'template' => '/admin/category/%category.categoryID%',
//                'width' => 150
//            ],
//            'Price',
//            'picture' => [
//                'type' => 'image',
//                'image_base' => '/products_pictures/',
//                'max_width' => 40,
//                'max_height' => 30
//            ]
        ];
    }

    protected function tuneModelForList()
    {
        $this->model->with('parentCategory')->where('categoryID', '<>', 1);
    }

    public function fieldFormatter($value, $item = null, array $format = [])
    {
        if ($format['original_field_name'] == 'parentCategory.name' && $value === '0_ROOT') {
            $value = '';
        }
        return parent::fieldFormatter($value, $item, $format); // TODO: Change the autogenerated stub
    }
} 