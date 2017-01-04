<?php $this->getHeader(); ?>
<h1>Lista kategorii</h1>
<table>
    <tbody>
    <tr>
        <td>Nazwa</td>
        <td></td>
    </tr>
    <?php foreach($this->categories as $item): ?>
    <tr>
        <td><?php echo $item['name']; ?></td>
        <td><a href="<?php echo $this->generateUrl('category/delete', array('id' => $item['id'])); ?>">usuń</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php $this->getFooter(); ?>
