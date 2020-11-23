<?php

use Illuminate\Database\Seeder;
use App\Models\Fiel;

class FielsTableSeeder extends Seeder
{
    public function run()
    {
//        $fiels = factory(Fiel::class)->times(50)->make()->each(function ($fiel, $index) {
//            if ($index == 0) {
//                // $fiel->field = 'value';
//            }
//        });
//
//        Fiel::insert($fiels->toArray());
        $fiels = [
            [
                'name'     => '设计师/设计素材',
                'children' => [
                    ['name' => '室内设计/景观/建筑',
                        'children' => [
                            ['name' => '室内设计'],
                            ['name' => '景观设计'],
                            ['name' => '建筑设计'],
                        ],
                    ],
                    ['name' => 'UI设计/动效/原型',
                        'children' => [
                            ['name' => 'UI设计'],
                            ['name' => '动效设计'],
                            ['name' => '原型设计'],
                        ],
                    ],
                    ['name' => '插画/动漫/短视频制作',
                        'children' => [
                            ['name' => '插画设计'],
                            ['name' => '动漫设计'],
                            ['name' => '短视频制作'],
                        ],
                    ],
                ],
            ],
            [
                'name'     => '互联网/电商/新媒体',
                'children' => [
                    ['name' => '产品经理'],
                    ['name' => '运营/增长'],
                    ['name' => '电商/带货'],
                    ['name' => '新媒体/短视频'],
                    ['name' => '技术/AI/源码'],
                ],
            ],
            [
                'name'     => '营销策划/方案',
                'children' => [
                    ['name' => '餐饮'],
                    ['name' => '房地产/建筑'],
                    ['name' => '医疗/医药'],
                    ['name' => '4A广告'],
                ],
            ],
            [
                'name'     => '财务/会计/人事/行政',
                'children' => [
                    ['name' => '财务'],
                    ['name' => '会计'],
                    ['name' => '人力资源'],
                    ['name' => '行政'],
                ],
            ],
            [
                'name'     => '客服/仓储/销售',
                'children' => [
                    ['name' => '客服'],
                    ['name' => '仓储'],
                    ['name' => '销售'],
                ],
            ],
            [
                'name'     => '简历/合同/海报/PPT模板',
                'children' => [
                    ['name' => '简历'],
                    ['name' => '合同'],
                    ['name' => '海报'],
                    ['name' => 'PPT模板'],
                ],
            ],
        ];

        foreach ($fiels as $data) {
            $this->createFiel($data);
        }
    }

    protected function createFiel($data, $parent = null)
    {
        // 创建一个新的类目对象
        $fiel = new Fiel(['name' => $data['name']]);
        // 如果有 children 字段则代表这是一个父类目
        $fiel->is_directory = isset($data['children']);
        // 如果有传入 $parent 参数，代表有父类目
        if (!is_null($parent)) {
            $fiel->parent()->associate($parent);
        }
        //  保存到数据库
        $fiel->save();
        // 如果有 children 字段并且 children 字段是一个数组
        if (isset($data['children']) && is_array($data['children'])) {
            // 遍历 children 字段
            foreach ($data['children'] as $child) {
                // 递归调用 createCategory 方法，第二个参数即为刚刚创建的类目
                $this->createFiel($child, $fiel);
            }
        }
    }

}

