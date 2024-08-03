<!-- DELETE -->
<form method="post" action="" onsubmit="return confirm('Tem certeza que deseja excluir este autor?');">
    <input type="hidden" name="delete_id" value="<?php echo $data['aut_codigo']; ?>">
    <input type="submit" value="Excluir">
</form>