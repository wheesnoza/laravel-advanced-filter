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
    </>
}

export default Product;