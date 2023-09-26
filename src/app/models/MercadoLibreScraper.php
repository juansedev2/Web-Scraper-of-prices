<?php
namespace Jdev2\Webscraper\app\models;

use Jdev2\Webscraper\app\models\ScraperModel;

class MercadoLibreScraper extends ScraperModel{

    /**
     * @var string $url is the URL of the webpage to do scraping
    */
    protected static string $url_base = "https://listado.mercadolibre.com.co/";

    public function __construct(string $product){
        parent::__construct($product);
    }

    /**
     * This function makes the scraping on the webpage
    */
    public function scrapPage(): static{

        $this->concatProductWihtURL();

        $html = $this->htmlWeb->load($this->url_query); // Get all DOM of the specific web page
        $allNodes = $html->find("ol.ui-search-layout li.ui-search-layout__item"); // Filter to an element and a specific attribute
        $allProducts = [];        

        foreach ($allNodes as $node) {
            $productNode = $this->htmlDoc->load($node); // Load an specific portion or new document since an existing DOM
            // Get all of the necessary data/attributes and get the magic attribute
            $tittle = ($productNode->find("h2")[0])->plaintext ?? null;
            $url = ($productNode->find("a.ui-search-item__group__element")[0])->href ?? null ;
            $image_property = "data-src";
            $image = ($productNode->find("img[decoding]")[0])->$image_property ?? null;
            $price = "$" . ($productNode->find("span.andes-money-amount__fraction")[0]->plaintext);
            $allProducts[] = [
                "tittle" => $tittle,
                "url" => $url,
                "image" => $image,
                "price" => $price,
            ];
        }
        $this->results = $allProducts;        
        return $this;
    }

    protected function concatProductWihtURL(){

        trim($this->product);
        $this->product = urlencode($this->product);
        $this->url_query = static::$url_base . $this->product;
    }

    public function orderUpward(): static{
        
        usort($this->results, function($productC, $productN){
            
            //$productC = Currently product and $productN = Next product
            $productC = str_replace("$", "", str_replace('.', '', $productC["price"]));  
            $productN = str_replace("$", "", str_replace('.', '', $productN["price"]));  
            //dd($productC);
            $productC = floatval($productC);
            $productN = floatval($productN);

            if ($productC == $productN) {
                return 0;
            }
            return ($productC < $productN) ? -1 : 1;
        });
        return $this;
    }

    public function orderFalling(): static{
        
        usort($this->results, function($productC, $productN){
            
            //$productC = Currently product and $productN = Next product
            $productC = str_replace("COP$", "", str_replace(' ', '', $productC["price"]));  
            $productN = str_replace("COP$", "", str_replace(' ', '', $productN["price"]));  
            
            $productC = floatval($productC);
            $productN = floatval($productN);

            if ($productC == $productN) {
                return 0;
            }
            return ($productC > $productN) ? -1 : 1;
        });

        return $this;
    }

}