<?php

use App\Article;
use App\Author;
use App\Tag;
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

       $tagsList = [
           'famiglia',
           'donne',
           'politica',
           'scuola',
           'comunicazione',
           'lavoro',
           'giovani',
           'formazione',
           'anziani',
           'integrazione'
       ];

       $tagsListID =[];

       foreach ($authorList as $author) { //parti da una lista, salva i suddetti
            $authorObject = new Author();
            $authorObject->name = $author;
            $authorObject->save();
            $authorListID[] = $authorObject->id;   // li pushi, assegando loro id   
       }

  

       foreach($tagsList as $tag) {
        $tagObject = new Tag();
        $tagObject->name = $tag;
        $tagObject->save();
        $tagsListID[] = $tagObject->id;

       }

       for ($i=0; $i < 50; $i++) { 
           $articleObject = new Article();//una volta definito 
           $articleObject->title = $faker->sentences(1, true);
           $articleObject->cover = $faker->imageUrl('200','200','articles', true);
           $articleObject->content = $faker->paragraphs(6, true);

           $randAuthorKey = array_rand($authorListID, 1);//prendi dall'array id in modo randomico, con n specifichi quante chiavi vuoi che prenda
           $authorID = $authorListID[$randAuthorKey];//assegnalo ad una variabile
           $articleObject->author_id = $authorID;//salvala nel db [fk done]

           //prendi 2 tag random
            $randomTagKeys = array_rand($tagsListID, 2);// è array di 2 chiavi
            $tag1 = $tagsListID[$randomTagKeys[0]]; //  qui prendi la 1^ chiave estratta
            $tag2 = $tagsListID[$randomTagKeys[1]]; // qui prendi la 2^ chiave estratta

           $articleObject->save();//prima salva per avere id e poi fai attach

           $articleObject->tag()->attach($tag1);//per scrivere dentro la tabella pivot crei una relazione tra due record col metodo attach(),
                                                   
           $articleObject->tag()->attach($tag2);
 
       }

      
      
    }
    
    
}
