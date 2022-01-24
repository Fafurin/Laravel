<?php

namespace App\Models;

class News
{
    private $news = [
        1 => [
            'title' => 'News 1',
            'body' =>   'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                         sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                         Aenean et tortor at risus viverra adipiscing at in. Egestas quis ipsum
                         suspendisse ultrices gravida dictum fusce ut placerat.'
        ],
        2 => [
            'title' => 'News 2',
            'body' =>   'Ullamcorper dignissim cras tincidunt lobortis feugiat.
                         Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue.
                         Maecenas volutpat blandit aliquam etiam erat velit scelerisque.'
        ],
        3 => [
            'title' => 'News 3',
            'body' =>   'Amet mauris commodo quis imperdiet massa.
                         Non blandit massa enim nec dui nunc mattis enim.
                         Dignissim sodales ut eu sem. Et tortor at risus viverra.'
        ]
    ];

    public function getNews(){
        $response = [];
        foreach ($this->news as $id => $item){
            $response[] = $item;
        }
        return $response;
    }

    public function getOne($id){
        return $this->news[$id];
    }
}

