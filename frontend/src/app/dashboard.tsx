import Footer from "./components/Footer"
import Hdashboard from "./components/Header"

export default function Dashboard() {
  return (
    <div className="font-['Open_Sans'] relative bg-slate-50 dark:bg-slate-800">
      <Hdashboard />
        <main className="w-full flex justify-center">
          <section className="mt-[125px] bg-[url('/home.png')] w-full h-screen bg-contain ml-0 mr-0">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur voluptate iste. Saepe quaerat doloribus deserunt mollitia temporibus quidem ea unde? Eius velit iure labore temporibus ad perferendis nulla cum!</p>
          </section>
        </main>
      <Footer />
    </div>
  )
}
