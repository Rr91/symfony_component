<?php
/**
 * Created by PhpStorm.
 * User: Рома
 * Date: 04.06.2021
 * Time: 21:03
 */

namespace App\Http;
use App\Entities\Book;

class IndexController extends Controller
{
    public function indexAction()
    {
//        dump(app()->get('orm')->getEntityManager());
          $entityManager = app()->get('orm')->getEntityManager();
          $book = $entityManager->getRepository(Book::class)->find(1);
//          $book->title = "test_doctrine";
//          $entityManager->persist($book);
//          $entityManager->flush();
          dd($book);
          return $this->render('index', ['title' => "Index Page"]);
    }
}