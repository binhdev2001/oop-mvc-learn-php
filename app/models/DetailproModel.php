<?php
class DetailproModel
{
    protected $table = 'products';
    public function getList()
    {
        $data = [
            'item 1',
            'item 2',
            'item 3',
        ];
        return $data;


    }
}