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
       $authorList = [  //crea array con gli autori ('illustri nomi italiani' lol)
        'Bruno Vespa',
        'Lilli Gruber',
        'Mario Giordano',
        'Marino Bartoletti',
        'Marco Travaglio',
        'Enrico Mentana'
       ];
       
       $authorListID = []; //salvo gli id

       foreach ($authorList as $author) { //parti da una lista, salva i suddetti
            $authorObject = new Author();
            $authorObject->name = $author;
            $authorObject->save();
            $authorListID[] = $authorObject->id;   // li pushi, assegando loro id   
       }

       for ($i=0; $i < 50; $i++) { 
           $articleObject = new Article();//una volta definito 
           $articleObject->title = $faker->sentences(1, true);
           $articleObject->cover = $faker->imageUrl('200','200','articles', true);
           $articleObject->content = $faker->paragraphs(6, true);
           $randAuthorKey = array_rand($authorListID, 1);//prendi dall'array id in modo randomico
           $authorID = $authorListID[$randAuthorKey];//assegnalo ad ana variabile
           $articleObject->author_id = $authorID;//salvala nel db [fk done]
           $articleObject->save();
       }
      
    }
}
