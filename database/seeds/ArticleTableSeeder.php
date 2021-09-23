<?php

use App\Article;
use App\Author;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ArticleTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
       $authorList = [  //crea array con gli autori
        'Bruno Vespa',
        'Lilli Gruber',
        'Mario Giordano',
        'Marino Bartoletti',
        'Marco Travaglio',
        'Enrico Mentana'
       ];
       
       $authorListID = [];

       foreach ($authorList as $author) { 
            $authorObject = new Author();
            $authorObject->name = $author;
            $authorObject->save();
            $authorListID[] = $authorObject->id;      
       }

       for ($i=0; $i < 50; $i++) { 
           $article = new Article();
           $article->title = $faker->sentences(1, true);
           $article->cover = $faker->imageUrl('200','200','articles', true);
           $article->content = $faker->paragraphs(6, true);
           $randAuthorKey = array_rand($authorListID, 1);
           $authorID = $authorListID[$randAuthorKey];
           $article->author_id = $authorID;
           $article->save();
       }
      
    }
}
