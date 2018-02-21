<?php

function flash($message, $status = 'info')
{
    session()->flash($status, $message);
}

function chunk($name, $chunkCollection)
{
    $data = $chunkCollection->where('name', $name)->first();
    return $data->content;
}
