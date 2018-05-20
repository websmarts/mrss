<?php

function flash($message, $status = 'info')
{
    session()->flash($status, $message);
}

function chunk($name, $chunkCollection)
{
    $data = $chunkCollection->where('name', $name)->first();
    if($data){
        return nl2br($data->content);
    }

    return 'Chunk name: '.$name.' not found';
    
}
