import React from "react";
import Product from "../../src/components/Product/Product";

interface ProductsProps {
  products: Product[]
}

const Index: React.FC<ProductsProps> = (props) => {

  return <>
    {React.Children.toArray(props.products.map(Product))}
  </>;
};
export default Index;