<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Section::class, function (Faker $faker) {
    // 随机取一年以内的时间
    $updated_at = $faker->dateTimeThisYear();
    // 为创建时间传参，意为最大不超过 $updated_at，因为创建时间需永远比更改时间要早
    $created_at = $faker->dateTimeThisYear($updated_at);

    return [
        'course_id' => $faker->randomElement([1, 2, 3]),
        'edition_id' => $faker->numberBetween(1, 9),
        'chapter_id' => $faker->numberBetween(1, 27),

        'section_name' => $faker->numerify('这是小节标题#####'),
        'section_introduce' => $faker->catchPhrase(),
        'section_detail' => '<p>以下是一条自动生成的测试内容!</p><p>“据说大约两亿年以后， 大洋洲 北移，与 亚洲 和 北美洲 合为一体，而南极大陆也早已北上。板块构造力量将所有的大陆合为一体。这意味着这个地球上只有一个大陆，也只有一片海洋。到了那个时候，只要你一直走，就能凭借双腿去往梦想之地，找到那个你要寻找的人......但是板块运动永远不会停止，短暂的平静之后，大陆之间的陆地受到挤压，形成巨大的山脉。新的山脉甚至超越了现在的喜马拉雅山。”读到这里的时候，机上广播，飞机正在下降，请您调直椅背，打开遮光板。</p><p><img src="http://n1-q.mafengwo.net/s17/M00/62/51/CoUBXl-1HDWASpL5AAxQvGej0pY633.jpg?imageMogr2%2Fthumbnail%2F1360x%2Fstrip%2Fquality%2F90"></p><p>位于念青唐古拉山以南的 山南 ，北临 拉萨 ，东接 林芝 ，西依 日喀则 ，南临与 印度 ，有着长达600多公里的边境线。这里自然风光神秘绝美，峡谷森林、雪山湖泊在这里各成一派天地，宏大的视野背后是作为吐蕃王朝起家之本的骄傲。吐蕃王朝把它的威严留给了 拉萨 ，却把它的厚重留给了 山南 。凡是对 西藏 历史有简单了解的都知道， 山南 才是藏民族和藏文化的发源地，就像歌谣中唱的“地方莫早于雅砻，农田莫早 于泽 当，藏王莫早于聂赤赞普，房屋莫早于雍布拉康”。这里没有奇特的建筑，没有都市的繁华，却有 西藏 历史上第一块农田、第一个村庄、第一位赞普、第一座宫殿… 山南 几乎囊括了 西藏 所有的“第一”。</p><p><img src="http://b1-q.mafengwo.net/s17/M00/C5/25/CoUBXl-6RauAP6o8AAW-0Y3AeCU624.jpg?imageMogr2%2Fthumbnail%2F1360x%2Fstrip%2Fquality%2F90"></p><p>一路沿哲古草原、哲古措南下措美，塞上 江南 的的风韵急转为起伏的山势地貌。因为地处喜马拉雅山脉北麓，干旱的季风气候让这里的群山鲜有植被覆盖。日落中，高耸连绵的深色山体被染成金光，照亮整座县城。</p><p><img src="http://n1-q.mafengwo.net/s17/M00/8E/18/CoUBXl--PziAN0ikAA1BDdr36_0864.jpg?imageMogr2%2Fthumbnail%2F1360x%2Fstrip%2Fquality%2F90"></p><p>时间无法倒转，人生没有回旋。虽然受困于暂时无解的圈内，我们还是要朝着新的轨迹出发。从措美一路向南，进入 洛扎 境内，不断从眼前划过的是光秃秃的山脊，偶尔有枯黄色或是深紫红的植物覆盖于泥褐色的山体表面，扑面而来的是干燥又灰沉沉的气息。</p>',

        'is_open' => '1',
        'is_charge' => '0',

        'read_count' => $faker->randomNumber(3,true),
        'read_times' => $faker->randomNumber(4,true),
        'collect_count' => $faker->randomNumber(2,true),
        'forward_count' => $faker->randomNumber(2,true),
        'pay_count' => $faker->randomNumber(2,true),
        'clock_count' => $faker->randomNumber(2,true),
        'comment_count' => $faker->randomNumber(2,true),
        'problem_count' => $faker->randomNumber(2,true),
        'reply_count' => $faker->randomNumber(3,true),

        'care' => $faker->catchPhrase(),
        'order' => $faker->randomNumber(6,false),
        'excerpt' => $faker->text(200),
        'slug' => $faker->words(10, true),
        'created_at' => $created_at,
        'updated_at' => $updated_at,

    ];
});
