import Image from 'next/image'
import Link from 'next/link'
import { DropdownMenuDemo } from './DropdownMenuDemo'
import { ModeToggle } from './ModeToggle'

export default function Header() {
  return (
    <header className="fixed w-full h-[125px] flex justify-center items-center bg-slate-50 dark:bg-slate-800">
      <nav className="w-11/12 flex justify-between  lg:px- ms-3 me-3">
        <div className="w-full flex justify-between h-16">
          <div className="flex items-center"> 
            <Link href="">
              <Image 
                src="/icone.png" 
                width={150}
                height={100}
                alt="Picture of the markdown"
              />
            </Link>
          </div>
          <div className="flex flex-column items-center">
            <div className="space-x-8 pr-6">
              <Link href="/dashboard">Dashboard</Link>
              <Link href="">Registro paciente</Link>
              <Link href="">Registro médico</Link>
              <Link href="">Admin</Link>
              <Link href="">Ver médicos</Link>
            </div>
            <div className="flex flex-column items-center gap-4">
              <ModeToggle />
              <DropdownMenuDemo />
            </div>
          </div>
        </div>
      </nav>
    </header>
  )
}