
<?php

class BookController extends \BaseController {


    /* SHOW FUNCTION USING A SINGLE PARAMETER
    public function showBy($param, $val)
    {
        $book = DB::table('library')->where($param, $val)->first();
        if($book != NULL) return View::make('pages.book.show', compact('book'));
        else return "<h1>Error! SP not found!</h1>";
    }*/

    /* SHOW FUNCTION USING ALL INPUT VARIABLES
    public function showAll($lastName, $title, $year){
        $book = DB::table('library')->where(array('lastName'=>$lastName, 'title'=>$title, 'year'=>$year))->first();
        if($book != NULL) return View::make('pages.book.show')->with('book', $book);
        else return "<h1>Error! SP not found!</h1>";
    }*/

    /* SEARCH FUNCTION */
    public function search(){

        $author = Input::get('spt-author');
        $title  = Input::get('spt-title');
        $year = Input::get('spt-year');

        //if only author field is filled up
        if($author!=NULL&&$title==NULL&&$year==NULL){
            $result = DB::table('library')->where('lastName', $author)->get();
            if($result != NULL) return View::make('pages.book.show', compact('result'));
            else return "<h1>Error! SP not found!</h1>";
        }

        //if only title field is filled up
        else if($author==NULL&&$title!=NULL&&$year==NULL){
            $result = DB::table('library')->where('title', $title)->get();
            if($result != NULL) return View::make('pages.book.show', compact('result'));
            else return "<h1>Error! SP not found!</h1>";
        }

        //if only year field is filled up
        else if($author==NULL&&$title==NULL&&$year!=NULL){
             $result = DB::table('library')->where('year', $year)->get();
            if($result != NULL) return View::make('pages.book.show', compact('result'));
            else return "<h1>Error! SP not found!</h1>";
        }

        //if author and title field is filled up
        else if($author!=NULL&&$title!=NULL&&$year==NULL){
             $result = DB::table('library')->where('author', $author)->orWhere('title', $title)->get();
            if($result != NULL) return View::make('pages.book.show', compact('result'));
            else return "<h1>Error! SP not found!</h1>";
        }

        //if author and year field is filled up
        else if($author!=NULL&&$title==NULL&&$year!=NULL){
             $result = DB::table('library')->where('author', $author)->orWhere('year', $year)->get();
            if($result != NULL) return View::make('pages.book.show', compact('result'));
            else return "<h1>Error! SP not found!</h1>";
        }

        //if title and year field is filled up
        else if($author==NULL&&$title!=NULL&&$year!=NULL){
             $result = DB::table('library')->where('title', $title)->orWhere('year', $year)->get();
            if($result != NULL) return View::make('pages.book.show', compact('result'));
            else return "<h1>Error! SP not found!</h1>";
        }

        //if all fields are filled up
        else if($author!=NULL&&$title!=NULL&&$year!=NULL){
            /*$result = DB::table('library')->where(function($query)
            {
                $query->where('author', $author)
                    ->where('title', $title)
                    ->where('year', $year);
            })
            ->get();

            $first = DB::table('library')->where('author', $author)->orWhere('title', $title)->get();
            $result = DB::table('users')->where('year', $year)->unionAll($first)->get();*/

            //$result = DB::select('select * from library where (author, title, year) = (?, ?, ?)', array($author, $title, $year));            

            //$result = DB::table('library')->where(array('author'=>$author,'title'=>$title, 'year'=>$year))->get();

            //$result = DB::table('library')->where('author', $author)->orWhere('title', $title)->orWhere('year', $year)->get();


$result = DB::table('library')
            ->where('author', $author)
            ->orWhere(function($query)
            {
                $query->where('year', $year)
                        ->where('title', $title);
            })
            ->get();



            if($result != NULL) return View::make('pages.book.show', compact('result'));
            else return dd($result);
        }
    }

}