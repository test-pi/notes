<?
if($art = $data['data'])
{
    for($i=0, $count = count($art);$i<$count;$i++):?>
    <div class="home_art">
        <h2><?=$art[$i]["title"]?></h2>
        <p><?=$art[$i]["text"]?></p>
        <div class='art_date'>{$val['dt_create']}</div>
        <div class='art_author'><a href='<?=HOST?>/articles/article/<?=$art[$i]['id']?>'>Читать полность</a></div>
        <div class='clear'></div>
    </div>  
    
<?
    endfor;
}
?>