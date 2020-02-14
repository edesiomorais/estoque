

<table class="table">
    <thead>
        <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Descrição</th>
        <th>Ações</th>
        </tr>
    </thead>
        <?php foreach($produtos as $produto): ?>
        <tr>
            <td><?=$produto['id']?></td>
            <td><?=$produto['nome']?></td>
            <td><?=$this->Money->format($produto['preco']);?></td>
            <td><?=$produto['descricao']?></td>
            <td>
                <?php
                    echo $this->Html->Link('Editar', ['controller' => 'produtos', 'action' => 'editar', $produto['id']]);
                    echo '&nbsp;';
                    echo $this->Html->Link('Apagar', ['controller' => 'produtos', 'action' => 'apagar', $produto['id']]);

                ?>
            </td>
        </tr>
        <?php endforeach; ?>
</table>
<?php
    echo $this->Html->Link('Novo Produto', ['controller' => 'produtos', 'action' => 'novo']);
?>