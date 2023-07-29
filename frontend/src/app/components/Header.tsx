import Image from 'next/image'
import Link from 'next/link'
import Router from 'next/router'

export default function Header() {
  return (
    <header className="bg-indigo-400 fixed w-full h-[125px] flex justify-center items-center">
      <nav className="w-11/12 flex justify-between  lg:px- ms-3 me-3">
        <div className="w-full flex justify-between h-16">
          <div className="flex items-center"> 
            <a href="">
              <Image 
                src="/icone.png" 
                width={150}
                height={100}
                alt="Picture of the markdown"
              />
            </a>
          </div>
          <div className="hidden sm:flex sm:items-center">
            <div className="hidden space-x-8 sm:flex pr-6">
              <Link href="/dashboard">Dashboard</Link>
              <a>Registro paciente</a>
              <a>Registro médico</a>
              <a>Admin</a>
              <a>Ver médicos</a>
            </div>
            <div>
              <div>
                <button>
                  <div className="ml-1">
                    <svg className="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </button>
              </div>
            </div>
            <div className="-mr-2 flex items-center sm:hidden">
              <button className="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <svg className="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path className="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  <path className="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
          <div className="hidden sm:hidden">
            <div className="pt-2 pb-3 space-y-1">
              <a href=""></a>
            </div>
            <div className="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
              <div className="px-4">
                <div className="font-medium text-base text-gray-800 dark:text-gray-200">

                </div>
                <div className="font-medium text-sm text-gray-500">

                </div>
              </div>
              <div className="mt-3 space-y-1">
                <a href=""></a>
                <form action="">
                  <a href=""></a>
                </form> 
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
  )
}

export function Hdashboard() {
  return (
    <header className="bg-indigo-400 fixed w-full h-[125px] flex justify-center items-center">
      <nav className="w-11/12 flex justify-between  lg:px- ms-3 me-3">
        <div className="w-full flex justify-between h-16">
          <div className="flex items-center"> 
            <a href="">
              <Image 
                src="/icone.png" 
                width={150}
                height={100}
                alt="Picture of the markdown"
              />
            </a>
          </div>
          <div className="hidden sm:flex sm:items-center">
            <div className="hidden space-x-8 sm:flex pr-6">
              <a href='./auth/register.tsx'>registro</a>
              <a href='./auth/login.tsx'>login</a>
            </div>
            <div>
              <div>
                <button>
                  <div className="ml-1">
                    <svg className="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </button>
              </div>
            </div>
            <div className="-mr-2 flex items-center sm:hidden">
              <button className="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <svg className="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path className="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  <path className="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
          <div className="hidden sm:hidden">
            <div className="pt-2 pb-3 space-y-1">
              <a href=""></a>
            </div>
            <div className="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
              <div className="px-4">
                <div className="font-medium text-base text-gray-800 dark:text-gray-200">

                </div>
                <div className="font-medium text-sm text-gray-500">

                </div>
              </div>
              <div className="mt-3 space-y-1">
                <a href=""></a>
                <form action="">
                  <a href=""></a>
                </form> 
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
  )
}