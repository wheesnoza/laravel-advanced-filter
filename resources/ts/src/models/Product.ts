export default interface Product {
    id: number,
    name: string,
    brand:string,
    price: {
        value: number,
        formatted: string
    },
    raiting: number,
    color: string,
    size: string
} 