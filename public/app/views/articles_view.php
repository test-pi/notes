<?php
if(!empty($data['categories']))
{
    foreach($data['categories'] as $val)
    {
        echo "<a href='".HOST."/articles/category/{$val['cat_id']}'>
            <div class='home_art'>
                <h3>{$val['cat_title']}</h3>
                <p>{$val['cat_descr']}</p>
            </div>
            </a>";
    }
}elseif(!empty($data['category']))
{
    foreach($data['category'] as $val)
    {
        echo "<div class='home_art'>
                <h3>{$val['title']}</h3>
                <p>{$val['text']}</p>
                <div class='art_date'>{$val['dt_create']}</div>
                <div class='art_author'><a href='".HOST."/articles/article/{$val['id']}'>Читать полность</a></div>
                <div class='clear'></div>
            </div>";
    }
}elseif(!empty($data['article']))
{
    if(isset($data['article']['no_article']))
    {
        echo "<h3>{$data['article']['no_article']}</h3>";
    }
    else
    {
        $val = $data['article'];
        echo "<div class='full_article'>
                <h3>{$val['title']}</h3>
                <div>{$data['article']['text']}</div>
              </div>";
    }
}	
else
{
    echo "<h2>Ничего не найдено</h2>";
}


?>