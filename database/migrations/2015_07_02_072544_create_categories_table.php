<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Category;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('weight')->nullable()->index();
            $table->smallInteger('parent_id')->default(0)->index();
            $table->smallInteger('type_id')->default(0)->index();
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // Topic
        $topicCategorys = [
            '城市'      =>  [
                '赣州', '章贡', '南康', '上犹', '赣县', '信丰', '大余', '崇义', '安远', '龙南', '定南', '全南', '宁都', '于都', '兴国', '会昌', '寻乌', '石城', '瑞金',
            ],
            '事业'      =>  [
                '未分类',
            ],
            '休闲娱乐'  =>  [
                '未分类',
            ],
            '运动&活动' =>  [
                '未分类',
            ],
            '站务'       =>  [
                '未分类',
            ]
        ];
        foreach ($topicCategorys as $topCategory => $categorys) {
            $topCategory = Category::create([
                'name'      =>      $topCategory,
                'parent_id' =>      0,
                'type_id'   =>  Category::TYPE_TOPIC,
            ]);
            foreach ($categorys as $category) {
                Category::create([
                    'name'      =>  $category,
                    'parent_id' =>  $topCategory->id,
                    'type_id'   =>  Category::TYPE_TOPIC,
                ]);
            }
        }





        // Article
        $articleCategorys = ['赣州', '民生', '政闻', '国内', '国际'];
        foreach ($articleCategorys as $index => $category) {
            Category::create([
                'name'      =>  $category,
                'type_id'   =>  Category::TYPE_ARTICLE,
                'parent_id' =>  0,
            ]);
        }


        // Blog
        $blogCategorys = ['日志'];
        foreach ($blogCategorys as $index => $category) {
            Category::create([
                'name'      =>  $category,
                'type_id'   =>  Category::TYPE_BLOG,
                'parent_id' =>  0,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
