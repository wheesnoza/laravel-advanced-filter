import React from "react";
import Product from "../../src/components/Product/Product";

interface ProductsProps {
  products: Product[],
  popular_products: Product[]
}

const Index: React.FC<ProductsProps> = (props) => {
  console.log(props);
  return <>
    <h1>人気商品TOP5</h1>
    {React.Children.toArray(props.popular_products.map(Product))}
    <h1>全ての商品</h1>
    {React.Children.toArray(props.products.map(Product))}
  </>;
};
export default Index;