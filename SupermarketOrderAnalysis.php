<?php

class SupermarketOrderAnalysis {

    public function __construct(public float $occurenceCounter = 0, public array $tmpAssocProductQuantity = []) {
    }

    public function CommandAnalysis(array $products, $orders)
    {
        $productsAssociatedToNumbers = [];
        $totalSalesOfEachProduct = [];  
        
        foreach ($products as $product => $priceAndStock) {
            foreach ($orders as $client => $command) {
                if (isset($command[$product])) {
                    // calcul du bestSeller
                    $productsAssociatedToNumbers = [$product => ($command[$product])];  
                    $this->occurenceCounter = $productsAssociatedToNumbers[$product] + $this->occurenceCounter;

                    // calcul du chiffre d'affaire
                    $test [] = $command[$product] * $priceAndStock['prix'];
                    // var_dump($product);
                    // echo '<br>';
                    // var_dump($command[$product]);
                    // echo '<br>';

                    // var_dump($priceAndStock['prix']);
                    // echo '<br>';

                   
                }
            }

            
            $this->tmpAssocProductQuantity = [$product => $this->occurenceCounter];
            $totalSalesOfEachProduct = array_merge($totalSalesOfEachProduct, $this->tmpAssocProductQuantity);
            // initialise counter
            $this->occurenceCounter = 0;

        }
        var_dump(array_sum($test));
        echo '<br>';
        die;

      
        $bestSellingProduct = max($totalSalesOfEachProduct);
        // Trouver les clés associées à cette valeur $bestSellingProduct
        $nameBestSellingProduct = current(array_keys($totalSalesOfEachProduct, $bestSellingProduct));

        echo "Le produit le plus vendu est $nameBestSellingProduct avec $bestSellingProduct unités.";
        die;
        
    }

}


$products = [
    "Banane" => ["prix" => 1.2, "stock" => 10],
    "Pomme" => ["prix" => 0.8, "stock" => 20],
    "Orange" => ["prix" => 1.5, "stock" => 15],
];

$orders = [
    "Alice" => ["Banane" => 5, "Pomme" => 10],
    "Bob" => ["Banane" => 6, "Orange" => 10],
    "Charlie" => ["Pomme" => 5, "Orange" => 5],
];

$totalSalesOfEachProduct = new SupermarketOrderAnalysis();  
$totalSalesOfEachProduct->CommandAnalysis($products, $orders);