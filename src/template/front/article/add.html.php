<?php $this->getHeader(); ?>
<h1>Dodaj artykuł</h1>
<form action="" method="post">
    Tytuł: <input type="text" name="title" /><br />
    Autor: <input type="text" name="author" /><br />
    Data dodania: <input type="text" name="date_add" value="<?php echo date("Y:m:d"); ?>" /><br />
    Treść:<br />
    <textarea name="content"></textarea><br />
    Kategoria: <select name="cat" size="0">
        <?php foreach($this->categories as $item): ?>
            <option value="<?php echo $item['id'] ;?>"><?php echo $item['name']; ?></option>
        <?php endforeach; ?>
    </select><br />
    <input type="submit" value="Dodaj" />
</form>
<?php $this->getFooter(); ?>
