<?php
class categoriesController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {

    	header("Location: ".BASE_URL);
    }

    public function enter($id_category){

		$store = new Store();
    	$categories = new Categories();
    	$products = new Products();
    	$filters = new Filters();

		$dados = $store->getTemplateData();

    	$dados['categories'] = $categories->getList();
    	$dados['category_name'] = $categories->getCategoryName($id_category);

    	if(!empty($dados['category_name'])){
	        $currentPage = 1;
	        $offset = 0;
	        $limit = 3;

	        if(!empty($_GET['p'])){
	            $currentPage = $_GET['p'];
	        }

	        $offset = ($currentPage * $limit) - $limit;

	        $filter = array('category'=>$id_category);

			$dados['list'] = $products->getList($offset, $limit, $filter);
	        $dados['totalItems'] = $products->getTotal($filter);
	        $dados['numberOfPages'] = ceil($dados['totalItems'] / $limit);
	        $dados['currentPage'] = $currentPage;

	        $dados['id_category'] = $id_category;

            $dados['filters'] = $filters->getFilters($filter);
            $dados['filters_selected'] = $filter; 

            $dados['searchTerm'] = '';
            $dados['category'] = '';	        

			$dados['category_filter'] = $categories->getCategoryTree($id_category);

			$dados['sidebar'] = true;

			$this->loadTemplate('categories', $dados);
		}else{
			header("Location: ".BASE_URL);
		}

    	$this->loadTemplate('categories', $dados);
    }

}