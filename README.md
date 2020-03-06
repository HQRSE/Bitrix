# Bitrix sorted IDs
Берем из txt <b>ID</b> и раскидываем по разделам файлом <b>compound_id.php</b><br>
Но это очень долго, лучше использовать на стороннем сервере, а затем переносить таблицу<br>
-------------------<br>
Решение было выбрано следующее (процедура разовая, поэтому так):<br>
Есть txt со списком кодов товаров <b>real3percent.txt</b><br>
Подгружаем его в <b>generate_ids.php</b> и получаем список <b>ID</b> (ids3per.txt), которые нужно поместить в те самые разделы со скидками<br>
Этот список подгружаем в <b>generate_insert.php</b> и получаем огромный запрос, который можно вручную по частям перенести в <b>PhpMyAdmin в</b> <b>SQL</b> запрос<br><br>
<b>INSERT INTO b_iblock_section_element (IBLOCK_SECTION_ID,IBLOCK_ELEMENT_ID) VALUES (section_id_1,iblock_element_id_1), (section_id_1,iblock_element_id_2), (section_id_1,iblock_element_id_3);</b>
