<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        $products = new Products();
        $categories = new categories();
        $filters = new Filters();

        $filter = array();
        if(!empty($_GET['filter']) && is_array($_GET['filter'])){
            $filter = $_GET['filter'];
        }

        $currentPage = 1;
        $offset = 0;
        $limit = 3;

        if(!empty($_GET['p'])){
            $currentPage = $_GET['p'];
        }

        $offset = ($currentPage * $limit) - $limit;

        $dados['list'] = $products->getList($offset, $limit, $filter);
        $dados['totalItems'] = $products->getTotal($filter);
        $dados['numberOfPages'] = ceil($dados['totalItems'] / $limit);
        $dados['currentPage'] = $currentPage;

        $dados['categories'] = $categories->getList();
        $dados['filters'] = $filters->getFilters($filter);
        $dados['filters_selected'] = $filter;

        $this->loadTemplate('home', $dados);
    }
}