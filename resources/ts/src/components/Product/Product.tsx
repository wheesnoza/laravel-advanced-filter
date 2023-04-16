import React from "react";
import Product from "../../models/Product";

const Product: React.FC<Product> = (data) => {
    return <>
        <h4>{data.name}</h4>
        <p>ブランド: {data.brand}</p>
        <p>色: {data.color}</p>
        <p>サイズ: {data.size}</p>
        <p>価格: {data.price.formatted}</p>
        <p>評価: {data.raiting}</p>
        <p>送料: {data.free_shipping ? '送料無料' : '送料有料'}</p>
    </>
}

export default Product;