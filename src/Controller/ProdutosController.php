<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ProdutosController extends AppController{

    public function index(){
        //$produto = [ "id" => 1, "nome" => "HD de 1 TB", "preco" => 29.99, "descricao" => "Um HD mt legal"];
        $produtosTable = TableRegistry::get('Produtos');
        $produtos = $produtosTable->find('all');
        $this -> set('produtos', $produtos);

    }

    public function novo(){
        $produtosTable = TableRegistry::get('Produtos');
        $produto = $produtosTable->newEntity();
        $this->set('produto', $produto);
    }

    public function salva(){
        //var_dump($this->request->data()); die;
        
        
        $produtosTable = TableRegistry::get('Produtos');
        $produto = $produtosTable->newEntity($this->request->data());
        $produtosTable->save($produto);
        if($produtosTable->save($produto)){
            $msg = "Produto salvo com sucesso";
        } else{
            $msg = "Erro ao salvar o produto";
        }
        $this->set('msg', $msg);
    }

    public function editar($id){
        $produtosTable = TableRegistry::get('Produtos');
        $produto = $produtosTable->get($id);
        $this->set('produto', $produto);
        $this->render('novo');
    }

    public function apagar($id){
        $produtosTable = TableRegistry::get('Produtos');
        $produto = $produtosTable->get($id);
        if($produtosTable->delete($produto)){
            $msg = "Produto removido";
        } else{
            $msg = "Erro ao remover Produto";
        }
        $this->redirect('Produtos/index');
    }


}
?>
