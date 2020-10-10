<?php

namespace App\Http\Resources;

class ParsingResource
{
    protected const DOMAIN = 'https://podtrade.ru';
    protected const URL = '/catalog/promyshlennye_transmissii_1/?PAGEN_1=';

    private $products;

    public function __construct()
    {
        $this->products = [];
    }

    public function parse($startPage = 1)
    {
        // Получение списка товаров
        $content = file_get_contents($this::DOMAIN . $this::URL . $startPage);
        preg_match_all('#data-entity="item">(.+?)<div class="product-item"#su', $content, $items);

        // Извлечение составляющих каждого товара
        foreach ($items[1] as $item) {
            $product = [];

            // Изображение
            preg_match('#<img src="(.+?)">#su', $item, $img);
            $product['image'] = $this::DOMAIN . $img[1];

            // Наличие
            preg_match('#<div class="buy-status [a-z\-]+">(.+?)</div>#su', $item, $in_stock);
            $product['in_stock'] = ($in_stock[1] == 'В наличии') ? 1 : 0;

            // Название
            preg_match('#<div class="block-view-title" title="(.+?)">#su', $item, $name);
            $product['name'] = $name[1];

            // Бренд
            preg_match('#<a class="block-view-haract-link" href="\#">(.+?)</a>#su', $item, $brand);
            $product['brand_id'] = $brand[1];

            // Размеры
            preg_match('#<span class="block-view-haract-span" title=".+">(.+?)</span>#su', $item, $dimensions);
            $product['dimensions'] = trim($dimensions[1]);

            // Стоимость
            preg_match('#<div class="block-view-price">(.+?)</div>#su', $item, $price);
            $price = trim($price[1]);
            $price = explode(' ', $price);
            if ($price[0] == '')
                $price[0] = 0;
            $product['price'] = $price[0];

            $this->products[] = $product;
        }

        return $this->products;
    }
}
