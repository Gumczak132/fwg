<?php $this->getHeader(); ?>
<h1><?php echo $this->article['title']; ?></h1>
autor: <?php echo $this->article['author']; ?>, data dodania: <?php echo $this->article['date_add']; ?><br />
Kategoria: <?php echo $this->article['name']; ?>

<p><?php echo $this->article['content']; ?></p>
<?php $this->getFooter(); ?>
