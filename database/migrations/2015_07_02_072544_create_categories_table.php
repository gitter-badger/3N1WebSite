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
                '赣州', '南康', '上犹',
            ],
            '事业'      =>  [
                '创业', '公司员', '教师', '互联网', '律师', '会计', 'HR',
            ],
            '休闲娱乐'  =>  [
                '活动', '运动', '棋牌桌游',
            ],
            '赣+'       =>  [
                '投诉建议',
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
        $articleCategorys = ['赣州', '青年', '创业', '启迪'];
        foreach ($articleCategorys as $index => $category) {
            Category::create([
                'name'      =>  $category,
                'type_id'   =>  Category::TYPE_ARTICLE,
                'parent_id' =>  0,
            ]);
        }



        // Blog
        $blogCategorys = ['日志', '重要'];
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
