import Footer from "./components/footer"
import Header from "./components/header"
import { BrowserRouter, Routes, Route } from 'react-router-dom'
import AddProduct from './components/AddProduct'
import EditProduct from './components/EditProduct'
import ProductList from './components/ProductList'

export default function Home() {
  return (
    <div className="font-['Open_Sans'] relative bg-white dark:bg-slate-700">
      <Header />
        <main className="w-full flex justify-center">
          <section className="w-4/5 h-full mt-[250px] mb-[250px] ml-0 mr-0">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum!</p>
            <BrowserRouter>
              <Routes>
                <Route path="/" element={<ProductList />}></Route>
                <Route path="/add" element={<AddProduct />}></Route>
                <Route path="/edit/:id" element={<EditProduct />}></Route>
              </Routes>
            </BrowserRouter>
          </section>
        </main>
      <Footer />
    </div>
  )
}